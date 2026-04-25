@extends('admin.layout')

@section('content')

<h2>Coupons</h2>

<a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Add Coupon</a>

<table class="table">
<tr>
<th>Code</th>
<th>Value</th>
<th>Type</th>
<th>Expiry Date</th> <!-- 🔥 جديد -->
<th>Actions</th>
</tr>

@foreach($coupons as $c)
<tr>
<td>{{ $c->code }}</td>
<td>{{ $c->discount_value }}</td>
<td>{{ $c->discount_type }}</td>
<td>{{ $c->expiry_date }}</td> <!-- 🔥 جديد -->

<td>
    <a href="{{ route('coupons.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('coupons.destroy', $c->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>
</tr>
@endforeach

</table>

@endsection