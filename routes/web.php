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
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'FrontController@showPrice');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/market","TradingController@showMarket")->name('market');

// Route::get("/instant", "TradingController@showInstant")->name('instant');

Route::get("/balance","HomeController@showWallet")->name('balance');

Route::get("/balance/{curr}","TransactionController@showUserTransactions");

// Route::get("/profil","TradingController@showMarket")->name('profil');

Route::get("/profil",function(){
	return view('profile');
})->name('profil');

Route::get("/instant",'HomeController@showInstant')->name('instant');

Route::get("/main");

Route::get("/rupiah", function(){
	return view('rupiah');
})->name('rupiah');

Route::get("/btc", function(){
	return view('btc');
})->name('btc');

Route::get('/chart', 'HomeController@showCryptoCharts')->name('chart');

Route::post('/balance/deposit/{curr}','TransactionController@depositMoney');

Route::post('/balance/withdraw/{curr}', 'TransactionController@withdrawMoney');