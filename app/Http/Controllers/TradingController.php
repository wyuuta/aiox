<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trades;
use App\Wallet;
use App\Transactions;
use Redirect;

class TradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTradingList(Request $request)
    {
        //function to show trading list
        $trades = Trades::all()->paginate(20);
        return view ('tradelist',$trades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNewTrading(Request $request)
    {
        //function to store new trade
        $trade = new Trades;
        $trade->user_id = Auth::user()->id;
        $trade->from_curr = $request->from_curr;
        $trade->to_curr = $request->to_curr;
        $trade->rate = $request->rate;
        $trade->is_active = 1;
        $trade->save();

        return Redirect::to('/tradelist');
    }

    public function buyFromUser(Request $request)
    {
        //function to trade with other user based on trade list
        $trade = Trades::where('trade_id',$request->thread_id);
        $user_wallet_from = Wallet::where('user_id',Auth::user()->id)->where('curency',$trade->from_curr)->get();
        $user_wallet_to = Wallet::where('user_id',Auth::user()->id)->where('curency',$trade->to_curr)->get();
        $seller_wallet_from = Wallet::where('user_id',$request->seller_id)->where('curency',$trade->from_curr)->get();
        $seller_wallet_to = Wallet::where('user_id',$request->seller_id)->where('curency',$trade->to_curr)->get();

        if($request->value > $seller_wallet_from->balance || ($request->value*$trade->rate) > $user_wallet_to){
            Session::flash('message','Error!');
            return Redirect::to('/tradelist');
        }
        //resolve transaction
        $user_wallet_from->balance += $request->value;
        $user_wallet_from->save();

        $user_wallet_to->balance -= $request->value*$trade->rate;
        $user_wallet_to->save();

        $seller_wallet_from->balance -= $request->value;
        $seller_wallet_from->save();

        $sellet_wallet_to->balance += $request->value*$trade->rate;
        $seller_wallet_from->save();

        //log transaction
        $transaction = new Transactions;
        $transaction->from_user = Auth::user()->id;
        $transaction->to_user = $request->seller_id;
        $transaction->from_curr = $trade->from_curr;
        $transaction->to_curr = $trade->to_curr;
        $transaction->from_value = $request->value*$trade->rate;
        $transaction->to_value = $request->value;
        $transaction->save();

        $transaction = new Transactions;
        $transaction->from_user = $request->seller_id;
        $transaction->to_user = Auth::user()->id;
        $transaction->from_curr = $trade->to_curr;
        $transaction->to_curr = $trade->from_curr;
        $transaction->from_value = $request->value;
        $transaction->to_value = $request->value*$trade->rate;
        $transaction->save();

        return Redirect::to('/tradelist');
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
