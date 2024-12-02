@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Staff Detail</h1>
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
                        <td>{{$tbl_staff->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Name</th>
                        <td>{{$tbl_staff->lname}} {{$tbl_staff->fname}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">User ID</th>
                        <td>{{$tbl_staff->user_id}}</td>
                        <td>Created by: {{$tbl_staff->user->username}}</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Hometown</th>
                        <td>{{$tbl_staff->hometown}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Identification</th>
                        <td>{{$tbl_staff->identification}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Residency</th>
                        <td>{{$tbl_staff->residency}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Contact</th>
                        <td>{{$tbl_staff->contact}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Active</th>
                        <td>{{$tbl_staff->is_active}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Position</th>
                        <td>{{$tbl_staff->position}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_staff->created_at}}</p>
                <p>Updated at: {{$tbl_staff->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('staff.view')}}">Back</a>
	</div>
</main>
@endsection