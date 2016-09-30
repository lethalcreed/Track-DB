@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Track overview</div>
                    <div class="panel-body">
                        @foreach($tracks->all() as $track)
                            <div class="center-block">
                                <a href="{{Route('track.detail',['id' => $track->id])}}">{{HTML::image($track->cover, array('height' => '100', 'width' => '100'))}}</a>
                                <li>{{ $track->artist, '-', $track->title, '(', $track->remix, ')'}}</li>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

