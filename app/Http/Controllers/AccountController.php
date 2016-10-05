<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function AccountInfo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('account/account', compact('user'));
        } else {
            return view('auth/login_to_view');
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
        return view('auth/login_to_view');
    }
}
