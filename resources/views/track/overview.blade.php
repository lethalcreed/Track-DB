@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Track overview</div>
                </div>
                <div class="row">
                    @foreach($tracks->all() as $track)
                        <div class="col-md-4">
                            {{--<a href="{{Route('track.detail',['id' => $track->id])}}">{{HTML::image($track->cover, array('height' => '100', 'width' => '100'))}}</a>--}}
                            <a href="{{Route('track.detail')}}?id={{$track->id}}"><img src="{{$track->cover}}" height="250" width="250"></a><br>
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

