@extends('layouts.app')

@section('content')
    <h1>Add Staff</h1>

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_card">ID Card</label>
            <input type="text" name="id_card" id="id_card" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="residency">Residency</label>
            <input type="text" name="residency" id="residency" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" required>
        </div>

        <div class="form-group>
            <label for="is_active">Active</label>
            <select name="is_active" id="is_active" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Staff</button>
    </form>
@endsection