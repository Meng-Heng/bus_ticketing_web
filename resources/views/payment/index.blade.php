<!-- resources/views/payments/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Payments</h1>

    <a href="{{ route('payment.create') }}" class="btn btn-primary mb-3">Create Payment</a>

    <table class="table">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Method</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>{{ $payment->updated_at }}</td>
                    <td>
                        <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection