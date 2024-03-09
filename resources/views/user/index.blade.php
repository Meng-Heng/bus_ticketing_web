@extends('layout.app')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Type</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Hometown</th>
                <th>ID Card</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->userType->name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->hometown }}</td>
                    <td>{{ $user->id_card }}</td>
                    <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
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