@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Bus Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_bus->id}} </p>
                <p>Bus Plate number: {{$tbl_bus->bus_plate}}</p>
                <p>Description: {{$tbl_bus->description}}</p>
                <p>Total of seat: {{$tbl_bus->total_seat}}</p>
                <p>Active: 
                @if ($tbl_bus->is_active == 0)
                    <span style="color:red">Maintenance</span>
                    @elseif ($tbl_bus->is_active == 1)
                    <span style="color:lime">OK</span>
                @endif
                </p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/bus')}}">Back</a>
	</div>
</main>
@endsection