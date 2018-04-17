<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainThread extends Model
{
    //
	protected $fillable = [
      'title', 'description','user_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];
}
