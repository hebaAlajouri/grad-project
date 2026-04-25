@extends('admin.layout')

@section('content')

<h2>Edit Category</h2>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
@csrf
@method('PUT')

<input name="name" value="{{ $category->name }}" class="form-control mb-2">
<textarea name="description" class="form-control mb-2">{{ $category->description }}</textarea>

<button class="btn btn-success">Update</button>

</form>

@endsection