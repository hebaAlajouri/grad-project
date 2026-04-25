@extends('admin.layout')

@section('content')

<h2>Products</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
    <th>Actions</th>
</tr>

@foreach($products as $product)
<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>
        @if($product->image_url)
        <img src="{{ asset('storage/'.$product->image_url) }}" width="60">
        @endif
    </td>
    <td>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach

</table>

@endsection