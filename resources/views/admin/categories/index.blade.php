@extends('admin.layout')

@section('content')

<h2>Categories</h2>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

<table class="table">
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th> <!-- 🔥 جديد -->
<th>Actions</th>
</tr>

@foreach($categories as $cat)
<tr>
<td>{{ $cat->id }}</td>
<td>{{ $cat->name }}</td>
<td>{{ $cat->description }}</td> <!-- 🔥 جديد -->

<td>
<a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach

</table>

@endsection