@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update account info</div>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if(Session::has('message'))
                        <div class="alert alert-info">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['update.info', 'class' => 'form', $user->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('Your username') !!}<br>
                            {!! Form::text('name') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Your E-mail') !!}<br>
                            {!! Form::email('email') !!}
                        </div>
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
