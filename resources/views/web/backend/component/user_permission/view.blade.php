@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('userpermission_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('userpermission_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>User's Permission</h1>
                @if (count($tbl_user_permission) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{route('userpermission.create')}}">Create</a>
                    </div>
                        @foreach ($tbl_user_permission as $user_permission)
                        {{ $user_permission->name }}
                        @endforeach
                        {{ $tbl_user_permission->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>User</th>
                                <th>Permission</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_user_permission as $user_permission)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('userpermission.show', $user_permission->id)}}">{{ $user_permission->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $user_permission->user_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user_permission->permission_id !!}</div>
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('userpermission.edit', $user_permission->id) }}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('route'=>['userpermission.delete', $user_permission->id], 'method'=>'DELETE')) !!}
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