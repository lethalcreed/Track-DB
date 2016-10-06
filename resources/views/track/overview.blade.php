@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Track overview</div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="row" style="padding: 10px"><br>
                    @foreach($tracks->all() as $track)

                        <div class="col-md-4 overview">
                            <a href="{{Route('track.detail')}}?id={{$track->id}}"><img src="{{$track->cover}}"
                                                                                       height="100%"
                                                                                       width="100%"></a><br>

                            {{$track->artist}}
                            {{'-'}}
                            @if($track->remix == '')
                                {{$track_title = $track->title}}
                            @else
                                {{$track_title = $track->title . $track->remix}}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

