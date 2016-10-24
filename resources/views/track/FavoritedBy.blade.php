@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Favorited by</div>

                    <div class="panel-body">
                        The following users have favorited
                        <br>
                        <table>
                        @foreach($TrackFavorites as $TrackFavorite)
                            <tr>
                            </tr>
                            <tr>
                            </tr>{{$TrackFavorite->name}}
                            <br>
                        @endforeach
                        </table>
                        <br>
                        <a href="/my_tracks">
                            Back to favorites
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection