<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lujain Junaidy</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f4f2;
      color: #222;
    }

    /* ── Navbar ── */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 60px;
      background: #edeae6;
      border-bottom: 1px solid #ddd;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .logo {
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 3px;
      color: #1a1a18;
    }

    .nav-links {
      display: flex;
      gap: 32px;
      align-items: center;
    }

    .nav-links a {
      text-decoration: none;
      color: #555;
      font-size: 13px;
      letter-spacing: 0.3px;
      transition: color 0.2s;
    }

    .nav-links a:hover { color: #1a1a18; }

    .nav-icon {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: 1px solid #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
    }

    .nav-icon:hover { background: #e0dcd8; border-color: #aaa; }

    .nav-icon svg {
      width: 15px;
      height: 15px;
      stroke: #555;
      fill: none;
      stroke-width: 1.5;
    }

    /* ── Hero ── */
    .hero {
      height: 520px;
      background: url('/images/hero.jpg') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.45);
    }

    .hero-content {
      position: relative;
      z-index: 1;
      text-align: center;
      color: #fff;
      padding: 0 24px;
    }

    .hero-badge {
      display: inline-block;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 20px;
      border: 1px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.08);
      color: rgba(255,255,255,0.65);
      margin-bottom: 20px;
    }

    .hero-content h1 {
      font-size: 38px;
      font-weight: 500;
      line-height: 1.3;
      margin-bottom: 14px;
      letter-spacing: -0.5px;
    }

    .hero-content p {
      font-size: 15px;
      color: rgba(255,255,255,0.65);
      margin-bottom: 28px;
      max-width: 440px;
      line-height: 1.7;
    }

    .hero-btns {
      display: flex;
      gap: 12px;
      justify-content: center;
    }

    .btn {
      padding: 10px 24px;
      border-radius: 22px;
      border: 1px solid rgba(255,255,255,0.4);
      background: rgba(255,255,255,0.1);
      color: #fff;
      font-size: 13px;
      cursor: pointer;
      letter-spacing: 0.3px;
      transition: background 0.2s, border-color 0.2s;
    }

    .btn:hover { background: rgba(255,255,255,0.22); }

    .btn-solid {
      background: #fff;
      color: #1a1a18;
      border-color: #fff;
    }

    .btn-solid:hover { background: #f0ece8; border-color: #f0ece8; }

    /* ── Sections ── */
    .section {
      padding: 80px 60px;
      background: #fff;
      border-bottom: 1px solid #e8e5e1;
    }

    .section-tag {
      display: inline-block;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 12px;
      background: #f5f4f2;
      border: 1px solid #ddd;
      color: #888;
      margin-bottom: 16px;
    }

    /* ── About ── */
    .about {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: center;
    }

    .about-text h2 {
      font-size: 28px;
      font-weight: 500;
      margin-bottom: 20px;
      line-height: 1.3;
      color: #1a1a18;
    }

    .about-text p {
      font-size: 14px;
      color: #666;
      line-height: 1.8;
      margin-bottom: 16px;
    }

    .btn-outline {
      display: inline-block;
      margin-top: 8px;
      padding: 10px 24px;
      border-radius: 22px;
      border: 1px solid #ccc;
      background: transparent;
      color: #1a1a18;
      font-size: 13px;
      cursor: pointer;
      transition: background 0.2s, border-color 0.2s;
    }

    .btn-outline:hover { background: #f5f4f2; border-color: #aaa; }

    .about-images {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .img-placeholder {
      aspect-ratio: 1;
      border-radius: 10px;
      background: #f5f4f2;
      border: 1px solid #e8e5e1;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .img-placeholder img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .img-placeholder svg {
      width: 32px;
      height: 32px;
      stroke: #bbb;
      fill: none;
      stroke-width: 1;
    }

    /* ── Shop ── */
    .shop-header {
      text-align: center;
      margin-bottom: 48px;
    }

    .shop-header h2 {
      font-size: 28px;
      font-weight: 500;
      margin-bottom: 8px;
    }

    .shop-header p {
      font-size: 14px;
      color: #888;
    }

    .products {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-bottom: 36px;
    }

    .product {
      border-radius: 12px;
      border: 1px solid #e8e5e1;
      overflow: hidden;
      background: #fff;
      transition: box-shadow 0.2s;
    }

    .product:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.08); }

    .product-img {
      aspect-ratio: 1;
      background: #f5f4f2;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .product-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-img svg {
      width: 40px;
      height: 40px;
      stroke: #bbb;
      fill: none;
      stroke-width: 1;
    }

    .product-info {
      padding: 16px 18px;
    }

    .product-info h4 {
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 4px;
      color: #1a1a18;
    }

    .product-info .desc {
      font-size: 12px;
      color: #999;
      margin-bottom: 10px;
      line-height: 1.5;
    }

    .product-info .price {
      font-size: 14px;
      font-weight: 600;
      color: #1a1a18;
    }

    .shop-center { text-align: center; }

    /* ── Footer ── */
    .footer {
      padding: 60px;
      background: #edeae6;
      border-top: 1px solid #ddd;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 48px;
      margin-bottom: 40px;
    }

    .footer-brand h3 {
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 3px;
      margin-bottom: 12px;
      color: #1a1a18;
    }

    .footer-brand p {
      font-size: 13px;
      color: #888;
      line-height: 1.7;
      max-width: 280px;
    }

    .footer-col h4 {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #aaa;
      margin-bottom: 14px;
    }

    .footer-col a,
    .footer-col p {
      display: block;
      font-size: 13px;
      color: #777;
      text-decoration: none;
      margin-bottom: 8px;
      line-height: 1.6;
      transition: color 0.2s;
    }

    .footer-col a:hover { color: #1a1a18; }

    .copyright {
      border-top: 1px solid #ddd;
      padding-top: 20px;
      text-align: center;
      font-size: 12px;
      color: #aaa;
    }

    /* ── Responsive ── */
    @media (max-width: 900px) {
      .navbar { padding: 16px 24px; }
      .hero-content h1 { font-size: 28px; }
      .section { padding: 60px 24px; }
      .about { grid-template-columns: 1fr; gap: 40px; }
      .products { grid-template-columns: 1fr 1fr; }
      .footer { padding: 40px 24px; }
      .footer-grid { grid-template-columns: 1fr; gap: 28px; }
    }

    @media (max-width: 560px) {
      .products { grid-template-columns: 1fr; }
      .hero { height: 420px; }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">LUJAIN JUNAIDY</div>
  <div class="nav-links">
    <a href="/">Home</a>
    <a href="/portf">Portfolio</a>
    <a href="#">Shop</a>
    <div class="nav-icon">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
    </div>
    <div class="nav-icon">
      <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
    </div>
  </div>
</nav>

<!-- Hero -->
<div class="hero">
  <div class="hero-content">
    <div class="hero-badge">Award-Winning Studio</div>
    <h1>Transforming Spaces,<br>Elevating Lives</h1>
    <p>Interior design that blends functionality with timeless elegance</p>
    <div class="hero-btns">
      <button class="btn">Portfolio</button>
      <button class="btn btn-solid">Get in touch</button>
    </div>
  </div>
</div>

<!-- About -->
<div class="section">
  <div class="about">
    <div class="about-text">
      <div class="section-tag">About the studio</div>
      <h2>Crafting spaces<br>that inspire</h2>
      <p>With over 5 years of experience in luxury interior design, we specialize in creating spaces that reflect your personality while maintaining timeless appeal.</p>
      <p>Our approach combines meticulous attention to detail with a deep understanding of spatial dynamics — resulting in interiors that are both beautiful and highly functional.</p>
      <button class="btn-outline">Book a consultation</button>
    </div>
    <div class="about-images">
      <div class="img-placeholder">
        <img src="/images/1.jpg" alt="Interior 1" onerror="this.style.display='none'">
        <svg viewBox="0 0 24 24" style="display:none" class="fallback-icon"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
      </div>
      <div class="img-placeholder">
        <img src="/images/2.jpg" alt="Interior 2" onerror="this.style.display='none'">
      </div>
      <div class="img-placeholder">
        <img src="/images/3.jpg" alt="Interior 3" onerror="this.style.display='none'">
      </div>
      <div class="img-placeholder">
        <img src="/images/4.jpg" alt="Interior 4" onerror="this.style.display='none'">
      </div>
    </div>
  </div>
</div>

<!-- Shop -->
<div class="section" style="background:#faf9f7;">
  <div class="shop-header">
    <div class="section-tag">Collection</div>
    <h2>Shop our collection</h2>
    <p>Curated pieces to complete your space</p>
  </div>

  <div class="products">
    <div class="product">
      <div class="product-img">
        <img src="/images/p1.jpg" alt="Floral Arrangement" onerror="this.style.display='none'">
      </div>
      <div class="product-info">
        <h4>Floral Arrangement</h4>
        <p class="desc">Elegant flowers in a ceramic vase</p>
        <p class="price">18 JD</p>
      </div>
    </div>

    <div class="product">
      <div class="product-img">
        <img src="/images/p2.jpg" alt="Knitted Cushion" onerror="this.style.display='none'">
      </div>
      <div class="product-info">
        <h4>Knitted Cushion</h4>
        <p class="desc">Cozy textured cushion</p>
        <p class="price">12 JD</p>
      </div>
    </div>

    <div class="product">
      <div class="product-img">
        <img src="/images/p3.jpg" alt="Scented Candle" onerror="this.style.display='none'">
      </div>
      <div class="product-info">
        <h4>Scented Candle</h4>
        <p class="desc">Calming scented candle</p>
        <p class="price">9 JD</p>
      </div>
    </div>
  </div>

  <div class="shop-center">
    <button class="btn-outline">Browse shop</button>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <h3>LUJAIN JUNAIDY</h3>
      <p>Creating timeless interiors that inspire and elevate everyday living.</p>
    </div>
    <div class="footer-col">
      <h4>Navigation</h4>
      <a href="#">Home</a>
      <a href="#">Portfolio</a>
      <a href="#">Shop</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <p>Lujain@interiordesign.com</p>
      <p>+962 7 7931 8674</p>
      <p>Amman, Jordan</p>
    </div>
  </div>
  <div class="copyright">© 2026 Lujain Junaidy. All rights reserved.</div>
</footer>

</body>
</html>