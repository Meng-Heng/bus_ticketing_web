@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Storage Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_storage->id}} </p>
                <p>Luggage: {{$tbl_storage->luggage}}</p>
                <p>Measurement: {{$tbl_storage->measurement}} </p>
                <p>Start Date: {{$tbl_storage->start_date}}</p>
                <p>Created at: {{$tbl_storage->created_at}} </p>
                <p>Updated at: {{$tbl_storage->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('storage.view')}}">Back</a>
	</div>
</main>
@endsection