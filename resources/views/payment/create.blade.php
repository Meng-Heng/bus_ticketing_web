<!-- resources/views/payments/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Payment</h1>

    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="method">Method:</label>
            <input type="text" name="method" id="method" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection