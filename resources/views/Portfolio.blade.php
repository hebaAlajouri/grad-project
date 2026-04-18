<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio — Lujain Junaidy</title>
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

body {
  font-family: 'Jost', sans-serif;
  background: var(--cream);
  color: var(--charcoal);
  font-weight: 300;
  overflow-x: hidden;
}

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

.nav-logo {
  font-family: 'Cormorant Garamond', serif;
  font-size: 17px; font-weight: 400;
  letter-spacing: 4px; text-transform: uppercase;
  color: var(--charcoal); text-decoration: none;
}

.nav-links { display: flex; align-items: center; gap: 40px; }
.nav-links a {
  font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase;
  color: var(--mid); text-decoration: none;
  transition: color 0.2s; font-weight: 400;
}
.nav-links a:hover { color: var(--charcoal); }
.nav-links a.active { color: var(--charcoal); border-bottom: 1px solid var(--gold); padding-bottom: 2px; }

.nav-actions { display: flex; gap: 12px; }
.nav-btn {
  width: 36px; height: 36px; border-radius: 50%;
  border: 1px solid var(--border); background: transparent;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; transition: border-color 0.2s, background 0.2s;
}
.nav-btn:hover { border-color: var(--charcoal); background: var(--charcoal); }
.nav-btn:hover svg { stroke: var(--cream); }
.nav-btn svg { width: 14px; height: 14px; stroke: var(--mid); fill: none; stroke-width: 1.5; transition: stroke 0.2s; }

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
  content: 'PORTFOLIO';
  position: absolute; right: -20px; top: 50%; transform: translateY(-50%);
  font-family: 'Cormorant Garamond', serif;
  font-size: 160px; font-weight: 300;
  color: rgba(184,151,90,0.06);
  letter-spacing: 10px; pointer-events: none; white-space: nowrap;
}

.hero-left { display: flex; flex-direction: column; justify-content: flex-end; }

.hero-eyebrow {
  font-size: 10px; letter-spacing: 3px; text-transform: uppercase;
  color: var(--gold); margin-bottom: 24px; font-weight: 400;
}

.hero-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 68px; font-weight: 300; line-height: 1.05;
  letter-spacing: -1px; color: var(--charcoal);
}
.hero-title em { font-style: italic; color: var(--gold); }

.hero-right { display: flex; flex-direction: column; justify-content: flex-end; gap: 32px; }

.hero-desc {
  font-size: 15px; color: var(--mid); line-height: 1.85;
  max-width: 380px; font-weight: 300;
}

.hero-stats {
  display: flex; gap: 40px;
  padding-top: 24px; border-top: 1px solid var(--border);
}
.hero-stat .num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 36px; font-weight: 300; color: var(--charcoal);
  display: block; line-height: 1; margin-bottom: 4px;
}
.hero-stat .lbl {
  font-size: 10px; letter-spacing: 2px; text-transform: uppercase;
  color: var(--mid); font-weight: 400;
}

/* FILTER */
.filter-wrap {
  padding: 0 56px; background: var(--warm-white);
  border-bottom: 1px solid var(--border);
  display: flex; align-items: stretch; overflow-x: auto;
}
.filter-item {
  padding: 20px 28px;
  font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
  color: var(--mid); cursor: pointer; border: none; background: transparent;
  border-bottom: 2px solid transparent;
  transition: color 0.2s, border-color 0.2s;
  white-space: nowrap; font-family: 'Jost', sans-serif; font-weight: 400;
}
.filter-item:hover { color: var(--charcoal); }
.filter-item.active { color: var(--charcoal); border-bottom-color: var(--gold); }

/* GRID */
.grid-wrap { padding: 56px; background: var(--cream); }

.portfolio-grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  gap: 20px;
}

.p-card {
  background: var(--warm-white);
  border: 1px solid var(--border);
  border-radius: 3px; overflow: hidden; cursor: pointer;
  transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94), box-shadow 0.35s;
}
.p-card:hover { transform: translateY(-6px); box-shadow: 0 20px 48px rgba(28,27,25,0.1); }

.p-card.col-8 { grid-column: span 8; }
.p-card.col-4 { grid-column: span 4; }
.p-card.col-5 { grid-column: span 5; }
.p-card.col-7 { grid-column: span 7; }

.card-img {
  width: 100%; overflow: hidden;
  background: #e8e4dc; position: relative;
}
.card-img.wide { aspect-ratio: 16/9; }
.card-img.short { aspect-ratio: 4/3; }
.card-img.square { aspect-ratio: 1; }
.card-img.tall { aspect-ratio: 3/4; }

.card-img img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94);
}
.p-card:hover .card-img img { transform: scale(1.04); }

.img-fallback {
  width: 100%; height: 100%;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  gap: 10px; background: #ede9e2;
}
.img-fallback svg { width: 28px; height: 28px; stroke: #b0aa9f; fill: none; stroke-width: 1; }
.img-fallback span { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: #b8b3a8; font-weight: 400; }

.card-overlay {
  position: absolute; inset: 0; background: rgba(28,27,25,0);
  transition: background 0.3s;
  display: flex; align-items: center; justify-content: center;
}
.p-card:hover .card-overlay { background: rgba(28,27,25,0.28); }

.overlay-label {
  font-size: 10px; letter-spacing: 3px; text-transform: uppercase;
  color: #fff; border: 1px solid rgba(255,255,255,0.55);
  padding: 10px 24px; font-weight: 400;
  opacity: 0; transform: translateY(8px);
  transition: opacity 0.25s, transform 0.25s;
}
.p-card:hover .overlay-label { opacity: 1; transform: translateY(0); }

.card-body { padding: 22px 24px 26px; }
.card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
.card-cat { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); font-weight: 400; }
.card-yr { font-size: 11px; color: #c8c3bb; letter-spacing: 1px; }

.card-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 22px; font-weight: 400; color: var(--charcoal);
  margin-bottom: 8px; line-height: 1.25;
}
.card-desc { font-size: 13px; color: var(--mid); line-height: 1.7; margin-bottom: 16px; font-weight: 300; }
.card-tags { display: flex; gap: 6px; flex-wrap: wrap; }
.tag {
  font-size: 10px; letter-spacing: 1.2px; text-transform: uppercase;
  padding: 4px 10px; border: 1px solid var(--border);
  color: #9a9590; font-weight: 400; border-radius: 2px;
}

/* PROCESS */
.process-section {
  padding: 100px 56px; background: var(--charcoal);
  position: relative; overflow: hidden;
}
.process-section::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold), transparent);
}

.process-head {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 60px; margin-bottom: 64px; align-items: end;
}
.proc-eyebrow { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 20px; font-weight: 400; }
.proc-title { font-family: 'Cormorant Garamond', serif; font-size: 52px; font-weight: 300; color: #fff; line-height: 1.1; letter-spacing: -0.5px; }
.proc-title em { font-style: italic; color: var(--gold-light); }
.proc-desc { font-size: 14px; color: rgba(255,255,255,0.4); line-height: 1.85; font-weight: 300; }

.process-steps {
  display: grid; grid-template-columns: repeat(4, 1fr);
  border: 1px solid rgba(255,255,255,0.07); border-radius: 3px; overflow: hidden;
}
.step {
  padding: 36px 28px; border-right: 1px solid rgba(255,255,255,0.07);
  transition: background 0.3s;
}
.step:last-child { border-right: none; }
.step:hover { background: rgba(255,255,255,0.03); }

.step-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 52px; font-weight: 300;
  color: rgba(184,151,90,0.18); line-height: 1; margin-bottom: 20px;
}
.step-name {
  font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase;
  color: #fff; margin-bottom: 12px; font-weight: 400;
}
.step-text { font-size: 13px; color: rgba(255,255,255,0.38); line-height: 1.8; font-weight: 300; }

/* TESTIMONIALS */
.testimonials-section {
  padding: 100px 56px; background: var(--warm-white);
  border-top: 1px solid var(--border);
}
.testi-head { text-align: center; margin-bottom: 64px; }
.testi-eyebrow { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 18px; font-weight: 400; display: block; }
.testi-title { font-family: 'Cormorant Garamond', serif; font-size: 46px; font-weight: 300; color: var(--charcoal); letter-spacing: -0.5px; }

.testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.testi-card { padding: 40px 32px; border: 1px solid var(--border); border-radius: 3px; background: var(--cream); }

