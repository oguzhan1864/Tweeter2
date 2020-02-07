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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

//Route::get('/home', 'HomeController@show');

Route::get('/home', 'FeedController@feed');

Route::post('/addTweet', 'FeedController@addTweet');

Route::get('/deleteTweet', 'FeedController@deleteTweet');

Route::get('/feed', 'FeedController@feed');

Route::get('/profile', 'ProfileController@index');

