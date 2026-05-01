<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout — Lujain Junaidy</title>
<style>
body {
    font-family: 'Jost', sans-serif;
    background: #f7f4ef;
    color: #1c1b19;
    margin: 0;
}
.checkout-page {
    padding: 120px 56px 80px;
}
.checkout-title {
    font-family: serif;
    font-size: 52px;
    font-weight: 300;
    margin-bottom: 40px;
}
.checkout-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 48px;
}
.card {
    background: #fdfcf9;
    border: 1px solid #e2ded8;
    padding: 32px;
}
label {
    display: block;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 8px;
    color: #6b6760;
}
input, textarea, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #e2ded8;
    margin-bottom: 18px;
    background: transparent;
}
.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 14px;
}
.btn {
    width: 100%;
    padding: 16px;
    background: #1c1b19;
    color: #f7f4ef;
    border: 1px solid #1c1b19;
    cursor: pointer;
    letter-spacing: 2px;
    text-transform: uppercase;
}
@media(max-width:900px){
    .checkout-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<div class="checkout-page">
    <h1 class="checkout-title">Checkout</h1>

    <form method="POST" action="{{ route('checkout.place') }}">
        @csrf

        <div class="checkout-grid">
            <div class="card">
                <h2>Delivery Details</h2>

                @if($addresses->count() > 0)
                    <label>Saved Address</label>
                    <select name="address_id">
                        <option value="">Use new address</option>
                        @foreach($addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->street }}, {{ $address->city }}
                            </option>
                        @endforeach
                    </select>
                @endif

                <label>Street</label>
                <input type="text" name="street" value="{{ old('street') }}">

                <label>City</label>
                <input type="text" name="city" value="{{ old('city') }}">

                <label>Region</label>
                <input type="text" name="region" value="{{ old('region') }}">

                <label>Postal Code</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}">

                <label>Notes</label>
                <textarea name="notes" rows="4">{{ old('notes') }}</textarea>

                @if($errors->any())
                    <div style="color:#c0392b;margin-top:10px">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>

            <div class="card">
                <h2>Order Summary</h2>

                @foreach($cartItems as $item)
                    <div class="summary-row">
                        <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                        <span>{{ number_format($item->product->price * $item->quantity, 0) }} JOD</span>
                    </div>
                @endforeach

                <hr>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>{{ number_format($subtotal, 0) }} JOD</span>
                </div>

                @if($discount > 0)
                    <div class="summary-row">
                        <span>Discount</span>
                        <span>- {{ number_format($discount, 0) }} JOD</span>
                    </div>
                @endif

                <div class="summary-row" style="font-size:22px;font-weight:bold">
                    <span>Total</span>
                    <span>{{ number_format($total, 0) }} JOD</span>
                </div>

                <button type="submit" class="btn">Place Order</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>