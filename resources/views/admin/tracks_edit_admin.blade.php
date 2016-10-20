@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update </div>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if(Session::has('message'))
                        <div class="alert alert-info">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::model($Track, ['route' => ['tracks.update.admin', 'class' => 'form']]) !!}

                        <div class="form-group">
                            {!! Form::label('Artist') !!}<br>
                            {!! Form::text('artist') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Title') !!}<br>
                            {!! Form::text('title') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Remix/edit') !!}<br>
                            {!! Form::text('remix') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Version') !!}<br>
                            {!! Form::text('version') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Length') !!}<br>
                            {!! Form::time('length') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Bpm') !!}<br>
                            {!! Form::number('bpm') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Harmonic Key') !!}<br>
                            {!! Form::text('h_key') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre') !!}<br>
                            {!! Form::select('Genre', array('none' => 'None', $genre[0]->id => $genre[0]->genre, $genre[1]->id => $genre[1]->genre, $genre[2]->id => $genre[2]->genre, $genre[3]->id => $genre[3]->genre, $genre[4]->id => $genre[4]->genre), $Selected[0]->id) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Cover url') !!}<br>
                            {!! Form::text('cover') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Youtube url') !!}<br>
                            {!! Form::text('yt_url') !!}
                        </div>
                        {!! Form::hidden('id', $Track->id) !!}
                        <div class="form-group">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
