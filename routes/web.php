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


Route::get('/','HomeController@index');
 		
Auth::routes();
 	

Route::name('home')->get('home', 'ProfileController@index');


Route::name('profile')->get('/profile/{slug}', 'ProfileController@index');

Route::name('changePhoto')->get('/changePhoto', 'ProfileController@changePhoto');

Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');

Route::name('edit_profile')->get('/editProfile/{slug}', 'ProfileController@editProfile');

Route::post('updateProfile','ProfileController@updateProfile');

Route::name('findfriend')->get('findfriend','FriendShipsController@findfriend');

Route::get('sendRrquest/{id}','FriendShipsController@sendRrquest');

Route::name('viewRequest')->get('viewRequest','FriendShipsController@viewRequest');

Route::get('/accept/{name}/{id}','FriendShipsController@accept');

Route::name('friends')->get('friends','FriendShipsController@friends');

Route::name('removeFriend')->get('removeFriend/{id}','FriendShipsController@removeFriend');

Route::name('notification')->get('notification/{id}','FriendShipsController@notification');

Route::post('/posts/store','PostController@store');

Route::post('/comments/store', 'CommentController@store');

Route::get('/comments', 'CommentController@show');
