<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
	protected $fillable = [
      'from_user', 'to_user', 'from_curr', 'to_curr',
      'from_value', 'to_value'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];
}
