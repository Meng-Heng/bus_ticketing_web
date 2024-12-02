@extends('web.backend.layout.admin')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Reviews Detail</h1>
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
                        <td>{{$tbl_review->id}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Star</th>
                        <td>{{$tbl_review->star}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Feedback</th>
                        <td>{{$tbl_review->feedback}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Posted Time</th>
                        <td>{{$tbl_review->posted_time}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">User</th>
                        <td><a href="{{route('user.show', $tbl_review->user_id)}}">{{$tbl_review->user_id}}</a></td>
                        <td>{{$tbl_review->user->username}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Payment</th>
                        <td><a href="{{route('payment.view', $tbl_review->payment_id)}}">{{$tbl_review->payment_id}}</a></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                <p>Created at: {{$tbl_review->created_at}}</p>
                <p>Updated at: {{$tbl_review->updated_at}}</p>
            </div>
          </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{route('feedback.view')}}">Back</a>
	</div>
</main>
@endsection