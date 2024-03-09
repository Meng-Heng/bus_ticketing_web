<h1>User Details</h1>

<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<!-- Add other fields here -->

<a href="{{ route('users.edit', $user) }}">Edit</a>
<form action="{{ route('users.destroy', $user) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
</form>