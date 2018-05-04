<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use GuzzleHttp\Client;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/market","TradingController@showMarket")->name('market');

Route::get("/instant", "TradingController@showInstant")->name('instant');

Route::get("/balance","TradingController@showMarket")->name('balance');

Route::get("/profil","TradingController@showMarket")->name('profil');

Route::get("/main");

// Example to get real time crypto price data
Route::get('/contoh', function(){
	$client = new Client();
    $response = $client->get("https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=USD,EUR");

	return $response;
});

