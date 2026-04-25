@extends('admin.layout')

@section('content')

<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
@csrf

<input name="name" class="form-control mb-2" placeholder="Name">
<input name="price" class="form-control mb-2" placeholder="Price">

<select name="category_id" class="form-control mb-2">
@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach
</select>

<input type="file" name="image" class="form-control mb-2">

<button class="btn btn-success">Save</button>

</form>

@endsection