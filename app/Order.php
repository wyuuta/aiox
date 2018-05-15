<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
		protected $fillable = [
	      'user_id', 'from_curr', 'to_curr', 'rate', 'is_active', 'type'
	  ];

	  protected $primaryKey = 'trade_id';
}
