@extends('admin.layout')

@section('content')

<h2>Orders</h2>

@foreach($orders as $order)
<div class="card mb-3 p-3">

<h5>Order #{{ $order->id }}</h5>
<p>User: {{ $order->user->name }}</p>
<p>Total: {{ $order->total }}</p>
<p>Status: {{ $order->status }}</p>

<a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View</a>

</div>
@endforeach

@endsection