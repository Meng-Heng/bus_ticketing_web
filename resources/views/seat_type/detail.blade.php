@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seat Type Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_seat_type->id}} </p>
                <p>Name: {{$tbl_seat_type->name}}</p>
                <p>Description: {{$tbl_seat_type->description}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/seat-type')}}">Back</a>
	</div>
</main>
@endsection