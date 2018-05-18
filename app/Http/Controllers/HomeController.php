<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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
        $client = new Client();
        $wallet = Wallet::where('user_id',Auth::user()->id)->get();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=IDR');
        $prices = json_decode($res->getBody(), true);
        // dd($prices["RAW"]["BTC"]["IDR"]["PRICE"]);
        $rupiah = Wallet::where('user_id',Auth::user()->id)->where('currency',"IDR")->get();
        $btc = Wallet::where('user_id',Auth::user()->id)->where('currency',"BTC")->get();
        // dd($rupiah);
        $data['wallet'] = $wallet;
        $data['price'] = $prices["RAW"]["BTC"]["IDR"]["PRICE"];
        $data['rupiah'] = $rupiah;
        $data['btc'] = $btc;
        return view('instant',$data);
    }

    public function showCryptoCharts()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/histohour?fsym='.$curr.'&tsym=IDR&limit=60&aggregate=3&e=CCCAGG');
        $histohour = json_decode($res->getBody());
        $data['histohour'] = $histohour;
        return view('market',$data);
    }

    public function showProfile()
    {
        $info = Auth::user();
        $data['profile'] = $info;
        return view('profile',$data);
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect('profil');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if(Hash::make($request->oldpass) != $user->password || $request->newpass != $request->newpassconfirm){
            return redirect ('profil');
        }
        $user->password = Hash::make($request->newpass);
        $user->save();
        return redirect ('profil');
    }
}
