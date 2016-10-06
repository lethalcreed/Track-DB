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
Route::get('/notloggedin', ['as' => 'please.login', 'uses' => 'AccountController@NotLoggedIn']);
Route::post('/account', ['as' => 'update.info', 'uses' => 'AccountController@Update']);


Route::get('/favorite', ['as' => 'favorite.tracks', 'uses' => 'TrackController@ViewFavorites']);
Route::get('/remove_favorite', ['as' => 'track.remove.favorite', 'uses' => 'TrackController@RemoveFavorite']);
Route::get('/add_favorite', ['as' => 'track.add.favorite', 'uses' => 'TrackController@AddFavorite']);
Route::get('/my_tracks', ['as' => 'my.tracks', 'uses' =>  'AccountController@MyTracks']);
Route::get('/my_tracks_edit', ['as' => 'tracks.edit.user', 'uses' => 'AccountController@MyTracksEdit']);
Route::post('my_tracks_edit', ['as' => 'update.my.track', 'uses' => 'AccountController@UpdateTrack']);
//Route::get('/tracks_edit', ['as' => 'tracks.edit.admin', 'uses' => 'AccountController@MyTracksEditAdmin']);

Route::get('/addtrack', ['as' => 'track.add', 'uses' => 'TrackController@add']);
Route::post('/addtrack', ['as' => 'track.store', 'uses' => 'TrackController@store']);
Route::get('/overview', ['as' => 'track.overview', 'uses' => 'TrackController@overview']);
Route::get('/detail', ['as' => 'track.detail', 'uses' => 'TrackController@detail']);