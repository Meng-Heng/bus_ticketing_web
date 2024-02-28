@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Bus Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_bus->id}} </p>
                <p>Bus Plate number: {{$tbl_bus->bus_plate}}</p>
                <p>Description: {{$tbl_bus->description}}</p>
                <p>Active: {{$tbl_bus->is_active}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/bus-list')}}">Back</a>
	</div>
</main>
@endsection