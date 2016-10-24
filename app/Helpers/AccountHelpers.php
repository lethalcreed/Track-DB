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