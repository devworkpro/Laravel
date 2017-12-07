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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Post Management*/
Route::get('post', 'postcontroller@Post');
Route::get('addpost', 'postcontroller@AddPost');
Route::post('savepost', 'postcontroller@SavePost');


/* Profile Management*/
Route::get('editprofile', 'profilecontroller@EditProfile');
Route::post('saveprofile', 'profilecontroller@SaveProfile');
Route::post('edit/{id}', array('as'=>'edit','uses'=>'profilecontroller@edit'));


/* Comment Management*/
//Route::get('savecomment', 'commentcontroller@SaveComment');
//Route::post('savecomment', 'commentcontroller@SaveComment');
Route::post('savecomment/{id}', array('as'=>'savecomment','uses'=>'commentcontroller@SaveComment'));
