@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Schedule Detail</h1>
		<div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Properties</th>
                        <th scope="col">Data</th>
                        <th scope="col">Related Data</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">ID</th>
                        <td>{{$tbl_schedule->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Bus ID</th>
                        <td>{{$tbl_schedule->bus_id}}</td>
                        <td>{{$tbl_schedule->bus->bus_plate}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Origin</th>
                        <td>{{$tbl_schedule->origin}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Departure Date</th>
                        <td>{{$tbl_schedule->departure_date}}</td>
                        <td>{{$tbl_schedule->departure_time}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Destination</th>
                        <td>{{$tbl_schedule->destination}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Arrival Date</th>
                        <td>{{$tbl_schedule->arrival_date}}</td>
                        <td>{{$tbl_schedule->arrival_time}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Sold Out</th>
                        <td>{{$tbl_schedule->sold_out}}</a></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_schedule->created_at}}</p>
                <p>Updated at: {{$tbl_schedule->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('schedule.view')}}">Back</a>
	</div>
</main>
@endsection