<!-- resources/views/payments/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Payment</h1>

    <form action="{{ route('payment.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="method">Method:</label>
            <input type="text" name="method" id="method" class="form-control" value="{{ $payment->method }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection