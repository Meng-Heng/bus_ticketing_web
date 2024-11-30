@extends('web.backend.layout.admin')

@section('content')
<main>
	<div class="container-fluid">
		<h1>Payment</h1>
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
                        <td>{{$tbl_payment->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Payment Method</th>
                        <td>{{$tbl_payment->payment_method}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Payment Date Time</th>
                        <td>{{$tbl_payment->payment_datetime}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">User</th>
                        <td><a href="{{route('user.show', $tbl_payment->user_id)}}">{{$tbl_payment->user_id}}</a></td>
                        <td>{{$tbl_payment->user->username}}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_payment->created_at}}</p>
                <p>Updated at: {{$tbl_payment->updated_at}}</p>
            </div>
        </div>
        <br>
        <a class="btn btn-secondary" href="{{route('payment.list')}}">Back</a>
	</div>
</main>
@endsection