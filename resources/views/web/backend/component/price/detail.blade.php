@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Price Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_price->id}} </p>
                <p>Price: {{$tbl_price->price}}</p>
                <p>Currency: {{$tbl_price->currency}}</p>
                <p>Start Date: {{$tbl_price->start_date}}</p>
                <p>Created at: {{$tbl_price->created_at}}</p>
                <p>Updated at: {{$tbl_price->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('price.view')}}">Back</a>
	</div>
</main>
@endsection