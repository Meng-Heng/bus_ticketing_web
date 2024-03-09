@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Price</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('prices.update', $price->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $price->price }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection