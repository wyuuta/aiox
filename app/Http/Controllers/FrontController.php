<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Wallet;
use App\User;
use Auth;
use Redirect;

class FrontController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPrice()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=ETH,BTC,BCH,XRP,LTC,ETC,XLM,NEO,XEM,XVG&tsyms=IDR');
        
        $prices = json_decode($res->getBody(), true);
        
        $data['prices'] = $prices['RAW'];
        return view('index',$data);
    }
}
