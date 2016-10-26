<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function RoleCheck()
{
    if (Auth::check()) {
        $id = Auth::id();
        $query = DB::table('users')->where('id', '=', $id)->first();

        $role = $query->role;

        return $role;
    } else {
        return NULL;
    }
}

function ActiveCheck()
{
    if (Auth::check()) {
        $id = Auth::id();
        $query = DB::table('users')->where('id', '=', $id)->first();

        $active = $query->active;

        return $active;
    } else {
        return NULL;
    }
}

function UnlockCheck()
{
    $id = Auth::id();
    $query = DB::table('users')->where('id', '=', $id)->first();

    $state = $query->unlock;

    return $state;
}

function UnlockInit()
{

    $id = Auth::id();
    $query = DB::table('users')->where('id', '=', $id)->first();
    $last_login = $query->last_login;
    $state = $query->unlock;
    $date = date("Ymd");

    if ($state >= 1) {
        if ($last_login < $date) {
            $unlockdays = $state - 1;
            DB::table('users')->where('id', '=', $id)->update(array('last_login' => $date, 'unlock' => $unlockdays));
        }

    }
}
