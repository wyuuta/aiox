<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $this->create_wallet($user);
        return $user;
    }

    private function create_wallet($user)
    {
        //create rupiah wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "IDR";
        $wallet->currency_name = "Rupiah";
        $wallet->balance = 0;
        $wallet->save();

        //create bitcoin wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "BTC";
        $wallet->currency_name = "Bitcoin";
        $wallet->balance = 0;
        $wallet->save();

        //create ethereum wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "ETH";
        $wallet->currency_name = "Ethereum";
        $wallet->balance = 0;
        $wallet->save();

        //create bitcash wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "BCH";
        $wallet->currency_name = "Bitcash";
        $wallet->balance = 0;
        $wallet->save();

        //create ripple wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "XRP";
        $wallet->currency_name = "Ripple";
        $wallet->balance = 0;
        $wallet->save();

        //create litecoin wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "LTC";
        $wallet->currency_name = "Litecoin";
        $wallet->balance = 0;
        $wallet->save();

        //create ethereum classic wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "ETC";
        $wallet->currency_name = "Etherium Classic";
        $wallet->balance = 0;
        $wallet->save();

        //create stellar wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "XLM";
        $wallet->currency_name = "Stellar";
        $wallet->balance = 0;
        $wallet->save();

        //create neo wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "NEO";
        $wallet->currency_name = "NEO";
        $wallet->balance = 0;
        $wallet->save();

        //create nem wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "XEM";
        $wallet->currency_name = "NEM";
        $wallet->balance = 0;
        $wallet->save();

        //create verge wallet
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->currency = "XVG";
        $wallet->currency_name = "Verge";
        $wallet->balance = 0;
        $wallet->save();

    }
}
