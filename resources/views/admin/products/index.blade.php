@extends('layouts.admin')
 
@section('title', 'Manage Products')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap');
 
    :root {
        --cream: #FAF7F2; --warm: #F0E8DC; --sand: #D4B896;
        --coffee: #8B6645; --dark: #2C2218; --accent: #C8553D; --green: #5A7A5A;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: #f4f4f6; font-family: 'DM Sans', sans-serif; color: var(--dark); }
 
    .admin-header {
        background: var(--dark); padding: 24px 40px;
        display: flex; align-items: center; justify-content: space-between;
    }
    .admin-header h1 {
        color: var(--cream); font-size: 1.4rem; font-weight: 400; letter-spacing: .05em;
    }
    .btn {
        padding: 9px 20px; border-radius: 2px; font-family: 'DM Sans', sans-serif;
        font-size: .82rem; letter-spacing: .08em; text-transform: uppercase;
        text-decoration: none; border: none; cursor: pointer; transition: all .2s;
    }
    .btn-primary  { background: var(--accent); color: #fff; }
    .btn-primary:hover { background: #b0432c; }
    .btn-edit     { background: var(--coffee); color: #fff; }
    .btn-edit:hover { background: #7a5538; }
    .btn-delete   { background: transparent; color: var(--accent); border: 1px solid var(--accent); }
    .btn-delete:hover { background: var(--accent); color: #fff; }
 
    .admin-container { max-width: 1200px; margin: 0 auto; padding: 32px 40px; }
 
    .alert { padding: 12px 18px; border-radius: 3px; margin-bottom: 20px; font-size: .88rem; }
    .alert-success { background: #edf7ed; color: #2e6b2e; border-left: 4px solid var(--green); }
 
    .products-table {
        width: 100%; border-collapse: collapse;
        background: #fff; border-radius: 4px;
        overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,.06);
    }
    .products-table thead { background: var(--dark); color: var(--cream); }
    .products-table th {
        padding: 14px 18px; text-align: left;
        font-size: .75rem; letter-spacing: .12em; text-transform: uppercase; font-weight: 500;
    }
    .products-table td {
        padding: 14px 18px; border-bottom: 1px solid var(--warm);
        font-size: .88rem; vertical-align: middle;
    }
    .products-table tr:last-child td { border-bottom: none; }
    .products-table tr:hover td { background: var(--cream); }
 
    .product-thumb {
        width: 56px; height: 56px; object-fit: cover;
        border-radius: 3px; background: var(--warm);
    }
 
    .badge {
        padding: 3px 10px; border-radius: 20px;
        font-size: .72rem; letter-spacing: .08em; text-transform: uppercase; font-weight: 500;
    }
    .badge-in  { background: #d4edda; color: #155724; }
    .badge-out { background: #e9ecef; color: #6c757d; }
 
    .actions { display: flex; gap: 8px; }
 
    .pagination-wrap { margin-top: 28px; display: flex; justify-content: center; }
</style>
@endpush
 
@section('content')
 
<div class="admin-header">
    <h1>🛍 Products Management</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Add Product</a>
</div>
 
<div class="admin-container">
 
    @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
 
    <table class="products-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>
                    @if($product->image_url)
                        <img class="product-thumb"
                             src="{{ asset('storage/' . $product->image_url) }}"
                             alt="{{ $product->name }}">
                    @else
                        <img class="product-thumb"
                             src="https://placehold.co/56x56/F0E8DC/8B6645?text=🌸"
                             alt="{{ $product->name }}">
                    @endif
                </td>
                <td><strong>{{ $product->name }}</strong></td>
                <td>{{ $product->category?->name ?? '—' }}</td>
                <td>{{ number_format($product->price, 2) }} JD</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <span class="badge {{ $product->stock_status === 'in_stock' ? 'badge-in' : 'badge-out' }}">
                        {{ $product->stock_status === 'in_stock' ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.products.edit', $product->product_id) }}"
                           class="btn btn-edit">Edit</a>
 
                        <form method="POST"
                              action="{{ route('admin.products.destroy', $product->product_id) }}"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center;padding:40px;color:#9a8878">
                    No products yet. <a href="{{ route('admin.products.create') }}">Add one</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
 
    <div class="pagination-wrap">{{ $products->links() }}</div>
</div>
@endsection
 