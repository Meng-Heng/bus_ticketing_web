@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>User's Permission Detail</h1>
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
                        <td>{{$tbl_user_permission->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">User</th>
                        <td><a href="{{route('user.show', $tbl_user_permission->user_id)}}">{{$tbl_user_permission->user_id}}</a></td>
                        <td>{{$tbl_user_permission->user->username}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Permission</th>
                        <td><a href="{{route('permission.show', $tbl_user_permission->permission_id)}}">{{$tbl_user_permission->permission_id}}</a></td>
                        <td>{{$tbl_user_permission->permission->permission}}</td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_user_permission->created_at}}</p>
                <p>Updated at: {{$tbl_user_permission->updated_at}}</p>
            </div>
          </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('userpermission.view')}}">Back</a>
	</div>
</main>
@endsection