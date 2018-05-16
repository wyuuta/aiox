<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Transactions;
use App\Wallet;
use Session;
use Auth;

class TransactionController extends Controller
{

    public function showUserTransactions($curr)
    {
        //function to show user transactions
        $transactions = Transactions::where('currency',$curr)->where('from_user',Auth::user()->id)->orWhere('to_user',Auth::user()->id)->paginate(100);
        $wallet = Wallet::where('currency',$curr)->where('user_id',Auth::user()->id)->first();
        $data['curr'] = $curr;
        $data['transactions'] = $transactions;
        $data['wallet'] = $wallet;
        if ($curr=="IDR"){
            return view("rupiah",$data);
        }
        else{
            return view("crypto", $data);
        }
        
    }

    public function openTransactionPage(){
        //function to open transaction page
        $wallets = Wallet::where('user_id', Auth::user()->id)->get();
        return view('transpg',$wallets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function withdrawMoney(Request $request)
    {
        //function to decrease user's wallet and log transaction
        $wallet = Wallet::where('user_id', Auth::user()->id)->where('currency',$request->curr)->first();
        if($request->value > $wallet->balance){
            Session::flash('message','Balance uang tidak cukup!');
            return Redirect::to('/balance/'.$request->curr);
        }

        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = $request->curr;
        $transaction->type = 'WITHDRAW';
        $transaction->value = floatval($request->value);
        $transaction->save();

        $wallet->balance -= floatval($request->value);
        $wallet->save();

        Session::flash('message','Penarikan uang berhasil!');
        return redirect('/balance');
    }

    public function depositMoney(Request $request)
    {
        //function to increase user's wallet and log transaction
        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = $request->curr;
        $transaction->type = 'DEPOSIT';
        $transaction->value = floatval($request->value);
        $transaction->save();
        // dd($transaction);

        $wallet = Wallet::where("user_id", Auth::user()->id)->where("currency", $request->curr)->first();
        $wallet->balance += floatval($request->value);
        $wallet->save();

        return redirect('/balance');

    }

    public function instantBuy(Request $request)
    {
        //function to buy crypto with current price
        $wallet_to = Wallet::where('user_id', Auth::user()->id)->where('currency',$request->curr)->first();
        $wallet_from = Wallet::where('user_id', Auth::user()->id)->where('currency',"IDR")->first();
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/price?fsym=IDR&tsyms='.$request->curr);
        $arr = json_decode($res->getBody(), true);
        // dd($arr);
        $price = floatval($arr[$request->curr]);
        
        if($request->value > $wallet_from->balance){
            Session::flash('message','Balance uang tidak cukup!');
            return redirect('/instant');
        }


        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = $request->curr;
        $transaction->type = 'BUY_'.$request->curr*$price;
        $transaction->value = floatval($request->value);
        $transaction->save();

        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = "IDR";
        $transaction->type = 'USE_BUY_'.$request->curr;
        $transaction->value = floatval($request->value*$price);
        $transaction->save();

        $wallet_from->balance -= floatval($request->value);
        $wallet_from->save();

        $wallet_to->balance +=floatval($request->value*$price);
        $wallet_to->save();

        Session::flash('message','Penarikan uang berhasil!');
        return redirect('/instant');
    }

    public function instantSell(Request $request)
    {
        //function to sell crypto with current price
        $wallet_from = Wallet::where('user_id', Auth::user()->id)->where('currency',$request->curr)->first();
        $wallet_to = Wallet::where('user_id', Auth::user()->id)->where('currency',"IDR")->first();
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/price?fsym='.$request->curr.'&tsyms=IDR');
        $arr = json_decode($res->getBody());
        $price = floatval($arr[$request->curr]);
        
        if(floatval($request->value)*$price > $wallet_from->balance){
            Session::flash('message','Balance uang tidak cukup!');
            return redirect('/instant');
        }


        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = $request->curr;
        $transaction->type = 'SELL_'.$request->curr;
        $transaction->value = floatval($request->value);
        $transaction->save();

        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->currency = "IDR";
        $transaction->type = 'GET_SELL_'.$request->curr;
        $transaction->value = floatval($request->value*$price);
        $transaction->save();

        $wallet_from->balance += floatval($request->value*$price);
        $wallet_from->save();

        $wallet_to->balance -= floatval($request->value);
        $wallet_to->save();

        Session::flash('message','Penarikan uang berhasil!');
        return redirect('/instant');
    }

}
