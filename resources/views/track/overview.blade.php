@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Track overview
                        <div class="genre">
                            {!! Form::open(array('route' => 'track.overview.genre', 'method' => 'post')) !!}
                            {!! Form::select('Genre', array('none' => 'None', $genre[0]->id => $genre[0]->genre, $genre[1]->id => $genre[1]->genre, $genre[2]->id => $genre[2]->genre, $genre[3]->id => $genre[3]->genre, $genre[4]->id => $genre[4]->genre), $selected) !!}
                            {!! Form::submit('Genre selecteren') !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="row overview"><br>
                    @foreach($tracks->all() as $track)

                        <div class="col-md-4">
                                <a href="{{Route('track.detail')}}?id={{$track->id}}"><img src="{{$track->cover}}"
                                                                                           height="100%"
                                                                                           width="100%"></a><br>

                                {{$track->artist}}
                                {{'-'}}
                                @if($track->remix == '')
                                    {{$track_title = $track->title}}
                                    <br>
                                    <br>
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

