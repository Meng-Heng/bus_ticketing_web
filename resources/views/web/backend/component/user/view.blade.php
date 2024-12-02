@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('user_deleted'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('user_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>Users</h1>
                @if (count($tbl_user) > 0)
                <div class="d-flex flex-row">
                        @foreach ($tbl_user as $user)
                        {{ $user->name }}
                        @endforeach
                        {{ $tbl_user->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Contact</th>
                                <th>Hometown</th>
                                <th>ID Card/Passport</th>
                                <th>Active</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_user as $user)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('user.show', $user->id)}}">{{ $user->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $user->username !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->email !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->gender !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->date_of_birth !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->contact !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->hometown !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->id_card !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->is_active !!}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('user.edit', $user->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(array('route'=>['user.delete', $user->id], 'method'=>'DELETE')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger delete">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @endsection