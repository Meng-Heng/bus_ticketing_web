@extends('layouts.app')

@section('content')
    <h1>Staff Details</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>First Name</th>
                <td>{{ $staff->fname }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $staff->lname }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $staff->gender }}</td>
            </tr>
            <tr>
                <th>Position</th>
                <td>{{ $staff->position }}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $staff->date_of_birth }}</td>
            </tr>
            <tr>
                <th>Place of Birth</th>
                <td>{{ $staff->place_of_birth }}</td>
            </tr>
            <tr>
                <th>ID Card</th>
                <td>{{ $staff->id_card }}</td>
            </tr>
            <tr>
                <th>Residency</th>
                <td>{{ $staff->residency }}</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>{{ $staff->contact }}</td>
            </tr>
            <tr>
                <th>Active</th>
                <td>{{ $staff->is_active ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>User ID</th>
                <td>{{ $staff->user_id }}</td>
            </tr>
        </tbody>
    </table>
@endsection