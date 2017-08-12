<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
 	public function user_notifiable()
    {
    	return $this->belongsTo(User::class,'user_logged');
    }

    public function user_notifire()
    {
    	return $this->belongsTo(User::class,'user_from');
    }
}
