@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your favorite tracks</div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="row">
                    @foreach($fav_tracks->all() as $track)
                        <div class="col-md-4">
                            <a href="{{Route('track.detail')}}?id={{$track->id}}"><img src="{{$track->cover}}"height="250" width="250"></a><br>
                            {{$track->artist}}
                            {{'-'}}
                            {{$track->title}}
                            {{isset($track->remix) ? ' (' : ''}}
                            {{$track->remix}}
                            {{isset($track->remix) ? ')' : ''}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

