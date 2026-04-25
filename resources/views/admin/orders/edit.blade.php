@extends('admin.layout')

@section('content')

<h2>Edit Order</h2>

<form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- Status -->
<label>Status</label>
<select name="status" class="form-control mb-3">
    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
</select>

<!-- Notes -->
<label>Notes</label>
<textarea name="notes" class="form-control mb-3">{{ $order->notes }}</textarea>

<button class="btn btn-success">Update Order</button>

</form>

@endsection