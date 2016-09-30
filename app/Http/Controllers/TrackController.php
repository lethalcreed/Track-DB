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
            return view('track/track_add');
        } else {
            return view('auth/login_to_view');
        }
    }

    public function store(Requests\AddTrackRequest $request)
    {
        $user_id = Auth::id();
        DB::table('tracks')->insert(array('title' => $request->title, 'artist' => $request->artist, 'remix' => $request->remix, 'length' => $request->length, 'bpm' => $request->bpm, 'h_key' => $request->h_key, 'cover' => $request->cover, 'user_id' => $user_id));

        return \Redirect::route('track.add')
            ->with('message', 'Track added to the database, Thank you for contributing!');
    }

    public function overview()
    {
        $tracks = DB::table('tracks')->select('id', 'title', 'artist', 'remix', 'cover')->get();

        return view('track/overview', compact('tracks'));
    }

    public function detail()
    {
        $TrackId = Input::get('id');
        $track = DB::table('tracks')->where('id', '=', $TrackId)->get();

        return view('track/detail', compact('track', 'TrackId'));
    }
}
