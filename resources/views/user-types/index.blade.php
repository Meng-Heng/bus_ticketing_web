<!DOCTYPE html>
<html>
<head>
    <title>User Types</title>
</head>
<body>
    <h1>User Types</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_type as $user_type)
                <tr>
                    <td>{{ $user_type->type }}</td>
                    <td>{{ $user_type->description }}</td>
                    <td>
                        <a href="{{ route('user-types.show', $user_type->id) }}">View</a>
                        <a href="{{ route('user-types.edit', $user_type->id) }}">Edit</a>
                        <form action="{{ route('user-types.destroy', $user_type->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('user-types.create') }}">Create New User Type</a>
</body>
</html>