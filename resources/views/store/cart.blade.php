@extends('layouts.app')
 
@section('title', 'Shopping Cart')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap');
 
    :root {
        --cream: #FAF7F2; --warm: #F0E8DC; --sand: #D4B896;
        --coffee: #8B6645; --dark: #2C2218; --accent: #C8553D; --green: #5A7A5A;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--cream); font-family: 'DM Sans', sans-serif; color: var(--dark); }
 
    .page-header {
        background: var(--dark); color: var(--cream);
        padding: 40px; display: flex; align-items: center; gap: 16px;
    }
    .page-header a { color: var(--sand); text-decoration: none; font-size: .85rem; letter-spacing: .1em; }
    .page-header h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.2rem; font-weight: 300; margin-left: 8px;
    }
 
    .cart-container {
        max-width: 1100px; margin: 0 auto;
        padding: 40px; display: grid;
        grid-template-columns: 1fr 340px; gap: 32px;
    }
 
    /* Items */
    .cart-items { display: flex; flex-direction: column; gap: 1px; }
 
    .cart-item {
        background: #fff; display: flex; align-items: center;
        gap: 20px; padding: 20px; border: 1px solid var(--warm);
        transition: box-shadow .2s;
    }
    .cart-item:hover { box-shadow: 0 4px 20px rgba(44,34,24,.07); }
 
    .item-image {
        width: 90px; height: 90px; border-radius: 3px;
        object-fit: cover; flex-shrink: 0; background: var(--warm);
    }
 
    .item-info { flex: 1; }
    .item-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.2rem; font-weight: 400; margin-bottom: 4px;
    }
    .item-price { font-size: .85rem; color: var(--coffee); }
 
    .qty-form { display: flex; align-items: center; gap: 8px; margin-top: 10px; }
    .qty-input {
        width: 64px; padding: 6px 10px; text-align: center;
        border: 1px solid var(--sand); border-radius: 2px;
        font-family: 'DM Sans', sans-serif; font-size: .9rem;
        background: var(--cream); color: var(--dark); outline: none;
    }
    .qty-input:focus { border-color: var(--coffee); }
 
    .btn-sm {
        padding: 7px 14px; font-size: .78rem;
        letter-spacing: .07em; text-transform: uppercase;
        border: none; border-radius: 2px; cursor: pointer;
        font-family: 'DM Sans', sans-serif; transition: all .2s;
    }
    .btn-update { background: var(--dark); color: var(--cream); }
    .btn-update:hover { background: var(--coffee); }
    .btn-remove { background: transparent; color: var(--accent); border: 1px solid var(--accent); }
    .btn-remove:hover { background: var(--accent); color: #fff; }
 
    .item-subtotal {
        text-align: right; min-width: 80px;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.25rem; font-weight: 600;
    }
 
    /* Summary */
    .cart-summary {
        background: var(--dark); color: var(--cream);
        padding: 32px; border-radius: 4px;
        position: sticky; top: 20px; align-self: start;
    }
    .summary-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem; font-weight: 300;
        margin-bottom: 24px; padding-bottom: 16px;
        border-bottom: 1px solid rgba(255,255,255,.15);
    }
 
    .summary-row {
        display: flex; justify-content: space-between;
        align-items: center; margin-bottom: 12px;
        font-size: .9rem; opacity: .8;
    }
    .summary-total {
        display: flex; justify-content: space-between;
        align-items: center; margin-top: 20px;
        padding-top: 16px; border-top: 1px solid rgba(255,255,255,.2);
        font-family: 'Cormorant Garamond', serif; font-size: 1.6rem;
    }
 
    .btn-checkout {
        display: block; width: 100%; margin-top: 24px;
        padding: 14px; text-align: center; background: var(--accent);
        color: #fff; text-decoration: none; border-radius: 2px;
        font-family: 'DM Sans', sans-serif; font-size: .85rem;
        letter-spacing: .1em; text-transform: uppercase;
        transition: background .2s; border: none; cursor: pointer;
    }
    .btn-checkout:hover { background: #b0432c; }
 
    .continue-link {
        display: block; margin-top: 14px; text-align: center;
        color: var(--sand); font-size: .8rem; text-decoration: none;
        letter-spacing: .08em; opacity: .75;
    }
    .continue-link:hover { opacity: 1; }
 
    /* Alert */
    .alert { padding: 12px 20px; border-radius: 3px; margin-bottom: 20px; font-size: .88rem; }
    .alert-success { background: #edf7ed; color: #2e6b2e; border-left: 4px solid var(--green); }
    .alert-error   { background: #fdecea; color: #8b1a1a; border-left: 4px solid var(--accent); }
 
    /* Empty */
    .empty-cart { text-align: center; padding: 80px 20px; grid-column: 1/-1; }
    .empty-cart .icon { font-size: 3.5rem; margin-bottom: 20px; opacity: .35; }
    .empty-cart p { color: #9a8878; margin-bottom: 24px; }
    .btn-shop {
        padding: 12px 28px; background: var(--dark); color: var(--cream);
        text-decoration: none; border-radius: 2px;
        font-size: .85rem; letter-spacing: .1em; text-transform: uppercase;
    }
 
    @media (max-width: 768px) {
        .cart-container { grid-template-columns: 1fr; }
        .cart-summary { position: static; }
        .item-subtotal { display: none; }
    }
</style>
@endpush
 
@section('content')
 
<div class="page-header">
    <a href="{{ route('store.index') }}">← Store</a>
    <h1>Shopping Cart</h1>
</div>
 
<div class="cart-container">
 
    @if($cartItems->isEmpty())
    <div class="empty-cart">
        <div class="icon">🛒</div>
        <p>Your cart is empty.</p>
        <a href="{{ route('store.index') }}" class="btn-shop">Browse Products</a>
    </div>
 
    @else
 
    {{-- Items column --}}
    <div>
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">✕ {{ session('error') }}</div>
        @endif
 
        <div class="cart-items">
            @foreach($cartItems as $item)
            <div class="cart-item">
 
                @if($item->product->image_url)
                    <img class="item-image"
                         src="{{ asset('storage/' . $item->product->image_url) }}"
                         alt="{{ $item->product->name }}">
                @else
                    <img class="item-image"
                         src="https://placehold.co/90x90/F0E8DC/8B6645?text=🌸"
                         alt="{{ $item->product->name }}">
                @endif
 
                <div class="item-info">
                    <div class="item-name">{{ $item->product->name }}</div>
                    <div class="item-price">{{ number_format($item->product->price, 2) }} JD each</div>
 
                    <div class="qty-form">
                        <form method="POST"
                              action="{{ route('cart.update', $item->cart_item_id) }}"
                              style="display:flex;gap:6px;align-items:center">
                            @csrf @method('PATCH')
                            <input type="number" name="quantity" class="qty-input"
                                   value="{{ $item->quantity }}" min="1">
                            <button type="submit" class="btn-sm btn-update">Update</button>
                        </form>
 
                        <form method="POST"
                              action="{{ route('cart.remove', $item->cart_item_id) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-sm btn-remove">Remove</button>
                        </form>
                    </div>
                </div>
 
                <div class="item-subtotal">
                    {{ number_format($item->product->price * $item->quantity, 2) }}
                    <span style="font-size:.8rem;font-weight:300">JD</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
 
    {{-- Summary column --}}
    <div class="cart-summary">
        <div class="summary-title">Order Summary</div>
 
        @foreach($cartItems as $item)
        <div class="summary-row">
            <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
            <span>{{ number_format($item->product->price * $item->quantity, 2) }} JD</span>
        </div>
        @endforeach
 
        <div class="summary-total">
            <span>Total</span>
            <span>{{ number_format($total, 2) }} JD</span>
        </div>
 
        <a href="{{ route('checkout.index') }}" class="btn-checkout">
            Proceed to Checkout →
        </a>
        <a href="{{ route('store.index') }}" class="continue-link">← Continue Shopping</a>
    </div>
 
    @endif
</div>
@endsection
 