<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        echo "<script>setTimeout(function(){ window.location.href = 'http://aiox.test/instant'; }, 5000);</script>";
        return view("home");
    }

    public function showCryptoCharts()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=IDR');
        dd(json_decode($res->getBody()));
        return view('chart');
    }

    public function showCryptoCharts()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=IDR');
        dd(json_decode($res->getBody()));
        return view('chart');
    }
}
