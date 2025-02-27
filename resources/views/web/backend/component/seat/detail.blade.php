@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Seats Detail</h1>
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
                        <td>{{$tbl_seat->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Seat Number</th>
                        <td>{{$tbl_seat->seat_number}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Seat Type</th>
                        <td>{{$tbl_seat->seat_type}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Storage</th>
                        <td>{{$tbl_seat->storage_id}}</td>
                        <td>{{$tbl_seat->storage->luggage}} {{$tbl_seat->storage->measurement}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Price</th>
                        <td>{{$tbl_seat->price_id}}</td>
                        <td>{{$tbl_seat->price->currency}} {{$tbl_seat->price->price}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Status</th>
                        <td>{{$tbl_seat->status}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_seat->created_at}}</p>
                <p>Updated at: {{$tbl_seat->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('seat.view')}}">Back</a>
	</div>
</main>
@endsection