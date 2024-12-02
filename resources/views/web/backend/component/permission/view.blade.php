@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('bus_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('bus_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>Permission</h1>
                @if (count($tbl_permission) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{route('permission.create')}}">Create</a>
                    </div>
                        @foreach ($tbl_permission as $permission)
                        {{ $permission->name }}
                        @endforeach
                        {{ $tbl_permission->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Permission</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_permission as $permission)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('permission.show', $permission->id)}}">{{ $permission->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $permission->permission !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $permission->description !!}</div>
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('permission.edit', $permission->id) }}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('route'=>['permission.delete', $permission->id], 'method'=>'DELETE')) !!}
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