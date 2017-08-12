<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendShips extends Model
{
   protected $table = "friend_ships";
   protected $fillable = ['requester' , 'user_requested' ,'status'];

   public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
