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

Route::get("/balance","HomeController@showWallet")->name('balance');

Route::get("/balance/{curr}","TransactionController@showUserTransactions");

Route::post("/instant/buy","TransactionController@instantBuy");

Route::post("/instant/sell","TransactionController@instantSell");

Route::get("/profil", 'HomeController@showProfile')->name('profil');

Route::post("/profil/submit", 'HomeController@editProfile');

Route::post("/profil/changepass", 'HomeController@changePassword');

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

// Route::get('/market',function(){
// 	return view('market');
// })->name('market');

Route::get('market/{from}/{to}', 'TradingController@showMarket');

Route::get('/market/{from}/{to}', 'TradingController@showMarket');

Route::post('/market/buy', 'TradingController@createBuyOrder');

Route::post('/market/sell', 'TradingController@createSellOrder');
