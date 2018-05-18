<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Wallet;
use App\Transactions;
use App\Order;
use App\OrderGroup;
use Auth;
use Session;

class TradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //function to show market, passing sell buy order price and history for chart
    public function showMarket($from, $to)
    {
        $buygroup = OrderGroup::where('type','BUY')->where('from_curr',$from)->where('to_curr',$to)->paginate(20);
        $sellgroup = OrderGroup::where('type','SELL')->where('from_curr',$from)->where('to_curr',$to)->paginate(20);
        $data['buygroup'] = $buygroup;
        $data['sellgroup'] = $sellgroup;
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=IDR,ETH,BTC,BCH,XRP,LTC,ETC,XLM,NEO,XEM,XVG&tsyms='.$from);
        $data['price'] = json_decode($res->getBody(), true)['RAW'];
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/histohour?fsym='.$to.'&tsym='.$from.'&limit=60&aggregate=3&e=CCCAGG');
        $data['histo'] = json_decode($res->getBody(), true);
        $data['histo'] = json_encode($data['histo']['Data']);
        // dd(json_encode($data['histo']['Data']));
        $transactions = Transactions::where('type',"TRADE")->get();
        $data['transactions'] = $transactions;
        $orders = Order::where("user_id",Auth::user()->id)->get();
        $data['orders'] = $orders;
        $data['from'] = $from;
        $data['to'] = $to;
        return view ('market',$data);
    }

    public function createBuyOrder(Request $request)
    {
        $request->rate = floatval($request->rate);
        $request->amount =floatval($request->amount);
        $sellgroup = OrderGroup::where('rate','<=', $request->rate)->where('type','SELL')->where('from_curr',$request->from_curr)->where('to_curr',$request->to_curr)->where('user_id','!=',Auth::user()->id)->orderBy('rate')->get();
        $userwallet_from = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->from_curr)->first();
        $userwallet_to = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->to_curr)->first();
        $amount = $request->amount;
        if($amount > $userwallet_from->balance){
            //error
            Session::flash('message','Balance tidak cukup!');
            return redirect('/market/IDR/BTC');
        }
        foreach($sellgroup as $sell){
            $orders = Order::where('type',"SELL")->where('rate',$sell->rate)->where('from_curr',$request->to_curr)->where('to_curr',$request->from_curr)->orderBy('created_at')->get();
            $flag = 0;
            foreach($orders as $ord){
                if ($amount > $ord->amount){
                    $amount -= $ord->$amount;
                    $sell->total -= $ord->$amount;
                    $this->createBuyTransaction($userwallet_from,$userwallet_to,$ord,$ord->amount);
                    $ord->delete();
                }
                else if ($amount < $ord->amount){
                    $ord->amount -= $amount;
                    $sell->total -= $amount;
                    $amount = 0;
                    $this->createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->save();
                    $flag = 1;
                }
                else{
                    $amount = 0;
                    $this->createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->delete();
                    $flag = 1;
                }
                if($flag)
                    break;
            }
            if($sell->total == 0)
                $sell->delete();
            else
                $sell->save();
            if($flag)
                break;
        }
        
        if($amount!=0){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->type = "BUY";
            $order->from_curr = $request->from_curr;
            $order->to_curr = $request->to_curr;
            $order->rate = $request->rate;
            $order->amount = $amount;
            $order->save();
        }

        $group = OrderGroup::where('rate',$request->rate)->where('type','BUY')->first();
        if ($group == null){
            $buyorder = new OrderGroup;
            $buyorder->type = 'BUY';
            $buyorder->rate = $request->rate;
            $buyorder->from_curr = $request->from_curr;
            $buyorder->to_curr = $request->to_curr;
            $buyorder->total = $amount;
            $buyorder->save();
        }
        else{
            $group->total += $amount;
            $group->save();
        }
        return redirect('/market/IDR/BTC');
    }

    public function createSellOrder(Request $request)
    {
       $buygroup = OrderGroup::where('rate','<=', $request->rate)->where('type','BUY')->where('from_curr',$request->from_curr)->where('to_curr',$request->to_curr)->orderBy('rate')->get();
        $userwallet_from = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->from_curr)->first();
        $userwallet_to = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->to_curr)->first();
        $amount = $request->amount;
        if($amount > $userwallet_from->balance){
            //error
            Session::flash('message','Balance tidak cukup!');
            return redirect('/market/IDR/BTC');
        }
        foreach($buygroup as $buy){
            $orders = Order::where('type',"BUY")->where('rate',$buy->rate)->where('from_curr',$request->to_curr)->where('to_curr',$request->from_curr)->where('user_id','!=',Auth::user()->id)->orderBy('created_at')->get();
            $flag = 0;
            foreach($orders as $ord){
                if ($amount > $ord->amount){
                    $amount -= $ord->$amount;
                    $buy->total -= $ord->$amount;
                    $this->createSellTransaction($userwallet_from,$userwallet_to,$ord,$ord->amount);
                    $ord->delete();
                }
                else if ($amount < $ord->amount){
                    $ord->amount -= $amount;
                    $sell->total -= $amount;
                    $amount = 0;
                    $this->createSellTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->save();
                    $flag = 1;
                }
                else{
                    $amount = 0;
                    $this->createSellTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->delete();
                    $flag = 1;
                }
                if($flag)
                    break;
            }
            if($buy->total == 0)
                $buy->delete();
            else
                $buy->save();
            if($flag)
                break;
        }
        
        if($amount!=0){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->type = "SELL";
            $order->from_curr = $request->from_curr;
            $order->to_curr = $request->to_curr;
            $order->rate = $request->rate;
            $order->amount = $amount;
            $order->save();
        }

        $group = OrderGroup::where('rate',$request->rate)->where('type','SELL')->first();
        if ($group == null){
            $sellorder = new OrderGroup;
            $sellorder->type = 'SELL';
            $sellorder->rate = $request->rate;
            $sellorder->from_curr = $request->from_curr;
            $sellorder->to_curr = $request->to_curr;
            $sellorder->total = $amount;
            $sellorder->save();
        }
        else{
            $group->total += $amount;
            $group->save();
        }
        return redirect('/market/IDR/BTC');
    }

    private function createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount)
    {
        $otherwallet_from = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->from_curr)->first();
        $otherwallet_to = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->to_curr)->first();

        $userwallet_from->balance += $amount*0.97;
        $userwallet_from->save();
        $userwallet_to->balance -= $amount*$ord->rate;
        $userwallet_to->save();
        $otherwallet_from->balance -= $amount;
        $otherwallet_from->save();
        $otherwallet_to->balance += $amount*$ord->rate*0.97;
        $otherwallet_to->save();

        $trans1 = new Transactions;
        $trans1->from_user = Auth::user()->id;
        $trans1->to_user = $ord->user_id;
        $trans1->currency = $ord->to_curr;
        $trans1->type = "TRADE";
        $trans1->value = $amount*$ord->rate;
        $trans1->save();
    
        $trans2 = new Transactions;
        $trans2->from_user = $ord->user_id;
        $trans2->to_user = Auth::user()->id;
        $trans2->currency = $ord->from_curr;
        $trans2->type = "TRADE";
        $trans2->value = $amount;
        $trans2->save();
    }

    private function createSellTransaction($userwallet_from,$userwallet_to,$ord,$amount)
    {
        $otherwallet_from = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->from_curr)->first();
        $otherwallet_to = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->to_curr)->first();

        $userwallet_from->balance -= $amount;
        $userwallet_from->save();
        $userwallet_to->balance += $amount*$ord->rate*0.97;
        $userwallet_to->save();
        $otherwallet_from->balance += $amount*0.97;
        $otherwallet_from->save();
        $otherwallet_to->balance -= $amount*$ord->rate;
        $otherwallet_to->save();

        $trans1 = new Transactions;
        $trans1->from_user = Auth::user()->id;
        $trans1->to_user = $ord->user_id;
        $trans1->currency = $ord->to_curr;
        $trans1->type = "TRADE";
        $trans1->value = $amount;
        $trans1->save();
    
        $trans2 = new Transactions;
        $trans2->from_user = $ord->user_id;
        $trans2->to_user = Auth::user()->id;
        $trans2->currency = $ord->from_curr;
        $trans2->type = "TRADE";
        $trans2->value = $amount*$ord->rate;
        $trans2->save();
    }
}
