<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trades extends Model
{
    //
	protected $fillable = [
      'user_id', 'from_curr', 'to_curr', 'rate', 'is_active'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];
}
