<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop — Lujain Junaidy</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<style>
:root {
  --cream: #f7f4ef;
  --warm-white: #fdfcf9;
  --charcoal: #1c1b19;
  --mid: #6b6760;
  --border: #e2ded8;
  --gold: #b8975a;
  --gold-light: #d4b87a;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Jost', sans-serif; background: var(--cream); color: var(--charcoal); font-weight: 300; overflow-x: hidden; }

/* NAV */
.nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 200;
  display: flex; justify-content: space-between; align-items: center;
  padding: 24px 56px;
  background: rgba(247,244,239,0.92);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid transparent;
  transition: border-color 0.3s, padding 0.3s;
}
.nav.scrolled { border-bottom-color: var(--border); padding: 18px 56px; }
.nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 17px; font-weight: 400; letter-spacing: 4px; text-transform: uppercase; color: var(--charcoal); text-decoration: none; }
.nav-links { display: flex; align-items: center; gap: 40px; }
.nav-links a { font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; color: var(--mid); text-decoration: none; transition: color 0.2s; font-weight: 400; }
.nav-links a:hover { color: var(--charcoal); }
.nav-links a.active { color: var(--charcoal); border-bottom: 1px solid var(--gold); padding-bottom: 2px; }
.nav-actions { display: flex; gap: 12px; align-items: center; }
.nav-btn { width: 36px; height: 36px; border-radius: 50%; border: 1px solid var(--border); background: transparent; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: border-color 0.2s, background 0.2s; text-decoration: none; position: relative; }
.nav-btn:hover { border-color: var(--charcoal); background: var(--charcoal); }
.nav-btn:hover svg { stroke: var(--cream); }
.nav-btn svg { width: 14px; height: 14px; stroke: var(--mid); fill: none; stroke-width: 1.5; transition: stroke 0.2s; }
.cart-count { position: absolute; top: -4px; right: -4px; width: 16px; height: 16px; background: var(--gold); border-radius: 50%; font-size: 9px; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 500; }

/* PAGE HERO */
.page-hero {
  padding: 160px 56px 80px;
  background: var(--warm-white);
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 80px; align-items: end;
  border-bottom: 1px solid var(--border);
  position: relative; overflow: hidden;
}
.page-hero::before {
  content: 'SHOP';
  position: absolute; right: -10px; top: 50%; transform: translateY(-50%);
  font-family: 'Cormorant Garamond', serif;
  font-size: 200px; font-weight: 300;
  color: rgba(184,151,90,0.06);
  letter-spacing: 10px; pointer-events: none; white-space: nowrap;
}
.hero-eyebrow { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 24px; font-weight: 400; }
.hero-title { font-family: 'Cormorant Garamond', serif; font-size: 68px; font-weight: 300; line-height: 1.05; letter-spacing: -1px; color: var(--charcoal); }
.hero-title em { font-style: italic; color: var(--gold); }
.hero-desc { font-size: 15px; color: var(--mid); line-height: 1.85; max-width: 380px; font-weight: 300; }

/* FILTER BAR */
.shop-controls {
  padding: 0 56px; background: var(--warm-white);
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  gap: 24px;
}
.filter-tabs { display: flex; align-items: stretch; overflow-x: auto; }
.filter-item {
  padding: 20px 28px; font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
  color: var(--mid); cursor: pointer; border: none; background: transparent;
  border-bottom: 2px solid transparent; transition: color 0.2s, border-color 0.2s;
  white-space: nowrap; font-family: 'Jost', sans-serif; font-weight: 400;
}
.filter-item:hover { color: var(--charcoal); }
.filter-item.active { color: var(--charcoal); border-bottom-color: var(--gold); }

.sort-wrap { display: flex; align-items: center; gap: 10px; flex-shrink: 0; padding: 16px 0; }
.sort-label { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--mid); font-weight: 400; }
.sort-select {
  font-family: 'Jost', sans-serif; font-size: 11px; font-weight: 400;
  color: var(--charcoal); background: transparent; border: 1px solid var(--border);
  padding: 8px 32px 8px 14px; cursor: pointer; appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%236b6760'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 12px center;
  border-radius: 2px; letter-spacing: 0.5px;
}

