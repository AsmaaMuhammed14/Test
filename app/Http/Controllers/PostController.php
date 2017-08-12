<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use DB;

class PostController extends Controller
{
    public function index()
    {
    	$posts = DB::table('posts')
    			->leftJoin('profiles', 'profiles.id', 'posts.user_id')
    			->leftJoin('users' ,'users.id' ,'posts.user_id')
    			->get();

                // $posts = Post::with('user')->get();
                

    	return view ('welcome' ,compact('posts'));
    }	

    
    public function show(Request $request)
    {
        $user_id = $request->user()->id;

        $myPosts = Post::where('user_id', $user_id)
                        ->orderBy('created_at', 'DESC')
                        ->get();
        
                  
        return view('profile.index',compact('myPosts'));
    
    }

    public function store(Request $request)
    {
        $user_id = $request->user()->id;

        $post = new Post;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post ->save();
        return redirect('/');

    }
}
