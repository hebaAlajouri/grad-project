<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart — Lujain Junaidy</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<style>
:root {
  --cream: #f7f4ef; --warm-white: #fdfcf9; --charcoal: #1c1b19;
  --mid: #6b6760; --border: #e2ded8; --gold: #b8975a; --gold-light: #d4b87a;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Jost', sans-serif; background: var(--cream); color: var(--charcoal); font-weight: 300; }

.nav { position: fixed; top: 0; left: 0; right: 0; z-index: 200; display: flex; justify-content: space-between; align-items: center; padding: 24px 56px; background: rgba(247,244,239,0.92); backdrop-filter: blur(12px); border-bottom: 1px solid transparent; transition: border-color 0.3s, padding 0.3s; }
.nav.scrolled { border-bottom-color: var(--border); padding: 18px 56px; }
.nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 17px; font-weight: 400; letter-spacing: 4px; text-transform: uppercase; color: var(--charcoal); text-decoration: none; }
.nav-links { display: flex; align-items: center; gap: 40px; }
.nav-links a { font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; color: var(--mid); text-decoration: none; transition: color 0.2s; font-weight: 400; }
.nav-links a:hover { color: var(--charcoal); }
.nav-links a.active { color: var(--charcoal); border-bottom: 1px solid var(--gold); padding-bottom: 2px; }
.nav-actions { display: flex; gap: 12px; }
.nav-btn { width: 36px; height: 36px; border-radius: 50%; border: 1px solid var(--border); background: transparent; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; text-decoration: none; }
.nav-btn:hover { border-color: var(--charcoal); background: var(--charcoal); }
.nav-btn:hover svg { stroke: var(--cream); }
.nav-btn svg { width: 14px; height: 14px; stroke: var(--mid); fill: none; stroke-width: 1.5; transition: stroke 0.2s; }

/* CART LAYOUT */
.cart-page { padding: 120px 56px 80px; min-height: 80vh; }
.cart-header { margin-bottom: 48px; padding-bottom: 32px; border-bottom: 1px solid var(--border); }
.cart-eyebrow { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 16px; font-weight: 400; }
.cart-title { font-family: 'Cormorant Garamond', serif; font-size: 52px; font-weight: 300; color: var(--charcoal); line-height: 1.05; }
.cart-title em { font-style: italic; color: var(--gold); }
.cart-count-label { font-size: 13px; color: var(--mid); margin-top: 12px; font-weight: 300; }

.cart-grid { display: grid; grid-template-columns: 1fr 380px; gap: 48px; align-items: start; }

