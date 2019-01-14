<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['prefix' => 'admin','middleware'=>'roles:Admin|Member','namespace'=>'Admin','as'=>'admin.'], function() {
	Route::get('dasboash','AdminController@index');
	Route::resource('posts', 'PostController');
	Route::resource('categories', 'CategoryController');
});


Route::group(['prefix' => '','middleware'=>'auth'], function() {
  	Route::post('comment/store','CommentController@store')->name('comment.store');
});
Route::get('/', 'PostController@index')->name('home');
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');
Route::get('categories/{slug}','CategoryController@show')->name('categories.show');
Route::post('comment/store','CommentController@store')->name('comment.store');
Auth::routes();


Route::group(['middleware'=>['roles:Admin']],function(){
	Route::get('testmiddleware', function() {
	    return "pass";
	})->middleware('permissions:post-create');
});
