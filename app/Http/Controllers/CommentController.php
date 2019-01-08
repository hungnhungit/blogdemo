<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request){

    	Comment::create([
    		'content' => $request->comment,
    		'post_id' => $request->post_id,
    		'author_id' => \Auth::id(),
    		'posted_at' => now()
    	]);

    	return back();
    }
}
