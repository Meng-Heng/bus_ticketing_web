<!DOCTYPE html>
<html>
<head>
    <title>Edit User Type</title>
</head>
<body>
    <h1>Edit User Type</h1>
    <form action="{{ route('user-types.update', $user_type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="type">Type:</label>
        <input type="text" name="type" value="{{ $user_type->type }}" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description">{{ $user_type->description }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>