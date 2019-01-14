<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View{
        return view('admin.categories.index', [
            'categories' => Category::with('parentId')->get()
        ]);
    }
    public function edit(Category $category): View{

        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::where('slug','!=',$category->slug)->pluck('name','id')
        ]);
    }
    public function update(Request $request , Category $category): RedirectResponse{
    	$category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id == $category->id || Category::where('id',$request->parent_id)->first()->parent_id == $category->id ? null : $request->parent_id
        ]);
    	return redirect()->route('admin.categories.index')->withSuccess('Updated Success');
    }

    public function store(Request $request): RedirectResponse{

        $this->categoriesValidate($request);

    	Category::create([
    		'name' => $request->name,
    		'order' => Category::max('order') + 1,
    		'parent_id' => $request->parent_id
    	]);
        
        return redirect()->route('admin.categories.index')->withSuccess('Created Success');

    }

    public function create(): View{
        return view('admin.categories.create',[
            'categories' => Category::pluck('name','id')
        ]);
    }
    public function destroy(Category $category): RedirectResponse
    {
    	$category->delete();
    	return redirect()->route('admin.categories.index')->withSuccess('Deleted Success');
    }
    public function show(){

    }

    function categoriesValidate($request){
        $this->validate($request,
            [
                'name' => 'required'
            ]
            ,
            [
                'name.required' => 'Name không để trống'
            ]
        );
    }
}
