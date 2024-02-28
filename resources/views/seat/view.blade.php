@extends('layout.backend')
@section('content')
@if(Session::has('seat_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('seat_deleted') !!}
            @endif
        </div>

        <div class="mx-4">
            @if (count($tbl_seat) > 0)
            <a class="btn btn-primary" href="{{url('/seat/create')}}">Create</a>
            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Seat Number</th>
                        <th>Seat Type</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                    @foreach ($tbl_seat as $seat)
                        <tr>
                            <td>
                                <div><a href="{{url('/seat/'.$seat->id)}}">{{ $seat->seat_number }}</a></div>
                            </td>
                            <td>
                                <div>{{ $seat->seat_type->name }}</div>
                            </td>
                            <td>
                                <div>{{ $seat->seat_type->description }}</div>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{!! url('seat-type/' . $seat->id . '/edit') !!}">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(array('url'=>'seat/'. $seat->id, 'method'=>'DELETE')) !!}
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