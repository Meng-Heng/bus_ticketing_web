@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('staff_deleted'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('staff_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>Staff</h1>
                @if (count($tbl_staff) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                    <a class="btn btn-primary" href="{{route('staff.create')}}">Create</a>
                </div>
                        @foreach ($tbl_staff as $staff)
                        {{ $staff->name }}
                        @endforeach
                        {{ $tbl_staff->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User ID</th>
                                <th>Hometown</th>
                                <th>Identification</th>
                                <th>Residency</th>
                                <th>Contact</th>
                                <th>Active</th>
                                <th>Position</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_staff as $staff)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('staff.show', $staff->id)}}">{{ $staff->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->fname !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->lname !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->user_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->hometown !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->identification !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->residency !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->contact !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->is_active !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $staff->position !!}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('staff.edit', $staff->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(array('route'=>['staff.delete', $staff->id], 'method'=>'DELETE')) !!}
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