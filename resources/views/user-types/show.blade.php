<!DOCTYPE html>
<html>
<head>
    <title>User Type Details</title>
</head>
<body>
    <h1>User Type Details</h1>
    <p><strong>Type:</strong> {{ $user_type->type }}</p>
    <p><strong>Description:</strong> {{ $user_type->description }}</p>
    <a href="{{ route('user-types.edit', $user_type->id) }}">Edit</a>
    <form action="{{ route('user-types.destroy', $user_type->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>