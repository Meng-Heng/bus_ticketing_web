@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('feedback_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('feedback_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>Reviews</h1>
                @if (count($tbl_review) > 0)
                <div class="d-flex flex-row">
                        @foreach ($tbl_review as $review)
                        {{ $review->name }}
                        @endforeach
                        {{ $tbl_review->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Star</th>
                                <th>Feedback</th>
                                <th>Posted Time</th>
                                <th>User</th>
                                <th>Payment</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_review as $review)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('feedback.show', $review->id)}}">{{ $review->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $review->star !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $review->feedback !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $review->posted_time !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $review->user_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $review->permission_id !!}</div>
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('feedback.edit', $review->id) }}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @endsection