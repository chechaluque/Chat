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
Route::get('/edit', [
  'uses' => 'ProfileController@getEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
  'uses' => 'ProfileController@postEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
]);
