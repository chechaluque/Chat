<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
  'uses' => "HomeController@index",
  'as' => "home"
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/search', [
  'uses' => 'SearchController@getResult',
  'as' => 'search',
]);

Route::get('/user/{username}', [
  'uses' => 'ProfileController@getProfile',
  'as' => 'profile',
]);
Route::get('/profile/edit', [
  'uses' => 'ProfileController@getEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
  'uses' => 'ProfileController@postEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
]);

Route::get('/friends', [
  'uses' => 'FriendController@getFriend',
  'as' => 'firends.index',
  'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
  'uses' => 'FriendController@getAdd',
  'as' => 'firends.add',
  'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}', [
  'uses' => 'FriendController@getAccept',
  'as' => 'firends.accept',
  'middleware' => ['auth'],
]);
/**
*Statuses
*/
Route::post('/status', [
  'uses' => 'StatusController@postStatus',
  'as' => 'status.post',
  'middleware' => ['auth'],
]);
Route::post('/status/{statusId}/reply', [
  'uses' => 'StatusController@postReply',
  'as' => 'status.reply',
  'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
  'uses' => 'StatusController@getLike',
  'as' => 'status.like',
  'middleware' => ['auth'],
]);
