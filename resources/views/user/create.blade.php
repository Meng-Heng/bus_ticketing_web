<h1>Create User</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <br>
        <label for="name">Name:</label>
        <input type="text" name="name" required> 
    </br>
    <br>
        <label for="name">Email:</label>
        <input type="text" email="email" required>
    </br>
    <br>
        <label for="password">Password:</label>
        <input type="text" password="password" required>
    </br>
    <br>
        <label for="user_type_id">User Type:</label>
        <input type="text" user_type_id="user_type_id" required>
    </br>
    <br>
        <label for="gender">Gender:</label>
        <input type="text" gender="gender" required>
    </br>
    <br>
        <label for="date_of_birth">DOB:</label>
        <input type="text" date_of_birth="date_of_birth" required>
    </br>
    <br>
        <label for="phone">Phone:</label>
        <input type="text" phone="phone" required>
    </br>
    <br>
        <label for="hometown">Hometown:</label>
        <input type="text" hometown="hometown" required>
    </br>
    <br>
        <label for="id_card">Card:</label>
        <input type="text" id_card="id_card" required>
    </br>

    
    <!-- Add other fields here -->
    <br>
    <button type="submit">Create</button>
</form>