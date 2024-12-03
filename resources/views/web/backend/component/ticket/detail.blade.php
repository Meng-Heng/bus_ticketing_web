@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Ticket Detail</h1>
		<div class="card">
          <div class="card-body" style='border: 1px solid black;'>
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
                      <td>{{$tbl_ticket->id}}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Ticket ID</th>
                      <td>{{$tbl_ticket->ticket_id}}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Issued at</th>
                      <td>{{$tbl_ticket->is_issued}}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Schedule</th>
                      <td><a href="{{route('schedule.show', $tbl_ticket->schedule_id)}}">{{$tbl_ticket->schedule_id}}</a></td>
                      <td>{{$tbl_ticket->schedule->origin}} --> {{$tbl_ticket->schedule->destination}}</td>
                      <td>{{$tbl_ticket->schedule->departure_date}} {{$tbl_ticket->schedule->departure_time}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Seat</th>
                      <td><a href="{{route('seat.show', $tbl_ticket->bus_seat_id)}}">{{$tbl_ticket->bus_seat_id}}</a></td>
                      <td>{{$tbl_ticket->bus_seat->seat_number}}</td>
                      <td>{{$tbl_ticket->bus_seat->bus->bus_plate}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Payment</th>
                      <td><a href="{{route('payment.view', $tbl_ticket->payment_id)}}">{{$tbl_ticket->payment_id}}</td>
                      <td>{{$tbl_ticket->payment->payment_method}}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">User</th>
                      <td><a href="{{route('user.show', $tbl_ticket->payment->user_id)}}">{{$tbl_ticket->payment->user_id}}</a></td>
                      <td>{{$tbl_ticket->payment->user->username}}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Storage</th>
                      <td><a href="{{route('storage.show', $tbl_ticket->storage_id)}}">{{$tbl_ticket->storage_id}}</a></td>
                      <td>{{$tbl_ticket->storage->luggage}} {{$tbl_ticket->storage->measurement}} </td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Price</th>
                      <td><a href="{{route('price.show', $tbl_ticket->price_id)}}">{{$tbl_ticket->price_id}}</a></td>
                      <td>{{$tbl_ticket->price->currency}} {{$tbl_ticket->price->price}}</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              <p>Created at: {{$tbl_ticket->created_at}}</p>
              <p>Updated at: {{$tbl_ticket->updated_at}}</p>
          </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('ticket.list')}}">Back</a>
	</div>
</main>
@endsection