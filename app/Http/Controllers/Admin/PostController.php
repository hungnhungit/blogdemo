<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
class PostController extends Controller
{
    /**
     * Show the application posts index.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments','tags')->with('author','category')->latest()->paginate(10)
        ]);
    }
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'users' => User::pluck('name','id'),
            'categories' => Category::pluck('name','id')
        ]);
    }
    public function update(Request $request , Post $post): RedirectResponse
    {
    	$post->update($request->only(['title', 'content', 'author_id','category_id']));
    	return redirect()->route('admin.posts.index')->withSuccess('Updated Success');
    }
    public function destroy(Post $post): RedirectResponse
    {
    	$post->delete();
    	return redirect()->route('admin.posts.index')->withSuccess('Deleted Success');
    }
    public function show(){

    }
}
