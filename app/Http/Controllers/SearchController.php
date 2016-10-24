<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search()
    {
        $data = Request::capture()->all();
        $searchQuery = $data['searchInput'];
        $tagInput = $data['tagInput'];

        if ($tagInput == 'none') {
            $tracks = DB::table('tracks')
                ->where('tracks.artist', 'like', '%' . $searchQuery . '%')
                ->orWhere('tracks.title', 'like', '%' . $searchQuery . '%')
                ->orWhere('tracks.remix', 'like', '%' . $searchQuery . '%')
                ->get();
        } else {
            $tracks = DB::table('genre_track')
                ->join('tracks', 'genre_track.tracks_id', '=', 'tracks.id')
                ->where('genre_track.genre_id', '=', $tagInput)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('tracks.artist', 'like', '%' . $searchQuery . '%')
                        ->orWhere('tracks.title', 'like', '%' . $searchQuery . '%')
                        ->orWhere('tracks.remix', 'like', '%' . $searchQuery . '%');
                })
                ->get();

        }

        $viewData = [
            'searchQuery' => $searchQuery,
            'tracks' => $tracks,
            'tagInput' => $tagInput,
        ];

        return $viewData;
    }
}
