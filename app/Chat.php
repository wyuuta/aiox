<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
	protected $fillable = [
      'from_user', 'content'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];

  protected $primaryKey = 'chat_id';
}