/* ITEMS */
.cart-items { }
.cart-item {
  display: grid; grid-template-columns: 100px 1fr auto;
  gap: 24px; align-items: center;
  padding: 28px 0; border-bottom: 1px solid var(--border);
}
.item-img { width: 100px; height: 100px; border-radius: 3px; overflow: hidden; background: #ede9e2; flex-shrink: 0; }
.item-img img { width: 100%; height: 100%; object-fit: cover; }
.item-img .img-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
.item-img .img-fallback svg { width: 24px; height: 24px; stroke: #b0aa9f; fill: none; stroke-width: 1; }

.item-info { }
.item-cat { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 6px; font-weight: 400; }
.item-name { font-family: 'Cormorant Garamond', serif; font-size: 20px; font-weight: 400; color: var(--charcoal); margin-bottom: 14px; line-height: 1.2; }

.qty-ctrl { display: flex; align-items: center; gap: 0; border: 1px solid var(--border); border-radius: 2px; overflow: hidden; width: fit-content; }
.qty-btn { width: 32px; height: 32px; background: transparent; border: none; cursor: pointer; font-size: 16px; color: var(--mid); transition: background 0.2s, color 0.2s; display: flex; align-items: center; justify-content: center; font-family: 'Jost', sans-serif; font-weight: 300; }
.qty-btn:hover { background: var(--charcoal); color: var(--cream); }
.qty-val { width: 40px; text-align: center; font-size: 13px; font-weight: 400; color: var(--charcoal); border: none; border-left: 1px solid var(--border); border-right: 1px solid var(--border); background: transparent; pointer-events: none; }

.item-right { display: flex; flex-direction: column; align-items: flex-end; gap: 16px; }
.item-price { font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: 400; color: var(--charcoal); }
.item-price small { font-family: 'Jost', sans-serif; font-size: 11px; color: var(--mid); font-weight: 300; }
.btn-remove { background: none; border: none; cursor: pointer; color: #c8c3bb; font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; font-family: 'Jost', sans-serif; transition: color 0.2s; padding: 0; display: flex; align-items: center; gap: 6px; }
.btn-remove:hover { color: var(--charcoal); }
.btn-remove svg { width: 12px; height: 12px; stroke: currentColor; fill: none; stroke-width: 1.5; }

.empty-cart { text-align: center; padding: 80px 0; grid-column: 1/-1; }
.empty-cart svg { width: 56px; height: 56px; stroke: #c8c3bb; fill: none; stroke-width: 1; margin-bottom: 24px; }
.empty-cart-title { font-family: 'Cormorant Garamond', serif; font-size: 36px; font-weight: 300; color: var(--charcoal); margin-bottom: 12px; }
.empty-cart-sub { font-size: 14px; color: var(--mid); font-weight: 300; margin-bottom: 32px; }
.btn-fill { padding: 14px 36px; background: var(--charcoal); color: var(--cream); border: 1px solid var(--charcoal); font-family: 'Jost', sans-serif; font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; cursor: pointer; transition: background 0.2s, color 0.2s; font-weight: 400; border-radius: 2px; text-decoration: none; display: inline-block; }
.btn-fill:hover { background: transparent; color: var(--charcoal); }

/* ORDER SUMMARY */
.order-summary {
  background: var(--warm-white); border: 1px solid var(--border);
  border-radius: 3px; padding: 36px; position: sticky; top: 100px;
}
.summary-title { font-family: 'Cormorant Garamond', serif; font-size: 28px; font-weight: 400; color: var(--charcoal); margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid var(--border); }

.coupon-wrap { margin-bottom: 24px; }
.coupon-label { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--mid); margin-bottom: 10px; font-weight: 400; display: block; }
.coupon-row { display: flex; gap: 8px; }
.coupon-input {
  flex: 1; padding: 10px 14px; border: 1px solid var(--border); border-radius: 2px;
  font-family: 'Jost', sans-serif; font-size: 12px; background: transparent;
  color: var(--charcoal); letter-spacing: 1px; text-transform: uppercase;
  transition: border-color 0.2s; outline: none;
}
.coupon-input:focus { border-color: var(--charcoal); }
.btn-coupon {
  padding: 10px 18px; background: transparent; border: 1px solid var(--charcoal);
  font-family: 'Jost', sans-serif; font-size: 10px; letter-spacing: 2px;
  text-transform: uppercase; cursor: pointer; color: var(--charcoal);
  border-radius: 2px; transition: background 0.2s, color 0.2s; font-weight: 400;
}
.btn-coupon:hover { background: var(--charcoal); color: var(--cream); }
.coupon-msg { font-size: 11px; margin-top: 8px; font-weight: 300; }
.coupon-msg.success { color: #5a8a5a; }
.coupon-msg.error { color: #c0392b; }

.summary-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
.summary-row .lbl { font-size: 12px; color: var(--mid); font-weight: 300; letter-spacing: 0.3px; }
.summary-row .val { font-size: 14px; color: var(--charcoal); font-weight: 400; }
.summary-row .val.discount { color: #5a8a5a; }
.summary-divider { height: 1px; background: var(--border); margin: 20px 0; }
.summary-total { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 28px; }
.total-lbl { font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: var(--charcoal); font-weight: 400; }
.total-val { font-family: 'Cormorant Garamond', serif; font-size: 32px; font-weight: 400; color: var(--charcoal); }
.total-val small { font-family: 'Jost', sans-serif; font-size: 12px; color: var(--mid); font-weight: 300; }

.btn-checkout { width: 100%; padding: 16px; background: var(--charcoal); color: var(--cream); border: 1px solid var(--charcoal); font-family: 'Jost', sans-serif; font-size: 11px; letter-spacing: 3px; text-transform: uppercase; cursor: pointer; transition: background 0.2s, color 0.2s; font-weight: 400; border-radius: 2px; margin-bottom: 12px; }
.btn-checkout:hover { background: transparent; color: var(--charcoal); }
.btn-checkout:disabled { opacity: 0.4; cursor: not-allowed; }
.continue-link { display: block; text-align: center; font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase; color: var(--mid); text-decoration: none; transition: color 0.2s; }
.continue-link:hover { color: var(--charcoal); }
.secure-badge { display: flex; align-items: center; justify-content: center; gap: 7px; margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); }
.secure-badge svg { width: 13px; height: 13px; stroke: #b0aa9f; fill: none; stroke-width: 1.5; }
.secure-badge span { font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; color: #b0aa9f; font-weight: 400; }

/* FOOTER */
.footer { padding: 56px; background: var(--charcoal); }
.footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 48px; margin-bottom: 48px; padding-bottom: 48px; border-bottom: 1px solid rgba(255,255,255,0.08); }
.f-logo { font-family: 'Cormorant Garamond', serif; font-size: 15px; letter-spacing: 4px; text-transform: uppercase; color: #fff; margin-bottom: 16px; display: block; }
.f-tagline { font-size: 13px; color: rgba(255,255,255,0.3); line-height: 1.75; max-width: 240px; font-weight: 300; }
.f-col-title { font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase; color: rgba(255,255,255,0.25); margin-bottom: 20px; font-weight: 400; }
.f-col a, .f-col p { display: block; font-size: 13px; color: rgba(255,255,255,0.45); text-decoration: none; margin-bottom: 10px; font-weight: 300; transition: color 0.2s; }
.f-col a:hover { color: #fff; }
.footer-bottom { display: flex; justify-content: space-between; align-items: center; }
.f-copy { font-size: 11px; color: rgba(255,255,255,0.18); }

@media (max-width: 1000px) { .cart-grid { grid-template-columns: 1fr; } .order-summary { position: static; } }
@media (max-width: 768px) {
  .nav { padding: 18px 24px; } .nav-links { display: none; }
  .cart-page { padding: 100px 24px 60px; }
  .cart-title { font-size: 38px; }
  .cart-item { grid-template-columns: 80px 1fr; grid-template-rows: auto auto; }
  .item-right { flex-direction: row; align-items: center; justify-content: space-between; grid-column: 1/-1; }
  .footer { padding: 40px 24px; }
  .footer-top { grid-template-columns: 1fr 1fr; gap: 28px; }
}
</style>
</head>
<body>

<nav class="nav" id="nav">
  <a href="" class="nav-logo">Lujain Junaidy</a>
  <div class="nav-links">
    <a href="">Home</a>
    <a href="{{ route('portfolio') }}">Portfolio</a>
    <a href="{{ route('shop.index') }}" class="active">Shop</a>
    <a href="">Contact</a>
  </div>
  <div class="nav-actions">
    <a href="" class="nav-btn">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
    </a>
    <a href="{{ route('cart.index') }}" class="nav-btn">
      <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
    </a>
  </div>
</nav>

<div class="cart-page">
  <div class="cart-header">
    <p class="cart-eyebrow">Your selection</p>
    <h1 class="cart-title">Your <em>cart</em></h1>
    <p class="cart-count-label">
      @if($cartItems->count() > 0)
        {{ $cartItems->count() }} {{ Str::plural('piece', $cartItems->count()) }} selected
      @else
        Your cart is empty
      @endif
    </p>
  </div>

  @if($cartItems->count() > 0)
    <div class="cart-grid">
      <div class="cart-items">
        @foreach($cartItems as $item)
          <div class="cart-item" id="cart-item-{{ $item->id }}" data-id="{{ $item->id }}">
            <div class="item-img">
              @if($item->product->image_url)
                <img src="{{ asset($item->product->image_url) }}" alt="{{ $item->product->name }}"
                     onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><rect x=\'3\' y=\'3\' width=\'18\' height=\'18\' rx=\'2\'/></svg></div>'">
              @else
                <div class="img-fallback">
                  <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                </div>
              @endif
            </div>

            <div class="item-info">
              @if($item->product->category)
                <div class="item-cat">{{ $item->product->category->name }}</div>
              @endif
              <div class="item-name">{{ $item->product->name }}</div>
              <div class="qty-ctrl">
                <button class="qty-btn" onclick="updateQty({{ $item->id }}, -1)">−</button>
                <span class="qty-val" id="qty-{{ $item->id }}">{{ $item->quantity }}</span>
                <button class="qty-btn" onclick="updateQty({{ $item->id }}, 1)">+</button>
              </div>
            </div>

            <div class="item-right">
              <div class="item-price" id="price-{{ $item->id }}">
                {{ number_format($item->product->price * $item->quantity, 0) }}
                <small>JOD</small>
              </div>
              <button class="btn-remove" onclick="removeItem({{ $item->id }})">
                <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                Remove
              </button>
            </div>
          </div>
        @endforeach
      </div>

      <div class="order-summary">
        <div class="summary-title">Order summary</div>

        <div class="coupon-wrap">
          <span class="coupon-label">Promo code</span>
          <div class="coupon-row">
            <input type="text" class="coupon-input" id="coupon-input" placeholder="ENTER CODE">
            <button class="btn-coupon" onclick="applyCoupon()">Apply</button>
          </div>
          <div class="coupon-msg" id="coupon-msg"></div>
        </div>

        <div class="summary-row">
          <span class="lbl">Subtotal</span>
          <span class="val" id="summary-subtotal">{{ number_format($subtotal, 0) }} JOD</span>
        </div>
        <div class="summary-row" id="discount-row" style="{{ $discount > 0 ? '' : 'display:none' }}">
          <span class="lbl">Discount</span>
          <span class="val discount" id="summary-discount">− {{ number_format($discount, 0) }} JOD</span>
        </div>
        <div class="summary-divider"></div>
        <div class="summary-total">
          <span class="total-lbl">Total</span>
          <span class="total-val" id="summary-total">{{ number_format($total, 0) }} <small>JOD</small></span>
        </div>

        <a href="{{ route('checkout.index') }}" class="btn-checkout" style="display:block;text-align:center;text-decoration:none">
          Proceed to checkout
        </a>
        <a href="{{ route('shop.index') }}" class="continue-link">Continue shopping</a>

        <div class="secure-badge">
          <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span>Secure checkout</span>
        </div>
      </div>
    </div>
  @else
    <div class="empty-cart">
      <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      <div class="empty-cart-title">Your cart is empty</div>
      <p class="empty-cart-sub">Discover our curated collection of home objects and decor.</p>
      <a href="{{ route('shop.index') }}" class="btn-fill">Explore the shop</a>
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
    </div>
  </div>
  <div class="footer-bottom">
    <span class="f-copy">© 2026 Lujain Junaidy. All rights reserved.</span>
  </div>
</footer>

<script>
window.addEventListener('scroll', () => {
  document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 40);
});

const PRICES = {
  @foreach($cartItems as $item)
    "{{ $item->id }}": {{ (float) $item->product->price }},
  @endforeach
};

let quantities = {
  @foreach($cartItems as $item)
    "{{ $item->id }}": {{ (int) $item->quantity }},
  @endforeach
};

let appliedDiscount = {{ (float) $discount }};

function updateQty(itemId, delta) {
  itemId = String(itemId);

  const currentQty = quantities[itemId] || 1;
  const newQty = Math.max(1, currentQty + delta);

  fetch('{{ route("cart.update") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      item_id: itemId,
      quantity: newQty
    })
  })
  .then(res => res.json())
  .then(data => {
    if (!data.success) {
      alert(data.message || 'Something went wrong');
      return;
    }

    quantities[itemId] = newQty;

    document.getElementById(`qty-${itemId}`).textContent = newQty;
    document.getElementById(`price-${itemId}`).innerHTML =
      `${Math.round(PRICES[itemId] * newQty).toLocaleString()} <small>JOD</small>`;

    recalculate();
  });
}

function removeItem(itemId) {
  itemId = String(itemId);

  fetch('{{ route("cart.remove") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      item_id: itemId
    })
  })
  .then(res => res.json())
  .then(data => {
    if (!data.success) {
      alert(data.message || 'Something went wrong');
      return;
    }

    const el = document.getElementById(`cart-item-${itemId}`);
    if (el) el.remove();

    delete quantities[itemId];
    delete PRICES[itemId];

    recalculate();

    if (Object.keys(quantities).length === 0) {
      location.reload();
    }
  });
}

function recalculate() {
  const subtotal = Object.keys(quantities).reduce((sum, id) => {
    return sum + (Number(PRICES[id]) * Number(quantities[id]));
  }, 0);

  const total = Math.max(0, subtotal - appliedDiscount);

  document.getElementById('summary-subtotal').textContent =
    `${Math.round(subtotal).toLocaleString()} JOD`;

  document.getElementById('summary-total').innerHTML =
    `${Math.round(total).toLocaleString()} <small>JOD</small>`;
}

function applyCoupon() {
  const code = document.getElementById('coupon-input').value.trim();
  if (!code) return;

  fetch('{{ route("cart.coupon") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json'
    },
    body: JSON.stringify({ code })
  })
  .then(res => res.json())
  .then(data => {
    const msg = document.getElementById('coupon-msg');

    if (data.success) {
      appliedDiscount = Number(data.discount ?? data.discount_amount ?? 0);

      msg.className = 'coupon-msg success';
      msg.textContent = data.message || 'Coupon applied successfully';

      document.getElementById('summary-discount').textContent =
        `− ${Math.round(appliedDiscount).toLocaleString()} JOD`;

      document.getElementById('discount-row').style.display = '';

      recalculate();
    } else {
      msg.className = 'coupon-msg error';
      msg.textContent = data.message || 'Invalid code';
    }
  });
}
</script>
</body>
</html>