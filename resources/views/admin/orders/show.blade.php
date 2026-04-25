@extends('admin.layout')

@section('content')

<h2>Order Details</h2>

<p>User: {{ $order->user->name }}</p>
<p>Total: {{ $order->total }}</p>

<table class="table">
<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
</tr>

@foreach($order->items as $item)
<tr>
<td>{{ $item->product->name }}</td>
<td>{{ $item->quantity }}</td>
<td>{{ $item->unit_price }}</td>
</tr>
@endforeach

</table>

@endsection