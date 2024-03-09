@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seats Detail</h1>
		<div class="card">
            <div class="card-body">
                <!-- Calling from Model -->
                <p>ID: {{$tbl_bus_seat_daily->id}} </p>
                <p>Bus Seat: {{$tbl_bus_seat_daily->bus_seat->id}}</p>
                <p>Departure date: {{$tbl_bus_seat_daily->departure_date}}</p>
                <p>Departure time: {{$tbl_bus_seat_daily->departure_time}}</p>
                <p>Arrival date: {{$tbl_bus_seat_daily->arrival_date}}</p>
                <p>Arrival time: {{$tbl_bus_seat_daily->arrival_time}}</p>
                <p>Sold out: {{$tbl_bus_seat_daily->is_sold}}</p>
                <p>Station name: {{$tbl_bus_seat_daily->station->name}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/schedule')}}">Back</a>
	</div>
</main>
@endsection