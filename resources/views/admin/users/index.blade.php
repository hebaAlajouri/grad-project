@extends('admin.layout')

@section('content')

<h2>Users</h2>

<!-- 🔥 زر إضافة مستخدم -->
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>

<table class="table">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Actions</th>
</tr>

@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->role }}</td>

<td>
    <!-- 🔥 زر Edit -->
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

    <!-- ❌ زر Delete -->
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
</td>

</tr>
@endforeach

</table>

@endsection