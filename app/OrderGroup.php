<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGroup extends Model
{
    //
		protected $fillable = [
	      'from_curr', 'to_curr', 'rate', 'total', 'type'
	  ];

	  protected $primaryKey = 'trade_group_id';
}
