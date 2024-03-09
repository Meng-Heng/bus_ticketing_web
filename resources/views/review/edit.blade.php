@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Review</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reviews.update', $review->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $review->user_id }}" required>
                            </div>

                            <div class="form-group">
                                <label for="star">Star</label>
                                <input type="number" class="form-control" id="star" name="star" value="{{ $review->star }}" required>
                            </div>

                            <div class="form-group">
                                <label for="feedback">Feedback</label>
                                <textarea class="form-control" id="feedback" name="feedback" required>{{ $review->feedback }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection