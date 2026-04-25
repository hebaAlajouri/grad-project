@extends('admin.layout')

@section('content')

<h2>Edit User</h2>

<form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<input name="name" value="{{ $user->name }}" class="form-control mb-2">

<input name="email" value="{{ $user->email }}" class="form-control mb-2">

<select name="role" class="form-control mb-2">
    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
</select>

<button class="btn btn-success">Update</button>

</form>

@endsection