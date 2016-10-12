<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class TrackController extends Controller
{
    public function add()
    {
        if (Auth::check()) {
            $genre = DB::table('genre')->get();
            return view('track/track_add', compact('genre'));
        } else {
            return view('auth/login_to_view');
        }
    }

    public function store(Requests\AddTrackRequest $request)
    {
        $user_id = Auth::id();
        if ($request->remix !== '') {
            $remix = ' (' . $request->remix . ')';
        } else {
            $remix = '';
        }
        if ($request->version !== '') {
            $version = '(' . $request->version . ')';
        } else {
            $version = '';
        }
        if ($request->yt_url !== '') {
            $yt_url = 'https://www.youtube.com/embed/' . $request->yt_url;
        } else {
            $yt_url = '';
        }
        DB::table('tracks')->insert(array('title' => $request->title, 'artist' => $request->artist, 'remix' => $remix, 'version' => $version, 'length' => $request->length, 'bpm' => $request->bpm, 'h_key' => $request->h_key, 'cover' => $request->cover, 'yt_url' => $yt_url, 'user_id' => $user_id));
        $GenreTagInfo = DB::TABLE('tracks')->select('id')->where([
            ['title', '=', $request->title],
            ['user_id', '=', $user_id],
        ])->first();
        DB::table('genre_track')->insert(array('genre_id' => $request->Genre, 'tracks_id' => $GenreTagInfo->id));
        return \Redirect::route('track.add')
            ->with('message', 'Track added to the database, Thank you for contributing!');
    }

    public function overview()
    {
        $selected = 'none';
        $tracks = DB::table('tracks')->select('id', 'title', 'artist', 'remix', 'cover')->get();
        $genre = DB::table('genre')->get();

        return view('track/overview', compact('tracks', 'genre', 'selected'));
    }

    public function detail()
    {
        $UserId = Auth::id();
        $TrackId = Input::get('id');
        $track = DB::table('tracks')->where('id', '=', $TrackId)->first();
        $genre = DB::table('genre_track')->join('genre', 'genre_track.genre_id', '=', 'genre.id')
        ->where('genre_track.tracks_id', '=', $TrackId)->first();

        //Favorite system
        if (Auth::check()) {
            $fav_check = DB::table('track_fav')->where([
                ['users_id', '=', $UserId],
                ['tracks_id', '=', $TrackId],
            ])->first();

        }

        return view('track/detail', compact('track', 'TrackId', 'fav_check', 'genre'));
    }

    public function AddFavorite()
    {
        if (Auth::check()) {
            $userid = Auth::id();
            $TrackId = Input::get('id');
            DB::table('track_fav')->insert(array('users_id' => $userid, 'tracks_id' => $TrackId));
            return \Redirect::route('track.overview')
                ->with('message', 'The track has been added to your favorites!');
        } else {
            return view('auth/login_to_view');
        }
    }

    public function ViewFavorites()
    {
        if (Auth::check()) {
            $UserId = Auth::id();
            $fav_tracks = DB::table('track_fav')->join('tracks', 'track_fav.tracks_id', '=', 'tracks.id')
                ->where('track_fav.users_id', '=', $UserId)->get();
            return view('account/favorite_tracks', compact('fav_tracks'));
        } else {
            return view('auth/login_to_view');
        }
    }

    public function RemoveFavorite()
    {
        if (Auth::check()) {
            $userid = Auth::id();
            $TrackId = Input::get('id');
            DB::table('track_fav')->where(array('users_id' => $userid, 'tracks_id' => $TrackId))->delete();
            return \Redirect::route('track.overview')
                ->with('message', 'The track has been removed to your favorites!');
        } else {
            return view('auth/login_to_view');
        }
    }

    public function OverviewGenre(Request $request)
    {
        $selected = $request->Genre;
        if ($request->Genre == 'none') {
            return \Redirect::route('track.overview');
        } else {
            $tracks = DB::table('genre_track')->join('tracks', 'genre_track.tracks_id', '=', 'tracks.id')
                ->where('genre_track.genre_id', '=', $request->Genre)->get();
            $genre = DB::table('genre')->get();
            return view('track/overview', compact('tracks', 'genre', 'selected'));
        }
    }
}
