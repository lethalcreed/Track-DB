@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All users</div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    Id:
                                </td>
                                <td>
                                    Name:
                                </td>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    Role:
                                </td>
                                <td>
                                    Created:
                                </td>
                                <td>
                                    Active:
                                </td>
                            </tr>
                            @foreach($users->all() as $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->role}}
                                    </td>
                                    <td>{{$user->created_at}}

                                    </td>
                                    <td>
                                        @if($user->active == 1)
                                            <img src="images/active.png" height="39" width="70" class="toggle" id="{{$user->id}}">
                                        @else
                                            <img src="images/nonactive.png" height="39" width="70" class="toggle" id="{{$user->id}}">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/toggle.js') }}"></script>
    </div>
@endsection

