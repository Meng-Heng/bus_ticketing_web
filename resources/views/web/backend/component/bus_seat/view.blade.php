@extends('layout.backend')
@section('content')
@if(Session::has('bus_seat_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('bus_seat_deleted') !!}
            @endif
        </div>
        @if(Session::has('bus_seat_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {{ session('bus_seat_updated') }}
    </div>
    @endif
    @if(Session::has('bus_seat_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('bus_seat_created') !!}
                </div>
                @endif

        <div class="mx-4">
            @if (count($tbl_bus_seat) > 0)
            <a class="btn btn-primary" href="{{url('/bus-seat/create')}}">Create</a>
            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Bus</th>
                        <th>Seat</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                    @foreach ($tbl_bus_seat as $bus_seat)
                        <tr>
                            <td>
                                <div><a href="{{url('/bus-seat/'.$bus_seat->id)}}">{{ $bus_seat->bus->bus_plate }}</a></div>
                            </td>
                            <td>
                                <div>{{ $bus_seat->seat->seat_number }}</div>
                            </td>
                            <td>
                                <div>{{ $bus_seat->price->price }}</div>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{!! url('bus-seat/' . $bus_seat->id . '/edit') !!}">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(array('url'=>'bus-seat/'. $bus_seat->id, 'method'=>'DELETE')) !!}
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