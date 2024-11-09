@extends('web.backend.layout.admin')

@section('content')
<main>
	<div class="container-fluid">
		<h1>Payment</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_payment->id}} </p>
                <p>Payment Method: {{$tbl_payment->payment_method}}</p>
                <p>Payment Date/Time: {{$tbl_payment->payment_datetime}}</p>
                <p>User ID: {{$tbl_payment->user_id}}</p>
                <p>Created at: {{$tbl_payment->created_at}}</p>
                <p>Updated at: {{$tbl_payment->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/dashboard/payment')}}">Back</a>
	</div>
</main>
@endsection