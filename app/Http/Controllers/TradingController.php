<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\Transactions;
use App\Order;
use App\OrderGroup;
use Redirect;

class TradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBuyOrder(Request $request)
    {
        //function to show trading list
        $buygroup = OrderGroup::where('type','BUY')->paginate(20);
        return view ('buylist',$buygroup);
    }

    public function showSellOrder(Request $request)
    {
        //function to show trading list
        $buygroup = OrderGroup::where('type','SELL')->paginate(20);
        return view ('selllist',$sellgroup);
    }

    public function createBuyOrder(Request $request)
    {  
        $sellgroup = OrderGroup::where('rate','<=', $request->rate)->where('type','SELL')->where('from_curr',$request->from_curr)->where('to_curr',$request->to_curr)->orderBy('rate')->get();
        $userwallet_from = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->from_curr);
        $userwallet_to = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->to_curr);
        $amount = $request->amount;
        if($amount*$request->rate > $userwallet_to->balance){
            //error
            Session::flash('message','Balance tidak cukup!');
            return Redirect::to('/trading');
        }
        foreach($sellgroup as $sell){
            $orders = Order::where('type',"SELL")->where('rate',$sell->rate)->where('from_curr',$request->to_curr)->where('to_curr',$request->from_curr)->orderBy('created_at')->get();
            $flag = 0;
            foreach($orders as $ord){
                if ($amount > $ord->amount){
                    $amount -= $ord->$amount;
                    $sell->total -= $ord->$amount;
                    createBuyTransaction($userwallet_from,$userwallet_to,$ord,$ord->amount);
                    $ord->delete();
                }
                else if ($amount < $ord->amount){
                    $ord->amount -= $amount;
                    $sell->total -= $amount;
                    $amount = 0;
                    createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->save();
                    $flag = 1;
                }
                else{
                    $amount = 0;
                    createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount);
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

        $group = OrderGroup::where('rate',$request->rate)->where('type','BUY')->get();
        if ($group == null){
            $buyorder = new OrderGroup;
            $buyorder->type = 'BUY';
            $buyorder->rate = $request->rate;
            $buyorder->from_curr = $request->from_curr;
            $buyorder->to_curr = $request->to_curr;
            $buyorder->total = $amount;
        }
        else{
            $group->total += $amount;
            $group->save();
        }
        return Redirect::to('/trading')
    }

    public function createSellOrder(Request $request)
    {
       $buygroup = OrderGroup::where('rate','<=', $request->rate)->where('type','BUY')->where('from_curr',$request->from_curr)->where('to_curr',$request->to_curr)->orderBy('rate')->get();
        $userwallet_from = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->from_curr);
        $userwallet_to = Wallet::where('user_id',Auth::user()->id)->where('currency',$request->to_curr);
        $amount = $request->amount;
        if($amount > $userwallet_from->balance){
            //error
            Session::flash('message','Balance tidak cukup!');
            return Redirect::to('/trading');
        }
        foreach($buygroup as $buy){
            $orders = Order::where('type',"BUY")->where('rate',$sell->rate)->where('from_curr',$request->to_curr)->where('to_curr',$request->from_curr)->orderBy('created_at')->get();
            $flag = 0;
            foreach($orders as $ord){
                if ($amount > $ord->amount){
                    $amount -= $ord->$amount;
                    $buy->total -= $ord->$amount;
                    createSellTransaction($userwallet_from,$userwallet_to,$ord,$ord->amount);
                    $ord->delete();
                }
                else if ($amount < $ord->amount){
                    $ord->amount -= $amount;
                    $sell->total -= $amount;
                    $amount = 0;
                    createSellTransaction($userwallet_from,$userwallet_to,$ord,$amount);
                    $ord->save();
                    $flag = 1;
                }
                else{
                    $amount = 0;
                    createSellTransaction($userwallet_from,$userwallet_to,$ord,$amount);
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

        $group = OrderGroup::where('rate',$request->rate)->where('type','SELL')->get();
        if ($group == null){
            $buyorder = new OrderGroup;
            $buyorder->type = 'SELL';
            $buyorder->rate = $request->rate;
            $buyorder->from_curr = $request->from_curr;
            $buyorder->to_curr = $request->to_curr;
            $buyorder->total = $amount;
        }
        else{
            $group->total += $amount;
            $group->save();
        }
        return Redirect::to('/trading');
    }

    private function createBuyTransaction($userwallet_from,$userwallet_to,$ord,$amount)
    {
        $otherwallet_from = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->from_curr);
        $otherwallet_to = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->to_curr);

        $userwallet_from->balance += $amount;
        $userwallet_from->save();
        $userwallet_to->balance -= $amount*$ord->rate;
        $userwallet_to->save();
        $otherwallet_from->balance -= $amount;
        $otherwallet_from->save();
        $otherwallet_to->balance += $amount*$ord->rate;
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
        $otherwallet_from = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->from_curr);
        $otherwallet_to = Wallet::where('user_id',$ord->user_id)->where('currency',$ord->to_curr);

        $userwallet_from->balance -= $amount;
        $userwallet_from->save();
        $userwallet_to->balance += $amount*$ord->rate;
        $userwallet_to->save();
        $otherwallet_from->balance += $amount;
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

    /**
     * Show the application trading market.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMarket()
    {
        return view('market');
    }

    /**
     * Show the application instant trade.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInstant()
    {
        return view('instant');
    }

    /**
     * Show the application balance.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBalance()
    {
        return view('balance');
    }
}
