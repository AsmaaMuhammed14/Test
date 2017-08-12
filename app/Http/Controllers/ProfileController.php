<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Quotation;
use App\Profile;
use App\Post;

class ProfileController extends Controller
{
    public function index($slug) {

         $userData = DB::table('users')
         ->leftJoin('profiles', 'profiles.user_id','users.id')
         ->where('slug', $slug)
         ->get();

         $user_id = Auth::user()->id;

         $myPosts = Post::where('user_id', $user_id)
                        ->get();
        

        return view('profile.index', compact('userData','myPosts'))->with('data', Auth::user()->profile);
    }

    public function changePhoto()
    {
    	return view ('profile.pic');
    }

    public function uploadPhoto(Request $request)
    {
    	 $file = $request->file('pic');
        $filename = $file->getClientOriginalName();

    	 $path = 'public/img';
    	 $file->move($path ,$filename);
    	 $user_id = Auth::user()->id;

    	 DB::table('users')->where('id',$user_id)->update(['pic'=>$filename]);
    	 return back();

    }

    
    public function editProfile($slug) 
    {

        $user = User::with('profile')->where('slug', $slug)->first();
        return view('profile.editProfile', compact('user'));
    

    }

    public function updateProfile(Request $request)
    {
        
        $user_id = Auth::user()->id;

        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        return back();
    }
    

}


