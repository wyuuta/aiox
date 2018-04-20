<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use App\Wallet;
use Session;
use Redirect;

class TransactionController extends Controller
{

    public function showUserTransactions()
    {
        //function to show user transactions
        $transactions = Transactions::where('from_user',Auth::user()->id)->get();
        return view("trans",$transactions);
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

        $wallet = Wallet::where('user_id', Auth::user()->id)->where('currency',$request->curr)->get();
        if($request->value > $wallet->balance){
            Session::flash('message','Balance uang tidak cukup!');
            return Redirect::to('/transpg');
        }
        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->from_curr = $request->curr;
        $transaction->to_curr = $request->curr;
        $transaction->from_value = $wallet->balance;
        $transaction->to_value = $wallet->balance-$request->value;
        $transaction->save();


        $wallet->balance -= $request->value;
        $wallet->save();

        Session::flash('message','Penarikan uang berhasil!');
        return Redirect::to('/transpg');
    }

    public function depositMoney(Request $request)
    {
        //function to increase user's wallet and log transaction
        $transaction = new Transaction;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->from_curr = $request->curr;
        $transaction->to_curr = $request->curr;
        $transaction->from_value = $wallet->balance;
        $transaction->to_value = $wallet->balance+$request->value;
        $transaction->save();


        $wallet->balance += $request->value;
        $wallet->save();

        return Redirect::to('/transpg');

    }

    public function withdrawCrypto(Request $request)
    {
        //function to decrease user's wallet and log transaction
        $wallet = Wallet::where('user_id', Auth::user()->id)->where('currency',$request->curr)->get();
        if($request->value > $wallet->balance){
            Session::flash('message','Balance uang tidak cukup!');
            return Redirect::to('/transpg');
        }

        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = Auth::user()->id;
        $transaction->from_curr = $request->curr;
        $transaction->to_curr = $request->curr;
        $transaction->from_value = $wallet->balance;
        $transaction->to_value = $wallet->balance-$request->value;
        $transaction->save();

        $wallet->balance -= $request->value;
        $wallet->save();

        Session::flash('message','Penarikan uang berhasil!');
        return Redirect::to('/transpg');
    }

    public function depositCrypto(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
