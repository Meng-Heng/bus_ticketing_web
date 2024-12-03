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
            <h1>Schedule</h1>
            @if (count($tbl_schedule) > 0)
            <div class="d-flex flex-row">
                <div class="col">
                    <a class="btn btn-primary" href="{{route('schedule.create')}}">Create</a>
                </div>
                <div class="row">
                    <div class="col">
                        @foreach ($tbl_schedule as $schedule)
                        {{ $schedule->name }}
                        @endforeach
                        {{ $tbl_schedule->appends(request()->query())->links() }}
                    </div>
                </div>
                <div class="col">
                    <form method="GET" action="{{ route('schedule.view') }}">
                        <div class="form-group d-flex flex-col justify-content-center align-items-center">
                            <label for="bus_id" class="mx-2">Filter</label>
                            <select name="bus_id" id="bus_id" class="form-control mx-1">
                                <option value="">All Buses</option>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}" {{ request('bus_id') == $bus->id ? 'selected' : '' }}>
                                        {{ $bus->id }} - {{ $bus->bus_plate }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if (is_countable($tbl_schedule) && count($tbl_schedule) > 0)
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>Bus ID</th>
                            <th>Origin</th>
                            <th>Departure date</th>
                            <th>Departure time</th>
                            <th>Destination</th>
                            <th>Arrival date</th>
                            <th>Arrival time</th>
                            <th>Sold out</th>
                        </thead>
                        <tbody>
                        @foreach ($tbl_schedule as $schedule)
                            <tr>
                                <td>
                                    <div>{{ $schedule->id}}</div>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('schedule.show', $schedule->id)}}">{{ $schedule->bus_id }}</a>
                                        <p>{{ $schedule->bus->bus_plate }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $schedule->origin }}</div>
                                </td>
                                <td>
                                    <div>{{ $schedule->departure_date }}</div>
                                </td>
                                <td>
                                    <div>{{ $schedule->departure_time }}</div>
                                </td>
                                <td>
                                    <div>{{ $schedule->destination }}</div>
                                </td>
                                <td>
                                    <div>{{ $schedule->arrival_date }}</div>
                                </td>
                                <td>
                                    <div>{{ $schedule->arrival_time }}</div>
                                </td>
                                <td>
                                    @if ($schedule->sold_out == 0)
                                        <span style="color:rgb(54, 153, 54)">Available</span>
                                    @elseif ($schedule->sold_out == 1)
                                        <span style="color:red">Sold out!</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{!! route('schedule.edit', $schedule->id) !!}">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(array('route'=>['schedule.delete', $schedule->id], 'method'=>'DELETE')) !!}
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