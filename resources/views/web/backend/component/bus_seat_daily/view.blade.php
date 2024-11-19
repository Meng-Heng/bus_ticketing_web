@extends('web.backend.layout.admin')
@section('content')
@if(Session::has('schedule_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('schedule_deleted') !!}
            @endif
        </div>
        @if(Session::has('schedule_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('schedule_created') !!}
                </div>
                @endif
        <div class="mx-4">
            @if (is_countable($tbl_ticket) && count($tbl_ticket) > 0)
            <a class="btn btn-primary" href="{{url('/schedule/create')}}">Create</a>
            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Bus Seat ID</th>
                        <th>Destination</th>
                        <th>Departure date</th>
                        <th>Departure time</th>
                        <th>Arrival date</th>
                        <th>Arrival time</th>
                        <th>Sold out</th>
                        <th>Station</th>
                    </thead>
                    <tbody>
                    @foreach ($tbl_ticket as $schedule)
                        <tr>
                            <td>
                                <div><a href="{{url('/schedule/'.$schedule->id)}}">{{ $schedule->bus_seat_id }}</a></div>
                                <!-- referring to the function in the model? -->
                                <div>{{ $schedule->bus_seat->bus->bus_plate}}</div>
                                {{-- <div>{{ $schedule->bus_seat->seat->seat_number}}</div> --}}
                                <div>${{ $schedule->bus_seat->price->price}}</div>
                            </td>
                            <td>
                                <div>{{ $schedule->schedule->destination }}</div>
                            </td>
                            <td>
                                <div>{{ $schedule->departure_date }}</div>
                            </td>
                            <td>
                                <div>{{ $schedule->departure_time }}</div>
                            </td>
                            <td>
                                <div>{{ $schedule->arrival_date }}</div>
                            </td>
                            <td>
                                <div>{{ $schedule->arrival_time }}</div>
                            </td>
                            <td>
                                @if ($schedule->is_sold == 0)
                                    <span style="color:lime">Available</span>
                                        @elseif ($schedule->is_active == 1)
                                        <span style="color:red">Sold out!</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{!! url('schedule/' . $schedule->id . '/edit') !!}">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(array('url'=>'schedule/'. $schedule->id, 'method'=>'DELETE')) !!}
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