<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Wallet;
use App\User;
use Auth;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "<script>setTimeout(function(){ window.location.href = '/instant'; }, 2000);</script>";
        return view("home");
    }

    public function showWallet()
    {
        $wallet = Wallet::where('user_id',Auth::user()->id)->get();
        // dd($wallet);
        $data['wallet'] = $wallet;
        return view('balance',$data);
    }

    public function showInstant()
    {
        $wallet = Wallet::where('user_id',Auth::user()->id)->get();
        // dd($wallet);
        $data['wallet'] = $wallet;
        return view('instant',$data);
    }

    public function showCryptoCharts()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=IDR');
        dd(json_decode($res->getBody()));
        return view('chart');
    }

    public function showUserInfo()
    {
        $info = Auth::user();
        return view('profil',$info);
    }

    public function editUser(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return Redirect::to('profil');
    }
}
