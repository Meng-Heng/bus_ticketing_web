@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seats Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_seat->id}} </p>
                <p>Seat number: {{$tbl_seat->seat_number}}</p>
                <p>Seat type: {{$tbl_seat->seat_type->name}}</p>
                <p>Seat description: {{$tbl_seat->seat_type->description}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/seat')}}">Back</a>
	</div>
</main>
@endsection