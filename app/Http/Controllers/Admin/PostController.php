<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;
class PostController extends Controller
{
    /**
     * Show the application posts index.
     */
    
    public function __construct(){
         $this->middleware('permissions:post-read',['only' => ['index']]);
        // $this->middleware('permissions:post-create',['only' => ['create','store']]);
        // $this->middleware('permissions:post-delete',['only' => ['destroy']]);
        // $this->middleware('permissions:post-update',['only' => ['edit','update']]);
    }
    public function index(): View{

        return view('admin.posts.index', [
            'posts' => Post::with('author','category')->orderBy('created_at','desc')->paginate(10)
        ]);

    }
    public function edit(Post $post): View{

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name','id')
        ]);
    }
    public function update(Request $request , Post $post): RedirectResponse{

    	$post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $this->uploadFileImage($request,$post->image)
        ]);
    	return redirect()->route('admin.posts.index')->withSuccess('Updated Success');
    }
    public function store(PostRequest $request): RedirectResponse{

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => \Auth::id(),
            'category_id' => $request->category_id,
            'posted_at' => Carbon::now(),
            'image' => $this->uploadFileImage($request)
        ]);

        return redirect()->route('admin.posts.index')->withSuccess('Created Success');

    }
    public function create(): View{
        return view('admin.posts.create',[
            'categories' => Category::pluck('name','id')
        ]);
    }
    public function destroy(Post $post): RedirectResponse
    {
        $this->deleteImage($post->image);
    	$post->delete();
        
    	return redirect()->route('admin.posts.index')->withSuccess('Deleted Success');
    }

    public function deleteImage(string $image){
            if(Storage::disk('public')->has('images/'.$image)){
            Storage::disk('public')->delete('images/'.$image);
        }
    }

    public function uploadFileImage(Request $request,string $imageDefault = 'none.png'){

        $image = $imageDefault;

        if($request->has('images')){
            $file = $request->file('images');
            $file_name = sha1(date('YmdHis') . str_random(30)) . '.' . $file->getClientOriginalExtension();
             Storage::disk('public')->putFileAs(
                'images',
                $request->file('images'),
                $file_name
              );

            if($image !== 'none.png'){
                $this->deleteImage($image);
            }

            $image = $file_name;
        }

        return $image;
    }
}
