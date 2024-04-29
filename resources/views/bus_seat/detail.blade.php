@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seats Detail</h1>
		<div class="card">
            <div class="card-body">
                <!-- Calling from Model -->
                <p>ID: {{$tbl_bus_seat->id}} </p>
                <p>Bus palte number: {{$tbl_bus_seat->bus->bus_plate}}</p>
                <p>Seat Number: {{$tbl_bus_seat->seat->seat_number}}</p>
                <p>Price: {{$tbl_bus_seat->price->price}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/bus-seat')}}">Back</a>
	</div>
</main>
@endsection