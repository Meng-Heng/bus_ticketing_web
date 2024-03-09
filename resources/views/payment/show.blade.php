<!-- resources/views/payments/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Payment Details</h1>

    <table class="table">
        <tr>
            <th>Payment ID</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Method</th>
            <td>{{ $payment->method }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $payment->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $payment->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-secondary">Edit</a>
    <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection