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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/account', ['as' => 'account', 'uses' => 'AccountController@AccountInfo']);
Route::post('/account', ['as' => 'update.info', 'uses' => 'AccountController@Update']);

Route::get('/addtrack', ['as' => 'track.add', 'uses' => 'TrackController@add']);
Route::post('/addtrack', ['as' => 'track.store', 'uses' => 'TrackController@store']);
Route::get('/overview', 'TrackController@overview');
Route::get('/detail', ['as' => 'track.detail', 'uses' => 'TrackController@detail']);