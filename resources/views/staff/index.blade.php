@extends('layouts.app')

@section('content')
    <h1>Staff List</h1>

    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Add Staff</a>

    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Position</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>ID Card</th>
                <th>Residency</th>
                <th>Contact</th>
                <th>Active</th>
                <th>User ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->fname }}</td>
                    <td>{{ $staffMember->lname }}</td>
                    <td>{{ $staffMember->gender }}</td>
                    <td>{{ $staffMember->position }}</td>
                    <td>{{ $staffMember->date_of_birth }}</td>
                    <td>{{ $staffMember->place_of_birth }}</td>
                    <td>{{ $staffMember->id_card }}</td>
                    <td>{{ $staffMember->residency }}</td>
                    <td>{{ $staffMember->contact }}</td>
                    <td>{{ $staffMember->is_active ? 'Yes' : 'No' }}</td>
                    <td>{{ $staffMember->user_id }}</td>
                    <td>
                        <a href="{{ route('staff.show', $staffMember->staff_id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('staff.edit', $staffMember->staff_id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('staff.destroy', $staffMember->staff_id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff member?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection