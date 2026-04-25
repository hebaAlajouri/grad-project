@extends('admin.layout')

@section('content')

<h2>Add User</h2>

v<form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
@csrf

<input name="name" class="form-control mb-2" placeholder="Name">

<input name="email" type="email" class="form-control mb-2" placeholder="Email">

<input name="password" type="password" class="form-control mb-2" placeholder="Password">

<select name="role" class="form-control mb-2">
    <option value="customer">Customer</option>
    <option value="admin">Admin</option>
</select>

<button class="btn btn-success">Save</button>

</form>

@endsection