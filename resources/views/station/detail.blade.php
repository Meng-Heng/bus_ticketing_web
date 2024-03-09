@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seat Type Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_station->id}} </p>
                <p>Name: {{$tbl_station->name}}</p>
                <p>Primary Address: {{$tbl_station->p_address}} </p>
                <p>Secondary Address: {{$tbl_station->s_address}}</p>
                <p>Commune: {{$tbl_station->commune}} </p>
                <p>District: {{$tbl_station->district}}</p>
                <p>City: {{$tbl_station->city}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/station')}}">Back</a>
	</div>
</main>
@endsection