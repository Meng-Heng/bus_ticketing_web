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
                <p>Status: 
                @if ($tbl_bus->is_active == 0)
                    <span style="color:red">Inactive</span>
                    @elseif ($tbl_bus->is_active == 1)
                    <span style="color:lime">Active</span>
                @endif
                </p>
                <p>Created at: {{$tbl_bus->created_at}}</p>
                <p>Updated at: {{$tbl_bus->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('bus.view')}}">Back</a>
	</div>
</main>
@endsection