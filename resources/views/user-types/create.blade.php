<!DOCTYPE html>
<html>
<head>
    <title>Create User Type</title>
</head>
<body>
    <h1>Create User Type</h1>
    <form action="{{ route('user-types.store') }}" method="POST">
        @csrf
        <label for="type">Type:</label>
        <input type="text" name="type" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        <br>
        <button type="submit">Create</button>
    </form>
</body>
</html>