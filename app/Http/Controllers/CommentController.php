<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request )
	{
    
	    $post_id = $request->post_id;

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->post_id = $post_id;
        $comment ->save();
        return back();


	}
}
