<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
	protected $fillable = [
      'user_id', 'currency', 'balance'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];

  protected $primaryKey = 'wallet_id';
}
