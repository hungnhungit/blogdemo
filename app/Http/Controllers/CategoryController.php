<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class CategoryController extends Controller
{
    public function show(string $slug){
    	$category = Category::where('slug',$slug)->first();
    	return view('posts.index',[
    		'posts' => Post::where('category_id',$category->id)->QueryBuilderPost()
    	]);
    }
}
