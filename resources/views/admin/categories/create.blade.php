@extends('admin.layout')

@section('content')

<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
@csrf

<input name="name" class="form-control mb-2" placeholder="Name">
<textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

<button class="btn btn-success">Save</button>

</form>

@endsection