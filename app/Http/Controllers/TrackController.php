<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;


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

        /////////////////////////
        //Database insert query//
        /////////////////////////

        return \Redirect::route('track_add')
            ->with('message', 'Track added to the database, Thank you for contributing!');
    }
}
