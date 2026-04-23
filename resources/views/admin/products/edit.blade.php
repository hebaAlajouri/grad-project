@extends('layouts.admin')
 
@section('title', 'Edit Product')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap');
    :root {
        --cream: #FAF7F2; --warm: #F0E8DC; --sand: #D4B896;
        --coffee: #8B6645; --dark: #2C2218; --accent: #C8553D;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: #f4f4f6; font-family: 'DM Sans', sans-serif; color: var(--dark); }
 
    .admin-header {
        background: var(--dark); padding: 24px 40px;
        display: flex; align-items: center; gap: 16px;
    }
    .admin-header a { color: var(--sand); text-decoration: none; font-size: .85rem; }
    .admin-header h1 { color: var(--cream); font-size: 1.4rem; font-weight: 400; }
 
    .form-card {
        max-width: 760px; margin: 40px auto;
        background: #fff; border-radius: 4px;
        box-shadow: 0 2px 16px rgba(0,0,0,.06); padding: 36px;
    }
 
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-full  { grid-column: 1/-1; }
 
    .form-label {
        display: block; font-size: .75rem;
        letter-spacing: .12em; text-transform: uppercase;
        color: var(--coffee); margin-bottom: 7px; font-weight: 500;
    }
    .form-control {
        width: 100%; padding: 10px 14px;
        border: 1px solid var(--sand); border-radius: 2px;
        font-family: 'DM Sans', sans-serif; font-size: .9rem;
        color: var(--dark); background: var(--cream); outline: none;
        transition: border-color .2s;
    }
    .form-control:focus { border-color: var(--coffee); }
    textarea.form-control { resize: vertical; min-height: 100px; }
 
    .field-error { color: var(--accent); font-size: .78rem; margin-top: 5px; }
 
    .current-image { width: 100px; height: 100px; object-fit: cover; border-radius: 3px; border: 1px solid var(--sand); margin-bottom: 10px; display: block; }
    .image-preview { width: 100px; height: 100px; object-fit: cover; border-radius: 3px; border: 1px solid var(--sand); display: none; }
 
    .btn-save {
        margin-top: 28px; padding: 13px 32px; background: var(--coffee);
        color: var(--cream); border: none; border-radius: 2px; cursor: pointer;
        font-family: 'DM Sans', sans-serif; font-size: .85rem;
        letter-spacing: .1em; text-transform: uppercase; transition: background .2s;
    }
    .btn-save:hover { background: var(--dark); }
</style>
@endpush
 
@section('content')
 
<div class="admin-header">
    <a href="{{ route('admin.products.index') }}">← Products</a>
    <h1>Edit: {{ $product->name }}</h1>
</div>
 
<div class="form-card">
    <form method="POST"
          action="{{ route('admin.products.update', $product->product_id) }}"
          enctype="multipart/form-data">
        @csrf @method('PUT')
 
        <div class="form-grid">
 
            <div class="form-full">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $product->name) }}">
                @error('name') <div class="field-error">{{ $message }}</div> @enderror
            </div>
 
            <div>
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">— No Category —</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->category_id }}"
                            {{ old('category_id', $product->category_id) == $cat->category_id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
 
            <div>
                <label class="form-label">Price (JD) *</label>
                <input type="number" name="price" class="form-control"
                       value="{{ old('price', $product->price) }}" step="0.01" min="0">
                @error('price') <div class="field-error">{{ $message }}</div> @enderror
            </div>
 
            <div>
                <label class="form-label">Stock Status *</label>
                <select name="stock_status" class="form-control">
                    <option value="in_stock"
                        {{ old('stock_status', $product->stock_status) === 'in_stock' ? 'selected' : '' }}>
                        In Stock
                    </option>
                    <option value="out_of_stock"
                        {{ old('stock_status', $product->stock_status) === 'out_of_stock' ? 'selected' : '' }}>
                        Out of Stock
                    </option>
                </select>
            </div>
 
            <div>
                <label class="form-label">Quantity *</label>
                <input type="number" name="quantity" class="form-control"
                       value="{{ old('quantity', $product->quantity) }}" min="0">
            </div>
 
            <div class="form-full">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
 
            <div class="form-full">
                <label class="form-label">Product Image</label>
 
                @if($product->image_url)
                    <img class="current-image"
                         src="{{ asset('storage/' . $product->image_url) }}"
                         alt="{{ $product->name }}" id="currentImg">
                @endif
 
                <input type="file" name="image" class="form-control"
                       accept="image/*" onchange="previewNew(event)">
                <img id="newPreview" class="image-preview" src="" alt="New preview">
                @error('image') <div class="field-error">{{ $message }}</div> @enderror
            </div>
 
        </div>
 
        <button type="submit" class="btn-save">Update Product</button>
    </form>
</div>
 
<script>
function previewNew(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        const preview = document.getElementById('newPreview');
        preview.src = e.target.result;
        preview.style.display = 'block';
        const cur = document.getElementById('currentImg');
        if (cur) cur.style.opacity = '.4';
    };
    reader.readAsDataURL(file);
}
</script>
@endsection
 