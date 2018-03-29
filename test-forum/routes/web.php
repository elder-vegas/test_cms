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

Route::get('/', 'ThreadController@index');
Route::get('/thread/create', 'ThreadController@create');
Route::get('/thread/{id}', 'ThreadController@show');
Route::get('/thread/{id}/edit', 'ThreadController@edit');
Route::delete('/thread/{id}', 'ThreadController@destroy');
Route::post('/thread', 'ThreadController@store');
Route::patch('/thread/{id}', 'ThreadController@update');
Route::post('/thread/{id}/subscribe', 'ThreadController@subscribe');

Route::get('/thread/{thread_id}/{comment_id}/edit', 'CommentController@edit');
Route::post('/thread/{thread_id}/comments', 'CommentController@store');
Route::delete('/thread/{thread_id}/{comment_id}', 'CommentController@destroy');
Route::patch('/thread/{thread_id}/{comment_id}', 'CommentController@update');

Route::post('/comments/{comment_id}/favorite', 'CommentController@favorite');

Route::get('/profile', 'UserController@show');
Route::post('/profile', 'UserController@storeAvatar');
Route::get('/profile/password/change', 'UserController@edit');
Route::post('/profile/password/change', 'UserController@change');

Auth::routes();
