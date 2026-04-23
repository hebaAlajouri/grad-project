@extends('layouts.app')
 
@section('title', 'Checkout')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600&family=DM+Sans:wght@300;400;500&display=swap');
 
    :root {
        --cream: #FAF7F2; --warm: #F0E8DC; --sand: #D4B896;
        --coffee: #8B6645; --dark: #2C2218; --accent: #C8553D; --green: #5A7A5A;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--cream); font-family: 'DM Sans', sans-serif; color: var(--dark); }
 
    .page-header {
        background: var(--dark); color: var(--cream);
        padding: 40px; display: flex; align-items: center; gap: 12px;
    }
    .page-header a { color: var(--sand); text-decoration: none; font-size: .85rem; }
    .page-header h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.2rem; font-weight: 300;
    }
 
    .checkout-container {
        max-width: 1000px; margin: 0 auto;
        padding: 40px; display: grid;
        grid-template-columns: 1fr 340px; gap: 32px;
    }
 
    /* Form */
    .checkout-form { background: #fff; padding: 32px; border: 1px solid var(--warm); border-radius: 4px; }
    .section-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.4rem; font-weight: 400;
        margin-bottom: 20px; padding-bottom: 12px;
        border-bottom: 1px solid var(--warm);
    }
 
    .form-group { margin-bottom: 18px; }
    .form-label {
        display: block; font-size: .78rem;
        letter-spacing: .12em; text-transform: uppercase;
        color: var(--coffee); margin-bottom: 7px; font-weight: 500;
    }
    .form-control {
        width: 100%; padding: 11px 14px;
        border: 1px solid var(--sand); border-radius: 2px;
        font-family: 'DM Sans', sans-serif; font-size: .9rem;
        color: var(--dark); background: var(--cream); outline: none;
        transition: border-color .2s;
    }
    .form-control:focus { border-color: var(--coffee); }
    textarea.form-control { resize: vertical; min-height: 90px; }
 
    .payment-option {
        display: flex; align-items: center; gap: 14px;
        padding: 16px; border: 1px solid var(--sand); border-radius: 3px;
        cursor: pointer; background: var(--cream);
    }
    .payment-option input[type="radio"] { accent-color: var(--coffee); width: 18px; height: 18px; }
    .payment-option .pay-label { font-size: .95rem; }
    .payment-option .pay-desc  { font-size: .8rem; color: #9a8878; margin-top: 2px; }
 
    .divider { height: 1px; background: var(--warm); margin: 24px 0; }
 
    .btn-place {
        display: block; width: 100%; padding: 15px;
        background: var(--accent); color: #fff;
        border: none; border-radius: 2px; cursor: pointer;
        font-family: 'DM Sans', sans-serif; font-size: .9rem;
        letter-spacing: .1em; text-transform: uppercase;
        transition: background .2s;
    }
    .btn-place:hover { background: #b0432c; }
 
    /* Order summary */
    .order-summary {
        background: var(--dark); color: var(--cream);
        padding: 28px; border-radius: 4px;
        position: sticky; top: 20px; align-self: start;
    }
    .summary-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.4rem; font-weight: 300;
        margin-bottom: 20px; padding-bottom: 14px;
        border-bottom: 1px solid rgba(255,255,255,.15);
    }
 
    .summary-item {
        display: flex; justify-content: space-between;
        align-items: flex-start; gap: 8px;
        margin-bottom: 10px; font-size: .85rem; opacity: .85;
    }
    .summary-item-name { flex: 1; }
 
    .summary-total {
        display: flex; justify-content: space-between;
        margin-top: 18px; padding-top: 14px;
        border-top: 1px solid rgba(255,255,255,.2);
        font-family: 'Cormorant Garamond', serif; font-size: 1.55rem;
    }
 
    /* Errors */
    .alert-error {
        padding: 12px 16px; background: #fdecea;
        color: #8b1a1a; border-left: 4px solid var(--accent);
        border-radius: 2px; margin-bottom: 16px; font-size: .88rem;
    }
    .field-error { color: var(--accent); font-size: .78rem; margin-top: 5px; }
 
    @media (max-width: 768px) {
        .checkout-container { grid-template-columns: 1fr; }
        .order-summary { position: static; }
    }
</style>
@endpush
 
@section('content')
 
<div class="page-header">
    <a href="{{ route('cart.index') }}">← Cart</a>
    <h1>Checkout</h1>
</div>
 
<div class="checkout-container">
 
    {{-- Form --}}
    <div class="checkout-form">
 
        @if($errors->any())
        <div class="alert-error">
            Please fix the errors below.
        </div>
        @endif
 
        <form method="POST" action="{{ route('checkout.place') }}">
            @csrf
 
            {{-- Delivery Address --}}
            <div class="section-title">Delivery Address</div>
 
            <div class="form-group">
                <label class="form-label">Select Address</label>
                <select name="address_id" class="form-control">
                    @foreach($addresses as $addr)
                        <option value="{{ $addr->id }}"
                            {{ old('address_id') == $addr->id ? 'selected' : '' }}>
                            {{ $addr->city }}, {{ $addr->street }}
                        </option>
                    @endforeach
                </select>
                @error('address_id')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="divider"></div>
 
            {{-- Payment --}}
            <div class="section-title">Payment Method</div>
 
            <div class="form-group">
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="cod" checked>
                    <div>
                        <div class="pay-label">💵 Cash on Delivery</div>
                        <div class="pay-desc">Pay when your order arrives</div>
                    </div>
                </label>
                @error('payment_method')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="divider"></div>
 
            {{-- Notes --}}
            <div class="section-title">Order Notes <small style="font-size:.75em;opacity:.5">(optional)</small></div>
 
            <div class="form-group">
                <textarea name="notes" class="form-control"
                          placeholder="Any special instructions or notes…">{{ old('notes') }}</textarea>
            </div>
 
            <button type="submit" class="btn-place">Place Order — COD</button>
        </form>
    </div>
 
    {{-- Summary --}}
    <div class="order-summary">
        <div class="summary-title">Your Order</div>
 
        @foreach($cartItems as $item)
        <div class="summary-item">
            <span class="summary-item-name">{{ $item->product->name }}</span>
            <span>× {{ $item->quantity }}</span>
            <span>{{ number_format($item->product->price * $item->quantity, 2) }} JD</span>
        </div>
        @endforeach
 
        <div class="summary-total">
            <span>Total</span>
            <span>{{ number_format($subtotal, 2) }} JD</span>
        </div>
    </div>
 
</div>
@endsection
 