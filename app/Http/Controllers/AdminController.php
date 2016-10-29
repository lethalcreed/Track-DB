<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{

    public function Tracks()
    {

        if (Auth::check()) {
            $id = Auth::id();
            $role = DB::table('users')->where('id', '=', $id)->first();
            if ($role->role == 1) {
                $my_tracks = DB::table('tracks')->join('users', 'tracks.user_id', '=', 'users.id')->get();

                return view('admin/tracks_admin', compact('my_tracks'));
            } else {
                return view('errors/unauthorized');
            }
        } else {
            return view('errors/unauthorized');
        }

    }

    public function TracksEdit()
    {
        if (Auth::check()) {
            $TrackId = Input::get('id');
            if (RoleCheck() == 1) {
                $Track = DB::table('tracks')->where('id', '=', $TrackId)->first();
                $genre = DB::table('genre')->get();
                $Selected = DB::table('genre_track')->join('genre', 'genre_track.genre_id', '=', 'genre.id')
                    ->where('genre_track.tracks_id', '=', $TrackId)->get();
                return view('admin/tracks_edit_admin', compact('Track', 'genre', 'Selected'));
            } else {
                return view('errors/unauthorized');
            }
        } else {
            return view('errors/unauthorized');
        }
    }

    public function TracksUpdate(Requests\UpdateTrackRequest $request)
    {
        DB::table('tracks')->where('id', '=', $request->id)->update(array('title' => $request->title, 'artist' => $request->artist, 'remix' => $request->remix, 'version' => $request->version, 'length' => $request->length, 'bpm' => $request->bpm, 'h_key' => $request->h_key, 'cover' => $request->cover, 'yt_url' => $request->yt_url));
        DB::table('genre_track')->where('tracks_id', '=', $request->id)->update(array('genre_id' => $request->Genre));

        return \Redirect::route('tracks.admin')
            ->with('message', 'The track has been updated!');

    }

    public function DeleteTrack()
    {
        if (Auth::check()) {
            if (RoleCheck() == 1) {
                $TrackId = Input::get('id');
                DB::table('tracks')->where('id', '=', $TrackId)->delete();

                return \Redirect::route('tracks.admin')
                    ->with('message', 'The track has been deleted!');
            } else {
                return view('errors/unauthorized');
            }
        } else {
            return view('errors/unauthorized');
        }
    }

    public function Users()
    {
        if (Auth::check()) {
            if (RoleCheck() == 1) {
                $users = DB::table('users')->where('role', '=', '2')->get();

                return view('admin/users', compact('users'));
            } else {
                return view('errors/unauthorized');
            }
        } else {
            return view('errors/unauthorized');
        }
    }

    public function toggle()
    {
        $data = Request::capture()->all();

        $state = DB::table('users')->where('id', '=', $data['User_id'])->first();

        if ($state->active == 1) {
            DB::table('users')->where('id', '=', $data['User_id'])->update(array('active' => 0));
            $toggleState = 'images/nonactive.png';
        } else {
            DB::table('users')->where('id', '=', $data['User_id'])->update(array('active' => 1));
            $toggleState = 'images/active.png';

        }
        return $toggleState;
  }
}
