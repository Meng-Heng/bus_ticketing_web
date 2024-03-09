<h1>Edit User</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    
    <!-- Add other fields here -->
    
    <button type="submit">Update</button>
</form>