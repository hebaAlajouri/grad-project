@extends('admin.layout')

@section('content')

<h2>Edit Coupon</h2>

<form method="POST" action="{{ route('coupons.update', $coupon->id) }}">
@csrf
@method('PUT')

<input name="code" value="{{ $coupon->code }}" class="form-control mb-2" placeholder="Code">

<input name="discount_value" value="{{ $coupon->discount_value }}" class="form-control mb-2" placeholder="Value">

<select name="discount_type" class="form-control mb-2">
    <option value="percentage" {{ $coupon->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
    <option value="fixed" {{ $coupon->discount_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
</select>

<input type="date" name="expiry_date" value="{{ $coupon->expiry_date }}" class="form-control mb-2">

<button class="btn btn-success">Update</button>

</form>

@endsection