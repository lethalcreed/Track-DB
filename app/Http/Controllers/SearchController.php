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
        $searchQuery = $data['inputData'];
        $tracks = DB::table('tracks')
            ->where('tracks.artist', 'like', '%' . $searchQuery . '%')
            ->orWhere('tracks.title', 'like', '%' . $searchQuery . '%')
            ->orWhere('tracks.remix', 'like', '%' . $searchQuery . '%')
            ->get();

        $viewData = [
            'searchQuery' => $searchQuery,
            'tracks' => $tracks,
        ];
        
        return $viewData;
    }
}