.quote-mark {
  font-family: 'Cormorant Garamond', serif; font-size: 80px; line-height: 0.7;
  color: var(--gold); opacity: 0.25; margin-bottom: 20px; display: block;
}
.testi-text {
  font-family: 'Cormorant Garamond', serif;
  font-size: 18px; font-weight: 300; font-style: italic;
  color: var(--charcoal); line-height: 1.75; margin-bottom: 28px;
}
.testi-divider { width: 28px; height: 1px; background: var(--gold); margin-bottom: 20px; }
.testi-author { display: flex; align-items: center; gap: 14px; }
.author-init {
  width: 42px; height: 42px; border-radius: 50%;
  background: var(--charcoal);
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 400; color: var(--cream); letter-spacing: 1px; flex-shrink: 0;
}
.author-name { font-size: 13px; font-weight: 400; color: var(--charcoal); margin-bottom: 3px; letter-spacing: 0.3px; }
.author-proj { font-size: 11px; color: #aaa; letter-spacing: 0.5px; }

/* AWARDS */
.awards-section { padding: 80px 56px; background: var(--cream); }
.awards-head {
  display: flex; justify-content: space-between; align-items: flex-end;
  margin-bottom: 40px; padding-bottom: 28px; border-bottom: 1px solid var(--border);
}
.awards-title { font-family: 'Cormorant Garamond', serif; font-size: 40px; font-weight: 300; color: var(--charcoal); }
.awards-sub { font-size: 11px; color: var(--mid); letter-spacing: 2px; text-transform: uppercase; font-weight: 400; }

.awards-grid {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: 1px; background: var(--border);
  border: 1px solid var(--border); border-radius: 3px; overflow: hidden;
}
.award-item { background: var(--warm-white); padding: 32px 24px; transition: background 0.2s; }
.award-item:hover { background: var(--cream); }
.award-yr { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 14px; font-weight: 400; display: block; }
.award-name { font-family: 'Cormorant Garamond', serif; font-size: 19px; font-weight: 400; color: var(--charcoal); line-height: 1.35; margin-bottom: 8px; }
.award-org { font-size: 12px; color: var(--mid); font-weight: 300; }

/* CTA */
.cta-section {
  padding: 120px 56px; background: var(--warm-white);
  text-align: center; border-top: 1px solid var(--border);
}
.cta-eyebrow { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 24px; font-weight: 400; display: block; }
.cta-title { font-family: 'Cormorant Garamond', serif; font-size: 60px; font-weight: 300; color: var(--charcoal); line-height: 1.1; letter-spacing: -1px; margin-bottom: 20px; }
.cta-title em { font-style: italic; color: var(--gold); }
.cta-sub { font-size: 14px; color: var(--mid); line-height: 1.8; max-width: 360px; margin: 0 auto 40px; font-weight: 300; }
.cta-btns { display: flex; gap: 14px; justify-content: center; }

.btn-fill {
  padding: 14px 36px; background: var(--charcoal); color: var(--cream);
  border: 1px solid var(--charcoal); font-family: 'Jost', sans-serif;
  font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase;
  cursor: pointer; transition: background 0.2s, color 0.2s; font-weight: 400; border-radius: 2px;
}
.btn-fill:hover { background: transparent; color: var(--charcoal); }

.btn-ghost {
  padding: 14px 36px; background: transparent; color: var(--charcoal);
  border: 1px solid var(--border); font-family: 'Jost', sans-serif;
  font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase;
  cursor: pointer; transition: border-color 0.2s; font-weight: 400; border-radius: 2px;
}
.btn-ghost:hover { border-color: var(--charcoal); }

/* FOOTER */
.footer { padding: 56px; background: var(--charcoal); }
.footer-top {
  display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 48px; margin-bottom: 48px; padding-bottom: 48px;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
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
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate { opacity: 0; }
.animate.visible { animation: fadeUp 0.7s cubic-bezier(0.25,0.46,0.45,0.94) forwards; }
.animate.d1 { animation-delay: 0.1s; }
.animate.d2 { animation-delay: 0.2s; }
.animate.d3 { animation-delay: 0.3s; }
.animate.d4 { animation-delay: 0.4s; }

/* RESPONSIVE */
@media (max-width: 1100px) {
  .p-card.col-8 { grid-column: span 12; }
  .p-card.col-4 { grid-column: span 6; }
  .p-card.col-5 { grid-column: span 6; }
  .p-card.col-7 { grid-column: span 6; }
}
@media (max-width: 768px) {
  .nav { padding: 18px 24px; }
  .nav-links { display: none; }
  .page-hero { padding: 120px 24px 56px; grid-template-columns: 1fr; gap: 36px; }
  .page-hero::before { display: none; }
  .hero-title { font-size: 46px; }
  .filter-wrap { padding: 0 24px; }
  .grid-wrap { padding: 28px 24px; }
  .portfolio-grid { grid-template-columns: 1fr; }
  .p-card.col-8,.p-card.col-4,.p-card.col-5,.p-card.col-7 { grid-column: span 1; }
  .process-section { padding: 64px 24px; }
  .process-head { grid-template-columns: 1fr; gap: 20px; }
  .proc-title { font-size: 38px; }
  .process-steps { grid-template-columns: 1fr 1fr; }
  .step:nth-child(2) { border-right: none; }
  .step:nth-child(3) { border-top: 1px solid rgba(255,255,255,0.07); }
  .step:nth-child(4) { border-top: 1px solid rgba(255,255,255,0.07); border-right: none; }
  .testimonials-section { padding: 64px 24px; }
  .testi-title { font-size: 36px; }
  .testi-grid { grid-template-columns: 1fr; }
  .awards-section { padding: 56px 24px; }
  .awards-grid { grid-template-columns: 1fr 1fr; }
  .cta-section { padding: 80px 24px; }
  .cta-title { font-size: 40px; }
  .footer { padding: 40px 24px; }
  .footer-top { grid-template-columns: 1fr 1fr; gap: 28px; }
}
</style>
</head>
<body>

<nav class="nav" id="nav">
  <a href="/" class="nav-logo">Lujain Junaidy</a>
  <div class="nav-links">
    <a href="/">Home</a>
    <a href="/portfolio" class="active">Portfolio</a>
    <a href="/shop">Shop</a>
    <a href="/contact">Contact</a>
  </div>
  <div class="nav-actions">
    <div class="nav-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></div>
    <div class="nav-btn"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg></div>
  </div>
</nav>

<section class="page-hero">
  <div class="hero-left">
    <p class="hero-eyebrow animate d1">Selected works 2021 – 2025</p>
    <h1 class="hero-title animate d2">Every space<br><em>tells a story</em></h1>
  </div>
  <div class="hero-right">
    <p class="hero-desc animate d3">A curated collection of residential and commercial projects — each designed to balance beauty, function, and the unique personality of those who live and work within them.</p>
    <div class="hero-stats animate d4">
      <div class="hero-stat"><span class="num">47+</span><span class="lbl">Projects</span></div>
      <div class="hero-stat"><span class="num">5</span><span class="lbl">Years</span></div>
      <div class="hero-stat"><span class="num">12</span><span class="lbl">Awards</span></div>
      <div class="hero-stat"><span class="num">98%</span><span class="lbl">Satisfaction</span></div>
    </div>
  </div>
</section>

<div class="filter-wrap">
  <button class="filter-item active" onclick="doFilter('all',this)">All work</button>
  <button class="filter-item" onclick="doFilter('residential',this)">Residential</button>
  <button class="filter-item" onclick="doFilter('commercial',this)">Commercial</button>
  <button class="filter-item" onclick="doFilter('hospitality',this)">Hospitality</button>
  <button class="filter-item" onclick="doFilter('styling',this)">Styling</button>
</div>

<div class="grid-wrap">
  <div class="portfolio-grid" id="pgrid">

    <div class="p-card col-8 animate" data-cat="residential">
      <div class="card-img wide">
        <img src="/images/portfolio/villa-main.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><path d=\'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z\'/><polyline points=\'9 22 9 12 15 12 15 22\'/></svg><span>Al Noor Villa</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Residential · Featured</span><span class="card-yr">2025</span></div>
        <h3 class="card-title">Al Noor Villa — Abdoun</h3>
        <p class="card-desc">A sweeping 650 m² family residence reimagined with warm travertine, bespoke joinery, and a seamless indoor-outdoor concept centered on a landscaped courtyard.</p>
        <div class="card-tags"><span class="tag">Living</span><span class="tag">Kitchen</span><span class="tag">Master suite</span><span class="tag">Courtyard</span></div>
      </div>
    </div>

    <div class="p-card col-4 animate d1" data-cat="commercial">
      <div class="card-img short">
        <img src="/images/portfolio/haven-cafe.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><path d=\'M18 8h1a4 4 0 010 8h-1\'/><path d=\'M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z\'/></svg><span>Haven Café</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Commercial</span><span class="card-yr">2025</span></div>
        <h3 class="card-title">Haven Café — Sweifieh</h3>
        <p class="card-desc">A specialty café designed to feel like a second living room — earthy linen, aged brass, reclaimed wood.</p>
        <div class="card-tags"><span class="tag">F&B</span><span class="tag">Branding</span></div>
      </div>
    </div>

    <div class="p-card col-5 animate d2" data-cat="hospitality">
      <div class="card-img short">
        <img src="/images/portfolio/raha-spa.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><circle cx=\'12\' cy=\'12\' r=\'10\'/><path d=\'M12 8v4l3 3\'/></svg><span>Raha Spa</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Hospitality</span><span class="card-yr">2024</span></div>
        <h3 class="card-title">Raha Wellness Spa — Dead Sea</h3>
        <p class="card-desc">A sanctuary of calm built around natural stone, still water features, and carefully diffused light.</p>
        <div class="card-tags"><span class="tag">Wellness</span><span class="tag">Stone & water</span></div>
      </div>
    </div>

    <div class="p-card col-7 animate d3" data-cat="residential">
      <div class="card-img short">
        <img src="/images/portfolio/penthouse.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><rect x=\'2\' y=\'3\' width=\'20\' height=\'14\' rx=\'2\'/><path d=\'M8 21h8m-4-4v4\'/></svg><span>The Terrace Penthouse</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Residential</span><span class="card-yr">2024</span></div>
        <h3 class="card-title">The Terrace Penthouse</h3>
        <p class="card-desc">Floor-to-ceiling glass and a neutral palette that frames panoramic Amman city views at their finest.</p>
        <div class="card-tags"><span class="tag">Minimalist</span><span class="tag">Open-plan</span></div>
      </div>
    </div>

    <div class="p-card col-4 animate" data-cat="styling">
      <div class="card-img tall">
        <img src="/images/portfolio/styling-1.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><rect x=\'3\' y=\'3\' width=\'18\' height=\'18\' rx=\'2\'/><circle cx=\'8.5\' cy=\'8.5\' r=\'1.5\'/><path d=\'M21 15l-5-5L5 21\'/></svg><span>Editorial Styling</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Styling</span><span class="card-yr">2024</span></div>
        <h3 class="card-title">Autumn Editorial — Vogue Arabia</h3>
        <p class="card-desc">Set styling across three autumnal tableaux for a luxury shoot.</p>
        <div class="card-tags"><span class="tag">Editorial</span><span class="tag">Art direction</span></div>
      </div>
    </div>

    <div class="p-card col-4 animate d1" data-cat="residential">
      <div class="card-img square">
        <img src="/images/portfolio/kids-room.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><path d=\'M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z\'/></svg><span>Bloom Nursery</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Residential</span><span class="card-yr">2024</span></div>
        <h3 class="card-title">Bloom Nursery & Kids Room</h3>
        <p class="card-desc">Soft curves, muted pastels, and furniture designed to grow with the child.</p>
        <div class="card-tags"><span class="tag">Nursery</span><span class="tag">Playroom</span></div>
      </div>
    </div>

    <div class="p-card col-4 animate d2" data-cat="commercial">
      <div class="card-img square">
        <img src="/images/portfolio/boutique.jpg" alt="" onerror="this.parentElement.innerHTML='<div class=\'img-fallback\'><svg viewBox=\'0 0 24 24\'><path d=\'M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z\'/><path d=\'M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2\'/></svg><span>Dina Boutique</span></div>'">
        <div class="card-overlay"><span class="overlay-label">View project</span></div>
      </div>
      <div class="card-body">
        <div class="card-top"><span class="card-cat">Commercial</span><span class="card-yr">2023</span></div>
        <h3 class="card-title">Dina Fashion Boutique</h3>
        <p class="card-desc">Arched niches, cream plaster walls, and a central oval fitting room island.</p>
        <div class="card-tags"><span class="tag">Retail</span><span class="tag">Luxury</span></div>
      </div>
    </div>

  </div>
</div>

<section class="process-section">
  <div class="process-head">
    <div>
      <p class="proc-eyebrow">How it works</p>
      <h2 class="proc-title">The design<br><em>process</em></h2>
    </div>
    <p class="proc-desc">From first conversation to final reveal — a transparent, collaborative journey crafted around your vision, your lifestyle, and your space.</p>
  </div>
  <div class="process-steps">
    <div class="step">
      <div class="step-num">01</div>
      <div class="step-name">Discovery</div>
      <p class="step-text">A free 30-minute consultation to understand your vision, lifestyle, and the full scope of the project before anything begins.</p>
    </div>
    <div class="step">
      <div class="step-num">02</div>
      <div class="step-name">Concept</div>
      <p class="step-text">A detailed presentation of floor plans, material palettes, and 3D renders — crafted for your feedback and approval.</p>
    </div>
    <div class="step">
      <div class="step-num">03</div>
      <div class="step-name">Execution</div>
      <p class="step-text">We manage procurement, contractor coordination, and site visits — keeping you updated at every milestone.</p>
    </div>
    <div class="step">
      <div class="step-num">04</div>
      <div class="step-name">The reveal</div>
      <p class="step-text">Your space is styled, photographed, and handed over — a moment we look forward to just as much as you do.</p>
    </div>
  </div>
</section>

<section class="testimonials-section">
  <div class="testi-head">
    <span class="testi-eyebrow">Client stories</span>
    <h2 class="testi-title">Words from those we've served</h2>
  </div>
  <div class="testi-grid">
    <div class="testi-card">
      <span class="quote-mark">"</span>
      <p class="testi-text">Lujain didn't just redesign our home — she redesigned how we live in it. Every corner feels intentional. We've never been more in love with our space.</p>
      <div class="testi-divider"></div>
      <div class="testi-author">
        <div class="author-init">SA</div>
        <div><div class="author-name">Sara Al-Amin</div><div class="author-proj">Al Noor Villa, Abdoun</div></div>
      </div>
    </div>
    <div class="testi-card">
      <span class="quote-mark">"</span>
      <p class="testi-text">Our café went from a blank shell to the most photographed spot in Sweifieh. Customers constantly ask who designed it. Lujain's work truly speaks for itself.</p>
      <div class="testi-divider"></div>
      <div class="testi-author">
        <div class="author-init">KN</div>
        <div><div class="author-name">Khalil Nasser</div><div class="author-proj">Haven Café, Sweifieh</div></div>
      </div>
    </div>
    <div class="testi-card">
      <span class="quote-mark">"</span>
      <p class="testi-text">The process was smooth, transparent, and genuinely fun. She listened at every stage. The reveal day felt like watching a dream materialise in real life.</p>
      <div class="testi-divider"></div>
      <div class="testi-author">
        <div class="author-init">RH</div>
        <div><div class="author-name">Rania Haddad</div><div class="author-proj">The Terrace Penthouse</div></div>
      </div>
    </div>
  </div>
</section>

<section class="awards-section">
  <div class="awards-head">
    <h2 class="awards-title">Recognition</h2>
    <span class="awards-sub">Awards & features</span>
  </div>
  <div class="awards-grid">
    <div class="award-item">
      <span class="award-yr">2025</span>
      <div class="award-name">Best Residential Interior — Jordan Design Awards</div>
      <div class="award-org">Jordan Interior Design Society</div>
    </div>
    <div class="award-item">
      <span class="award-yr">2024</span>
      <div class="award-name">Top 30 Under 30 Designers — Middle East</div>
      <div class="award-org">Architectural Digest Arabia</div>
    </div>
    <div class="award-item">
      <span class="award-yr">2024</span>
      <div class="award-name">Featured — Vogue Living Arabia</div>
      <div class="award-org">Condé Nast Middle East</div>
    </div>
    <div class="award-item">
      <span class="award-yr">2022</span>
      <div class="award-name">Certified Luxury Interior Designer — CIDE</div>
      <div class="award-org">Council of Interior Design Excellence</div>
    </div>
  </div>
</section>

<section class="cta-section">
  <span class="cta-eyebrow">Let's work together</span>
  <h2 class="cta-title">Ready to transform<br><em>your space?</em></h2>
  <p class="cta-sub">Whether you have a clear vision or you're starting from a blank page — we'd love to begin the conversation.</p>
  <div class="cta-btns">
    <button class="btn-fill">Book a consultation</button>
    <button class="btn-ghost">Explore the shop</button>
  </div>
</section>

<footer class="footer">
  <div class="footer-top">
    <div>
      <span class="f-logo">Lujain Junaidy</span>
      <p class="f-tagline">Creating timeless interiors that inspire and elevate everyday living.</p>
    </div>
    <div class="f-col">
      <div class="f-col-title">Navigate</div>
      <a href="/">Home</a>
      <a href="/portfolio">Portfolio</a>
      <a href="/shop">Shop</a>
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
      <div class="f-social"><svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></div>
    </div>
  </div>
</footer>

<script>
  window.addEventListener('scroll', () => {
    document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 40);
  });

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.animate').forEach(el => obs.observe(el));

  function doFilter(cat, btn) {
    document.querySelectorAll('.filter-item').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.p-card').forEach(card => {
      card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'block' : 'none';
    });
  }
</script>
</body>
</html>