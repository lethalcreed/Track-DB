@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All tracks</div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-info">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <td>
                                    {{--Track image small--}}
                                </td>
                                <td>
                                    Artist:
                                </td>
                                <td>
                                    Title:
                                </td>
                                <td>
                                    Creator:
                                </td>
                                <td>
                                    {{--Edit button--}}
                                </td>
                                <td>
                                    {{--Delete button--}}
                                </td>
                            </tr>
                            @foreach($my_tracks->all() as $track)
                                <tr>
                                    <td>
                                        <img src="{{$track->cover}}" height="75" width="75">
                                    </td>
                                    <td>
                                        {{$track->artist}}
                                    </td>
                                    <td>
                                        {{$track->title}}
                                        {{$track->remix}}
                                    </td>
                                    <td>
                                        {{$track->name}}
                                    </td>
                                    <td>
                                        <a href="{{Route('tracks.edit.admin')}}?id={{$track->id}}">Edit</a><br>

                                    </td>
                                    <td>
                                        <a href="{{Route('tracks.delete.admin')}}?id={{$track->id}}">Delete</a><br></td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

