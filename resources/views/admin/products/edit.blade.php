@extends('admin.layout')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<input name="name" value="{{ $product->name }}" class="form-control mb-2">
<input name="price" value="{{ $product->price }}" class="form-control mb-2">

<select name="category_id" class="form-control mb-2">
@foreach($categories as $cat)
<option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
    {{ $cat->name }}
</option>
@endforeach
</select>

<input type="file" name="image" class="form-control mb-2">

<button class="btn btn-success">Update</button>

</form>

@endsection