<?php
namespace App\Traits;
use App\Traits\Friendable;
use App\Friendships;
trait Friendable
{
	

	public function addFriend($id)
	{
		$Friendship = Friendships::create([
			'requester' => $this->id,
			'user_requested' => $id,
			]);
		
			return back();
		

	}
}