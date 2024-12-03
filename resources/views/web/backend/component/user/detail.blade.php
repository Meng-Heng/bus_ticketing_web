@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>User Detail</h1>
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
                        <td>{{$tbl_user->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Username</th>
                        <td>{{$tbl_user->username}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td>{{$tbl_user->email}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Gender</th>
                        <td>{{$tbl_user->gender}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Date of Birth</th>
                        <td>{{$tbl_user->date_of_birth}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Contact</th>
                        <td>{{$tbl_user->contact}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Hometown</th>
                        <td>{{$tbl_user->hometown}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">ID Card/Passport</th>
                        <td>{{$tbl_user->id_card}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Active</th>
                        <td>{{$tbl_user->is_active}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_user->created_at}}</p>
                <p>Updated at: {{$tbl_user->updated_at}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('user.view')}}">Back</a>
	</div>
</main>
@endsection