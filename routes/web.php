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

Auth::routes();

Route::get('blog/{slug}','BlogController@getSingle')->where('slug','[\w\d\_\-]+')->name('blog.single');
Route::get('blog','BlogController@getArchive')->name('blog.archive');
Route::get('/','PagesController@getIndex');
Route::get('about','PagesController@getAbout');
Route::get('contact','PagesController@getContact');

Route::resource('posts','PostController');
Route::resource('tags','TagController');

Route::get('categories','CategoryController@index')->name('categories.index');
Route::post('categories','CategoryController@store')->name('categories.store');

Route::post('comments/{post}','CommentController@store')->name('comments.store');
Route::get('comments/{id}/edit','CommentController@edit')->name('comments.edit');
Route::put('comments/{id}','CommentController@update')->name('comments.update');
Route::get('comments/{id}/delete','CommentController@delete')->name('comments.delete');
Route::delete('comments/{id}','CommentController@destroy')->name('comments.destroy');




