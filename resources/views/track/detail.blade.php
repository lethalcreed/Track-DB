@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Track overview</div>
                    <div class="row">
                        <div class="col-md-4">

                            <img src="{{$track[0]->cover}}" height="250" width="250">
                        </div>
                        <div class="col-md-4">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