/* PRODUCTS GRID */
.shop-grid-wrap { padding: 56px; }
.products-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }

/* PRODUCT CARD */
.prod-card {
  background: var(--warm-white); border: 1px solid var(--border);
  border-radius: 3px; overflow: hidden; cursor: pointer;
  transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94), box-shadow 0.35s;
  display: flex; flex-direction: column;
}
.prod-card:hover { transform: translateY(-6px); box-shadow: 0 20px 48px rgba(28,27,25,0.1); }

.prod-img-wrap { position: relative; overflow: hidden; background: #ede9e2; aspect-ratio: 3/4; }
.prod-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94); }
.prod-card:hover .prod-img-wrap img { transform: scale(1.05); }

.img-fallback {
  width: 100%; height: 100%;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  gap: 10px; background: #ede9e2;
}
.img-fallback svg { width: 32px; height: 32px; stroke: #b0aa9f; fill: none; stroke-width: 1; }
.img-fallback span { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: #b8b3a8; font-weight: 400; }

.prod-overlay {
  position: absolute; inset: 0; display: flex; flex-direction: column;
  align-items: center; justify-content: flex-end; padding-bottom: 24px;
  background: linear-gradient(to top, rgba(28,27,25,0.5) 0%, transparent 50%);
  opacity: 0; transition: opacity 0.3s;
}
.prod-card:hover .prod-overlay { opacity: 1; }

.btn-quick-add {
  font-family: 'Jost', sans-serif; font-size: 10px; letter-spacing: 2.5px;
  text-transform: uppercase; font-weight: 400;
  padding: 11px 28px; background: var(--cream); color: var(--charcoal);
  border: none; cursor: pointer; border-radius: 2px;
  transition: background 0.2s, transform 0.2s;
  transform: translateY(8px);
}
.prod-card:hover .btn-quick-add { transform: translateY(0); }
.btn-quick-add:hover { background: var(--gold); color: #fff; }

.out-badge {
  position: absolute; top: 16px; left: 16px;
  font-size: 9px; letter-spacing: 2px; text-transform: uppercase; font-weight: 400;
  padding: 5px 10px; background: var(--charcoal); color: var(--cream); border-radius: 2px;
}

.prod-body { padding: 18px 20px 22px; flex: 1; display: flex; flex-direction: column; }
.prod-cat { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 8px; font-weight: 400; }
.prod-name { font-family: 'Cormorant Garamond', serif; font-size: 20px; font-weight: 400; color: var(--charcoal); margin-bottom: 6px; line-height: 1.25; }
.prod-desc { font-size: 12px; color: var(--mid); line-height: 1.65; margin-bottom: 16px; font-weight: 300; flex: 1; }
.prod-footer { display: flex; align-items: center; justify-content: space-between; }
.prod-price { font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: 400; color: var(--charcoal); }
.prod-price small { font-family: 'Jost', sans-serif; font-size: 11px; color: var(--mid); font-weight: 300; margin-left: 3px; }

.btn-add-icon {
  width: 36px; height: 36px; border-radius: 50%;
  border: 1px solid var(--border); background: transparent;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; transition: border-color 0.2s, background 0.2s;
}
.btn-add-icon:hover { border-color: var(--charcoal); background: var(--charcoal); }
.btn-add-icon:hover svg { stroke: var(--cream); }
.btn-add-icon svg { width: 14px; height: 14px; stroke: var(--mid); fill: none; stroke-width: 1.5; transition: stroke 0.2s; }
.btn-add-icon.disabled { opacity: 0.35; cursor: not-allowed; pointer-events: none; }

/* EMPTY STATE */
.empty-state { grid-column: 1/-1; text-align: center; padding: 80px 0; }
.empty-state svg { width: 48px; height: 48px; stroke: #c8c3bb; fill: none; stroke-width: 1; margin-bottom: 20px; }
.empty-title { font-family: 'Cormorant Garamond', serif; font-size: 28px; font-weight: 300; color: var(--charcoal); margin-bottom: 10px; }
.empty-sub { font-size: 13px; color: var(--mid); font-weight: 300; }

/* PAGINATION */
.pagination-wrap { display: flex; justify-content: center; align-items: center; gap: 8px; padding: 24px 0 56px; }
.page-btn {
  width: 40px; height: 40px; border-radius: 50%; border: 1px solid var(--border);
  background: transparent; font-family: 'Jost', sans-serif; font-size: 12px;
  color: var(--mid); cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center;
}
.page-btn.active { background: var(--charcoal); border-color: var(--charcoal); color: var(--cream); }
.page-btn:hover:not(.active) { border-color: var(--charcoal); color: var(--charcoal); }
.page-btn svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 1.5; }

/* TOAST */
.toast {
  position: fixed; bottom: 32px; right: 32px; z-index: 999;
  background: var(--charcoal); color: var(--cream);
  padding: 14px 24px; border-radius: 3px; font-size: 13px; font-weight: 300;
  display: flex; align-items: center; gap: 10px;
  transform: translateY(20px); opacity: 0;
  transition: transform 0.3s, opacity 0.3s; pointer-events: none;
}
.toast.show { transform: translateY(0); opacity: 1; }
.toast svg { width: 16px; height: 16px; stroke: var(--gold); fill: none; stroke-width: 1.5; flex-shrink: 0; }

/* FOOTER */
.footer { padding: 56px; background: var(--charcoal); }
.footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 48px; margin-bottom: 48px; padding-bottom: 48px; border-bottom: 1px solid rgba(255,255,255,0.08); }
.f-logo { font-family: 'Cormorant Garamond', serif; font-size: 15px; letter-spacing: 4px; text-transform: uppercase; color: #fff; margin-bottom: 16px; display: block; }
.f-tagline { font-size: 13px; color: rgba(255,255,255,0.3); line-height: 1.75; max-width: 240px; font-weight: 300; }
.f-col-title { font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase; color: rgba(255,255,255,0.25); margin-bottom: 20px; font-weight: 400; }
.f-col a, .f-col p { display: block; font-size: 13px; color: rgba(255,255,255,0.45); text-decoration: none; margin-bottom: 10px; line-height: 1.6; transition: color 0.2s; font-weight: 300; }
.f-col a:hover { color: #fff; }
.footer-bottom { display: flex; justify-content: space-between; align-items: center; }
.f-copy { font-size: 11px; color: rgba(255,255,255,0.18); letter-spacing: 0.5px; }
.f-socials { display: flex; gap: 12px; }
.f-social { width: 34px; height: 34px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: border-color 0.2s; }
.f-social:hover { border-color: rgba(255,255,255,0.4); }
.f-social svg { width: 13px; height: 13px; stroke: rgba(255,255,255,0.4); fill: none; stroke-width: 1.5; }

/* ANIMATIONS */
@keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.animate { opacity: 0; }
.animate.visible { animation: fadeUp 0.7s cubic-bezier(0.25,0.46,0.45,0.94) forwards; }
.animate.d1 { animation-delay: 0.1s; } .animate.d2 { animation-delay: 0.2s; } .animate.d3 { animation-delay: 0.3s; }

@media (max-width: 1200px) { .products-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 900px) { .products-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 768px) {
  .nav { padding: 18px 24px; }
  .nav-links { display: none; }
  .page-hero { padding: 120px 24px 56px; grid-template-columns: 1fr; gap: 28px; }
  .page-hero::before { display: none; }
  .hero-title { font-size: 46px; }
  .shop-controls { padding: 0 24px; flex-wrap: wrap; }
  .shop-grid-wrap { padding: 28px 24px; }
  .products-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .footer { padding: 40px 24px; }
  .footer-top { grid-template-columns: 1fr 1fr; gap: 28px; }
}
@media (max-width: 480px) { .products-grid { grid-template-columns: 1fr; } }
</style>
</head>
<body>

<nav class="nav" id="nav">
  <a href="" class="nav-logo">Lujain Junaidy</a>
  <div class="nav-links">
    <a href="">Home</a>
    <a href="">Portfolio</a>
    <a href="{{ route('shop.index') }}" class="active">Shop</a>
    <a href="">Contact</a>
  </div>
  <div class="nav-actions">
    <a href="" class="nav-btn">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
    </a>
    <a href="{{ route('cart.index') }}" class="nav-btn" style="position:relative">
      <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      @if(session('cart_count', 0) > 0)
        <span class="cart-count">{{ session('cart_count') }}</span>
      @endif
    </a>
  </div>
</nav>

<section class="page-hero">
  <div>
    <p class="hero-eyebrow animate d1">Curated objects & decor</p>
    <h1 class="hero-title animate d2">Objects with<br><em>intention</em></h1>
  </div>
  <div>
    <p class="hero-desc animate d3">A carefully curated selection of home objects, art prints, and decorative pieces — chosen because they carry the same values as our design work: beauty, purpose, and lasting quality.</p>
  </div>
</section>

<div class="shop-controls">
  <div class="filter-tabs">
    <button class="filter-item {{ request('category') == '' ? 'active' : '' }}"
            onclick="filterCategory('', this)">All pieces</button>
    @foreach($categories as $cat)
      <button class="filter-item {{ request('category') == $cat->id ? 'active' : '' }}"
              onclick="filterCategory('{{ $cat->id }}', this)">{{ $cat->name }}</button>
    @endforeach
  </div>
  <div class="sort-wrap">
    <span class="sort-label">Sort</span>
    <select class="sort-select" onchange="sortProducts(this.value)">
      <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
      <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
      <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
    </select>
  </div>
</div>

<div class="shop-grid-wrap">
  <div class="products-grid" id="products-grid">
    @forelse($products as $product)
      <div class="prod-card animate" style="animation-delay: {{ $loop->index * 0.05 }}s">
        <div class="prod-img-wrap">
          @if($product->image_url)
            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                 onerror="this.parentElement.innerHTML=fallbackHTML('{{ addslashes($product->name) }}')">
          @else
            <div class="img-fallback">
              <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
              <span>{{ $product->name }}</span>
            </div>
          @endif

          @if($product->stock_status === 'out_of_stock')
            <span class="out-badge">Sold out</span>
          @endif

          <div class="prod-overlay">
            @if($product->stock_status === 'in_stock')
              <button class="btn-quick-add"
                      onclick="addToCart(event, {{ $product->id }})">
                Add to cart
              </button>
            @endif
          </div>
        </div>

        <div class="prod-body">
          @if($product->category)
            <div class="prod-cat">{{ $product->category->name }}</div>
          @endif
          <h3 class="prod-name">{{ $product->name }}</h3>
          @if($product->description)
            <p class="prod-desc">{{ Str::limit($product->description, 80) }}</p>
          @endif
          <div class="prod-footer">
            <div class="prod-price">
              {{ number_format($product->price, 0) }}
              <small>JOD</small>
            </div>
            <button class="btn-add-icon {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}"
                    onclick="addToCart(event, {{ $product->id }})"
                    {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
              <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </button>
          </div>
        </div>
      </div>
    @empty
      <div class="empty-state">
        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
        <div class="empty-title">No pieces yet</div>
        <p class="empty-sub">New arrivals are on their way — check back soon.</p>
      </div>
    @endforelse
  </div>

  @if($products->hasPages())
    <div class="pagination-wrap">
      @if($products->onFirstPage())
        <button class="page-btn" disabled>
          <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
      @else
        <a href="{{ $products->previousPageUrl() }}" class="page-btn">
          <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        </a>
      @endif

      @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="page-btn {{ $page == $products->currentPage() ? 'active' : '' }}">
          {{ $page }}
        </a>
      @endforeach

      @if($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}" class="page-btn">
          <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      @else
        <button class="page-btn" disabled>
          <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      @endif
    </div>
  @endif
</div>

<footer class="footer">
  <div class="footer-top">
    <div>
      <span class="f-logo">Lujain Junaidy</span>
      <p class="f-tagline">Creating timeless interiors that inspire and elevate everyday living.</p>
    </div>
    <div class="f-col">
      <div class="f-col-title">Navigate</div>
      <a href="">Home</a>
      <a href="{{ route('portfolio') }}">Portfolio</a>
      <a href="{{ route('shop.index') }}">Shop</a>
    </div>
    <div class="f-col">
      <div class="f-col-title">Contact</div>
      <p>Lujain@interiordesign.com</p>
      <p>+962 7 7931 8674</p>
      <p>Amman, Jordan</p>
    </div>
    <div class="f-col">
      <div class="f-col-title">Follow</div>
      <a href="#">Instagram</a>
      <a href="#">Pinterest</a>
      <a href="#">Behance</a>
    </div>
  </div>
  <div class="footer-bottom">
    <span class="f-copy">© 2026 Lujain Junaidy. All rights reserved.</span>
    <div class="f-socials">
      <div class="f-social"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></div>
      <div class="f-social"><svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg></div>
    </div>
  </div>
</footer>

<div class="toast" id="toast">
  <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toast-msg">Added to cart</span>
</div>

<script>
window.addEventListener('scroll', () => {
  document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 40);
});

const obs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.08 });
document.querySelectorAll('.animate').forEach(el => obs.observe(el));

function fallbackHTML(name) {
  return `<div class="img-fallback"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg><span>${name}</span></div>`;
}


function sortProducts(val) {
  const url = new URL(window.location.href);
  url.searchParams.set('sort', val);
  url.searchParams.delete('page');
  window.location.href = url.toString();
}

function showToast(msg, isError = false) {
  const toast = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  toast.style.background = isError ? '#c0392b' : 'var(--charcoal)';
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 3000);
}

function addToCart(e, productId) {
  e.stopPropagation();
  e.preventDefault();
  fetch('{{ route("cart.add") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ product_id: productId, quantity: 1 })
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      showToast('Added to cart');
      const countEl = document.querySelector('.cart-count');
      if (countEl) countEl.textContent = data.cart_count;
      else {
        const cartBtn = document.querySelector('.nav-btn:last-child');
        const span = document.createElement('span');
        span.className = 'cart-count';
        span.textContent = data.cart_count;
        cartBtn.appendChild(span);
      }
    } else {
      showToast(data.message || 'Something went wrong', true);
    }
  })
  .catch(() => showToast('Something went wrong', true));
}
function updateQty(id, change) {
    let current = parseInt(document.getElementById('qty-' + id).innerText);
    let newQty = current + change;

    if (newQty < 1) return;

    fetch('/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            item_id: id,
            quantity: newQty
        })
    }).then(() => location.reload());
}
function removeItem(id) {
    fetch('/cart/remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ item_id: id })
    }).then(() => location.reload());
}
function applyCoupon() {
    let code = document.getElementById('coupon-input').value;

    fetch('/cart/coupon', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ code })
    })
    .then(res => res.json())
    .then(data => {
        let msg = document.getElementById('coupon-msg');

        if (data.success) {
            msg.innerText = data.message;
            msg.classList.add('success');
            location.reload();
        } else {
            msg.innerText = data.message;
            msg.classList.add('error');
        }
    });
}
function filterCategory(categoryId) {
    let url = new URL(window.location.href);

    if (categoryId === '') {
        url.searchParams.delete('category');
    } else {
        url.searchParams.set('category', categoryId);
    }

    window.location.href = url;
}
function sortProducts(value) {
    let url = new URL(window.location.href);
    url.searchParams.set('sort', value);
    window.location.href = url;
}
</script>
</body>
</html>