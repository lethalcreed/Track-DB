@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$track->artist}}{{ ' - '}}{{$track->title}}{{$track->remix}}

                        @if(Auth::check())
                            @if(isset($fav_check->tracks_id) && $fav_check->tracks_id == $track->id)
                                <a href="{{Route('track.remove.favorite')}}?id={{$track->id}}"><img
                                            src="images/favorite.png" height="25" width="25" style="float: right"></a>
                                <br>
                            @else
                                <a href="{{Route('track.add.favorite')}}?id={{$track->id}}"><img
                                            src="images/non_favorite.png" height="25" width="25"
                                            style="float: right"></a><br>
                            @endif

                        @else
                            <a href="{{Route('please.login')}}"><img
                                        src="images/non_favorite.png" height="25" width="25" style="float: right"></a>
                            <br>
                        @endif
                    </div>
                    <div class="panel panel-body">
                        <div class="col-md-5">

                            <img src="{{$track->cover}}" height="250" width="250">
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td>
                                        Artist:
                                    </td>
                                    <td>
                                        {{$track->artist}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Title:
                                    </td>
                                    <td>
                                        {{$track->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Remix:
                                    </td>
                                    <td>
                                        {{$track->remix}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Version:
                                    </td>
                                    <td>
                                        {{$track->version}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Length:
                                    </td>
                                    <td>
                                        {{$track->length}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        BPM:
                                    </td>
                                    <td>
                                        {{$track->bpm}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Harmonic Key:
                                    </td>
                                    <td>
                                        {{$track->h_key}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Genre:
                                    </td>
                                    <td>
                                        {{$genre->genre}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8"><br>
                            <iframe width="100%" height="300" src="{{$track->yt_url}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

