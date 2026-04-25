@extends('admin.layout')

@section('content')

<h2>Add Coupon</h2>

<form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
@csrf

<input name="code" class="form-control mb-2" placeholder="Code">

<input name="discount_value" class="form-control mb-2" placeholder="Value">


<input type="date" name="expiry_date" class="form-control mb-2">

<select name="discount_type" class="form-control mb-2">
<option value="percentage">Percentage</option>
<option value="fixed">Fixed</option>
</select>

<button class="btn btn-success">Save</button>

</form>

@endsection