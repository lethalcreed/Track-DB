<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    public function AccountInfo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('account/account', compact('user'));
        } else {
            return view('errors/login_to_view');
        }
    }

    public function Update(Requests\UpdateInfoRequest $request)
    {
        $userid = Auth::id();
        DB::table('users')->where('id', '=', $userid)->update(array('name' => $request->get('name'), 'email' => $request->get('email')));

        return \Redirect::route('account')
            ->with('message', 'Your info has been updated!');
    }

    public function NotLoggedIn()
    {
        return view('errors/login_to_view');
    }

    public function MyTracks()
    {
        if (Auth::check()) {
            $id = Auth::id();
            $my_tracks = DB::table('tracks')->where('user_id', '=', $id)->get();

            foreach ($my_tracks as $track) {
                $favoritecount[$track->id] = DB::table('track_fav')->where('tracks_id', '=', $track->id)->count();
            }

            return view('account/my_tracks', compact('my_tracks', 'favoritecount'));
        } else {
            return view('errors/login_to_view');
        }
    }

    public function MyTracksEdit()
    {
        if (Auth::check()) {
            $TrackId = Input::get('id');
            $UserId = Auth::id();
            $Track = DB::table('tracks')->where('id', '=', $TrackId)->first();
            $genre = DB::table('genre')->get();
            $Selected = DB::table('genre_track')->join('genre', 'genre_track.genre_id', '=', 'genre.id')
                ->where('genre_track.tracks_id', '=', $TrackId)->get();

            if ($Track->user_id !== $UserId) {
                return \Redirect::route('my.tracks')
                    ->with('message', 'This track is not yours!');
            } else {
                return view('account/edit_track', compact('Track', 'genre', 'Selected'));
            }
        } else {
            return view('errors/login_to_view');
        }
    }

    public function UpdateTrack(Requests\UpdateTrackRequest $request)
    {
        DB::table('tracks')->where('id', '=', $request->id)->update(array('title' => $request->title, 'artist' => $request->artist, 'remix' => $request->remix, 'version' => $request->version, 'length' => $request->length, 'bpm' => $request->bpm, 'h_key' => $request->h_key, 'cover' => $request->cover, 'yt_url' => $request->yt_url));
        DB::table('genre_track')->where('tracks_id', '=', $request->id)->update(array('genre_id' => $request->Genre));

        return \Redirect::route('my.tracks')
            ->with('message', 'The track has been updated!');

    }
}
