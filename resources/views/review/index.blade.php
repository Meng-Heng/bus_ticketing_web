@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Reviews</div>

                    <div class="card-body">
                        <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Create Review</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Star</th>
                                    <th>Feedback</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->user_id }}</td>
                                        <td>{{ $review->star }}</td>
                                        <td>{{ $review->feedback }}</td>
                                        <td>
                                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection