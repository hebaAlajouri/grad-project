@extends('layouts.app')
 
@section('title', 'Our Store')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap');
 
    :root {
        --cream:   #FAF7F2;
        --warm:    #F0E8DC;
        --sand:    #D4B896;
        --coffee:  #8B6645;
        --dark:    #2C2218;
        --accent:  #C8553D;
        --green:   #5A7A5A;
    }
 
    * { box-sizing: border-box; margin: 0; padding: 0; }
 
    body {
        background: var(--cream);
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
    }
 
    /* ── Hero ── */
    .store-hero {
        background: var(--dark);
        color: var(--cream);
        padding: 80px 40px 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .store-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 70% 60% at 50% 120%, var(--coffee) 0%, transparent 70%);
        opacity: .45;
    }
    .store-hero h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 300;
        letter-spacing: .06em;
        position: relative;
    }
    .store-hero p {
        font-size: .95rem;
        letter-spacing: .18em;
        text-transform: uppercase;
        opacity: .65;
        margin-top: 10px;
        position: relative;
    }
 
    /* ── Toolbar ── */
    .store-toolbar {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 24px 40px;
        background: var(--warm);
        border-bottom: 1px solid var(--sand);
        flex-wrap: wrap;
    }
    .store-toolbar form { display: flex; gap: 10px; flex: 1; flex-wrap: wrap; }
 
    .search-input {
        flex: 1;
        min-width: 180px;
        padding: 10px 16px;
        border: 1px solid var(--sand);
        background: var(--cream);
        border-radius: 2px;
        font-family: 'DM Sans', sans-serif;
        font-size: .9rem;
        color: var(--dark);
        outline: none;
        transition: border-color .2s;
    }
    .search-input:focus { border-color: var(--coffee); }
 
    .filter-select {
        padding: 10px 14px;
        border: 1px solid var(--sand);
        background: var(--cream);
        border-radius: 2px;
        font-family: 'DM Sans', sans-serif;
        font-size: .9rem;
        color: var(--dark);
        outline: none;
        cursor: pointer;
    }
 
    .btn {
        padding: 10px 22px;
        font-family: 'DM Sans', sans-serif;
        font-size: .85rem;
        letter-spacing: .08em;
        text-transform: uppercase;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all .2s;
    }
    .btn-primary   { background: var(--dark); color: var(--cream); }
    .btn-primary:hover { background: var(--coffee); }
    .btn-outline   { background: transparent; color: var(--dark); border: 1px solid var(--dark); }
    .btn-outline:hover { background: var(--dark); color: var(--cream); }
    .btn-cart      { background: var(--accent); color: #fff; }
    .btn-cart:hover { background: #b0432c; }
 
    .cart-badge {
        background: var(--accent);
        color: #fff;
        border-radius: 50%;
        width: 22px; height: 22px;
        font-size: .75rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-left: 2px;
    }
 
    /* ── Grid ── */
    .store-container { padding: 40px; max-width: 1400px; margin: 0 auto; }
 
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 32px;
    }
 
    /* ── Product Card ── */
    .product-card {
        background: #fff;
        border: 1px solid var(--warm);
        border-radius: 4px;
        overflow: hidden;
        transition: transform .25s, box-shadow .25s;
        display: flex;
        flex-direction: column;
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(44,34,24,.12);
    }
 
    .card-image-wrap {
        position: relative;
        aspect-ratio: 4/3;
        overflow: hidden;
        background: var(--warm);
    }
    .card-image-wrap img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform .4s;
    }
    .product-card:hover .card-image-wrap img { transform: scale(1.06); }
 
    .stock-badge {
        position: absolute;
        top: 12px; right: 12px;
        padding: 4px 10px;
        font-size: .72rem;
        letter-spacing: .1em;
        text-transform: uppercase;
        border-radius: 2px;
        font-weight: 500;
    }
    .stock-badge.in    { background: var(--green); color: #fff; }
    .stock-badge.out   { background: #888; color: #fff; }
 
    .card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; gap: 8px; }
 
    .card-category {
        font-size: .72rem;
        letter-spacing: .15em;
        text-transform: uppercase;
        color: var(--coffee);
        font-weight: 500;
    }
 
    .card-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.35rem;
        font-weight: 400;
        line-height: 1.3;
        color: var(--dark);
    }
 
    .card-desc {
        font-size: .85rem;
        color: #6b5b4e;
        line-height: 1.55;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
 
    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-top: 1px solid var(--warm);
        gap: 10px;
    }
 
    .card-price {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
    }
    .card-price span { font-size: .9rem; font-weight: 300; }
 
    .btn-add {
        padding: 9px 18px;
        font-size: .8rem;
        white-space: nowrap;
    }
 
    /* ── Alerts ── */
    .alert {
        padding: 14px 20px;
        border-radius: 3px;
        margin: 0 40px 24px;
        font-size: .9rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .alert-success { background: #edf7ed; color: #2e6b2e; border-left: 4px solid var(--green); }
    .alert-error   { background: #fdecea; color: #8b1a1a; border-left: 4px solid var(--accent); }
 
    /* ── Empty state ── */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        grid-column: 1/-1;
    }
    .empty-state .icon { font-size: 3rem; margin-bottom: 16px; opacity: .4; }
    .empty-state p { color: #9a8878; font-size: 1rem; }
 
    /* ── Pagination ── */
    .pagination-wrap { margin-top: 48px; display: flex; justify-content: center; }
 
    @media (max-width: 600px) {
        .store-hero { padding: 50px 20px 40px; }
        .store-toolbar { padding: 16px 20px; }
        .store-container { padding: 24px 20px; }
    }
</style>
@endpush
 
@section('content')
 
{{-- Hero --}}
<section class="store-hero">
    <p>Curated Collection</p>
    <h1>Our Store</h1>
</section>
 
{{-- Toolbar --}}
<div class="store-toolbar">
    <form method="GET" action="{{ route('store.index') }}">
        <input  class="search-input"
                type="text"
                name="search"
                placeholder="Search products…"
                value="{{ request('search') }}">
 
        <select class="filter-select" name="category">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->category_id }}"
                    {{ request('category') == $cat->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
 
        <button type="submit" class="btn btn-primary">Filter</button>
 
        @if(request()->hasAny(['search','category']))
            <a href="{{ route('store.index') }}" class="btn btn-outline">Clear</a>
        @endif
    </form>
 
    @auth
    <a href="{{ route('cart.index') }}" class="btn btn-cart">
        🛒 Cart
        @php
            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
        @endphp
        @if($cartCount > 0)
            <span class="cart-badge">{{ $cartCount }}</span>
        @endif
    </a>
    @endauth
</div>
 
{{-- Alerts --}}
@if(session('success'))
    <div class="alert alert-success">✓ {{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-error">✕ {{ session('error') }}</div>
@endif
 
{{-- Products --}}
<div class="store-container">
    <div class="products-grid">
        @forelse($products as $product)
        <div class="product-card">
 
            {{-- Image --}}
            <a href="{{ route('store.show', $product->product_id) }}" class="card-image-wrap">
                @if($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}"
                         alt="{{ $product->name }}" loading="lazy">
                @else
                    <img src="https://placehold.co/400x300/F0E8DC/8B6645?text={{ urlencode($product->name) }}"
                         alt="{{ $product->name }}">
                @endif
 
                <span class="stock-badge {{ $product->stock_status === 'in_stock' ? 'in' : 'out' }}">
                    {{ $product->stock_status === 'in_stock' ? 'In Stock' : 'Out of Stock' }}
                </span>
            </a>
 
            {{-- Body --}}
            <div class="card-body">
                @if($product->category)
                    <div class="card-category">{{ $product->category->name }}</div>
                @endif
                <a href="{{ route('store.show', $product->product_id) }}" style="text-decoration:none">
                    <h3 class="card-name">{{ $product->name }}</h3>
                </a>
                @if($product->description)
                    <p class="card-desc">{{ $product->description }}</p>
                @endif
            </div>
 
            {{-- Footer --}}
            <div class="card-footer">
                <div class="card-price">
                    {{ number_format($product->price, 2) }}
                    <span>JD</span>
                </div>
 
                @if($product->stock_status === 'in_stock')
                    @auth
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="btn btn-cart btn-add">Add to Cart</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline btn-add">Login to Buy</a>
                    @endauth
                @else
                    <button class="btn" style="background:#e0d8d0;color:#9a8878;cursor:not-allowed" disabled>
                        Unavailable
                    </button>
                @endif
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="icon">🌿</div>
            <p>No products found matching your search.</p>
        </div>
        @endforelse
    </div>
 
    {{-- Pagination --}}
    <div class="pagination-wrap">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
 
@endsection
 