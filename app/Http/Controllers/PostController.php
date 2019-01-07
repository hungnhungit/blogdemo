<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(Request $request){
    	return view('posts.index',[
    		'posts' => Post::search($request->input('q'))
                         ->with(['author','category'])
                         ->withCount('comments','tags')
                         ->latest()
                         ->paginate(9)
    	]);
    }

     public function show(string $slug){
     	$post = Post::where('slug',$slug)->first();

    	return view('posts.show',['post' => $post]);
    }
}
