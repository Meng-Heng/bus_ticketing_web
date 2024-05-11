@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seats Detail</h1>
		<div class="card">
            <div class="card-body">
                <!-- Calling from Model -->
                <p>ID: {{$tbl_ticket->id}} </p>
                <p>Issued date: {{$tbl_ticket->is_issued}}</p>
                <p>Departure date: {{$tbl_ticket->departure_date}}</p>
                <p>Departure time: {{$tbl_ticket->departure_time}}</p>
                <p>Arrival date: {{$tbl_ticket->arrival_date}}</p>
                <p>Arrival time: {{$tbl_ticket->arrival_time}}</p>
                <p>Sold out: {{$tbl_ticket->is_sold}}</p>
                <p>Station name: {{$tbl_ticket->station->name}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/schedule')}}">Back</a>
	</div>
</main>
@endsection