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

Route::post('/search', 'SearchController@search');

Route::get('/favorite', ['as' => 'favorite.tracks', 'uses' => 'TrackController@ViewFavorites']);
Route::get('/remove_favorite', ['as' => 'track.remove.favorite', 'uses' => 'TrackController@RemoveFavorite']);
Route::get('/add_favorite', ['as' => 'track.add.favorite', 'uses' => 'TrackController@AddFavorite']);
Route::get('/my_tracks', ['as' => 'my.tracks', 'uses' =>  'AccountController@MyTracks']);
Route::get('/my_tracks_edit', ['as' => 'tracks.edit.user', 'uses' => 'AccountController@MyTracksEdit']);
Route::post('my_tracks_edit', ['as' => 'update.my.track', 'uses' => 'AccountController@UpdateTrack']);

Route::get('/addtrack', ['as' => 'track.add', 'uses' => 'TrackController@add']);
Route::post('/addtrack', ['as' => 'track.store', 'uses' => 'TrackController@store']);
Route::get('/overview', ['as' => 'track.overview', 'uses' => 'TrackController@overview']);
Route::post('/overview', ['as' => 'track.overview.genre','uses' => 'TrackController@OverviewGenre']);
Route::get('/detail', ['as' => 'track.detail', 'uses' => 'TrackController@detail']);


//Admin Routes
Route::get('/delete_track', ['as' => 'tracks.delete.admin', 'uses'=> 'AdminController@DeleteTrack']);
Route::get('/edit_track', ['as' => 'tracks.edit.admin', 'uses' => 'AdminController@TracksEdit']);
Route::post('/edit_track', ['as' => 'tracks.update.admin', 'uses' => 'AdminController@TracksUpdate']);
Route::get('/tracks_admin', ['as' => 'tracks.admin', 'uses' => 'AdminController@Tracks']);

Route::get('/delete_user', ['as' => 'users.delete.admin', 'uses' => 'AdminController@DeleteUser']);
Route::get('/users_admin', ['as' => 'users.admin', 'uses' => 'AdminController@Users']);