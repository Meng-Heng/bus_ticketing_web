@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Permission Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$tbl_permission->id}} </p>
                <p>Permission: {{$tbl_permission->permission}}</p>
                <p>Description: {{$tbl_permission->description}}</p>
                <p>Created at: {{$tbl_permission->created_at}}</p>
                <p>Updated at: {{$tbl_permission->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('permission.view')}}">Back</a>
	</div>
</main>
@endsection