<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\User;
use App\Quotation;
use App\Profile;
use App\Notification;
use App\FriendShips;

class FriendShipsController extends Controller
{
    public function findfriend()
    {
    	$uid = Auth::User()->id;

        $allUsers = Profile::where('user_id', '!=', $uid)->get();
        $allUsers->load('user');

        foreach ($allUsers as $key => $user) {
            $check = FriendShips::where([['user_requested', '=', $user->id],['requester', '=', $uid]])
                                ->orWhere([['requester', '=', $user->id],['user_requested', '=', $uid]])
                                ->first();
            if(count($check)){
                $user['exist_friend'] = 1;
            }else{
                $user['exist_friend'] = 0;
            }
        }
        
    	return view('profile.friendship', compact('allUsers'));
    }

    public function sendRrquest($id)

    {
    	return Auth::user()->addFriend($id);

    	return back();
    }

	
	public function viewRequest()

    {	
    	$uid = Auth::user()->id;
        $FriendRequests = DB::table('friend_ships')
                        ->rightJoin('users', 'users.id', '=', 'friend_ships.requester')
                        ->where('status', '=', 0)
                        ->where('friend_ships.user_requested', '=', $uid)->get();

    	// $FriendRequests = FriendShips::where('status', 0)
     //                    ->where('friend_ships.user_requested' , '=' ,$uid )

     //                    ->get();

    	return view('profile.requests' ,compact('FriendRequests'));

    }   

    public function accept($name , $id)
    {
        $uid = Auth::user()->id;
        $checkRequest = FriendShips::where('requester' ,$id)
                        ->where('user_requested',$uid)
                        ->first();
        if ($checkRequest)
        {
            $updateFriendship = FriendShips::where('user_requested', $uid)
                        ->where('requester', $id)
                        ->update(['status' => 1]);

            
        

        $notification = new Notification ;

            $notification->user_logged = $id;
            $notification->note = 'accept your friend request';
            $notification->user_from = Auth::user()->id;
            $notification->status = '1';
            $notification->save();

        if($notification){
            return back()->with('msg','you are now friend with ');
        }  
        }
        else 
            {
                return back()->with('msg','You are now Friend with this user');
            }              
             
    } 

    public function friends()
    {
        $uid = Auth::user()->id;

        $friends1 = DB::table('friend_ships')
                ->leftJoin('users', 'users.id', 'friend_ships.user_requested') // who is not loggedin but send request to
                ->where('status', 1)
                ->where('requester', $uid) // who is loggedin
                ->get();

        //dd($friends1);

        $friends2 = DB::table('friend_ships')
                ->leftJoin('users', 'users.id', 'friend_ships.requester')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

        return view('profile.friend', compact('friends'));
    }


    public function removeFriend($id)
    {
        FriendShips::where('user_requested' ,Auth::user()->id)
                        ->where('requester' ,$id)
                        ->delete();

        return back()->with('msg', 'request has been removed');      
    }

    public function notification($id) {
        
        $notes = Notification::where('user_logged', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        $notes->load('user_notifire');
        $updateNoti = Notification::where('id', $id)
                        ->update(['status' => 0]);

                    
       return view('profile.notification', compact('notes'));
    }
    
}
