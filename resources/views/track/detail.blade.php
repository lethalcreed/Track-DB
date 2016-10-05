@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$track[0]->artist}}{{ ' - '}}{{$track[0]->title}}{{$track[0]->remix}}

                        @if(Auth::check())
                            @if(isset($fav_check[0]->tracks_id) && $fav_check[0]->tracks_id == $track[0]->id)
                                <a href="{{Route('track.remove.favorite')}}?id={{$track[0]->id}}"><img
                                            src="images/favorite.png" height="25" width="25" style="float: right"></a>
                                <br>
                            @else
                                <a href="{{Route('track.add.favorite')}}?id={{$track[0]->id}}"><img
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

                            <img src="{{$track[0]->cover}}" height="250" width="250">
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td>
                                        Artist:
                                    </td>
                                    <td>
                                        {{$track[0]->artist}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Title:
                                    </td>
                                    <td>
                                        {{$track[0]->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Remix:
                                    </td>
                                    <td>
                                        {{$track[0]->remix}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Version:
                                    </td>
                                    <td>
                                        {{$track[0]->version, 'Original Mix'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Length:
                                    </td>
                                    <td>
                                        {{$track[0]->length}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        BPM:
                                    </td>
                                    <td>
                                        {{$track[0]->bpm}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Harmonic Key:
                                    </td>
                                    <td>
                                        {{$track[0]->h_key}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8"><br>
                            <iframe width="100%" height="300" src="{{$track[0]->yt_url}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

