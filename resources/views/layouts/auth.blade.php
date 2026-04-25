<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --black:  #0d0d0d;
                --white:  #ffffff;
                --text:   #111111;
                --muted:  #777777;
                --border: #e4e4e4;
                --gold:   #c9a84c;
                --gold-dk:#9a7828;
            }

            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

            body {
                font-family: 'Jost', sans-serif;
                font-weight: 300;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            /* ── Full-screen background image ── */
            .bg {
                position: fixed;
                inset: 0;
                background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1800&q=80');
                background-size: cover;
                background-position: center;
                z-index: 0;
            }

            /* Dark overlay with slight warm tint */
            .bg::after {
                content: '';
                position: absolute;
                inset: 0;
                background: rgba(8, 8, 6, 0.62);
            }

            /* Subtle vignette */
            .vignette {
                position: fixed;
                inset: 0;
                background: radial-gradient(ellipse at center, transparent 40%, rgba(0,0,0,0.45) 100%);
                z-index: 1;
                pointer-events: none;
            }

            /* ── Top logo bar ── */
            .top-bar {
                position: fixed;
                top: 0; left: 0; right: 0;
                z-index: 10;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 28px 48px;
            }

            .top-logo {
                font-family: 'Cormorant Garamond', serif;
                font-size: 14px; font-weight: 400;
                letter-spacing: 5px; text-transform: uppercase;
                color: rgba(255,255,255,0.85);
                text-decoration: none;
            }

            .top-tagline {
                font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
                color: rgba(255,255,255,0.25); font-weight: 300;
            }

            /* ── Center card ── */
            .card {
                position: relative;
                z-index: 5;
                width: 100%;
                max-width: 440px;
                margin: 0 24px;

                background: rgba(255, 255, 255, 0.97);
                border-radius: 3px;
                padding: 52px 48px 44px;

                /* frosted feel */
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255,255,255,0.6);
            }

            /* Gold top accent line */
            .card::before {
                content: '';
                position: absolute;
                top: 0; left: 48px; right: 48px;
                height: 2px;
                background: linear-gradient(90deg, transparent, var(--gold), transparent);
            }

            /* ── Card header ── */
            .card-badge {
                display: inline-flex; align-items: center; gap: 7px;
                font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase;
                color: var(--gold-dk); font-weight: 400;
                background: rgba(201,168,76,0.09);
                padding: 5px 13px;
                border: 1px solid rgba(201,168,76,0.28);
                border-radius: 1px;
                margin-bottom: 24px;
            }

            .card-title {
                font-family: 'Cormorant Garamond', serif;
                font-size: 44px; font-weight: 300;
                color: var(--text); line-height: 1.06;
                letter-spacing: -0.5px;
                margin-bottom: 6px;
            }
            .card-title em { font-style: italic; color: var(--gold-dk); }

            .card-sub {
                font-size: 13px; color: var(--muted);
                font-weight: 300; line-height: 1.75;
                margin-bottom: 32px;
            }

            /* thin divider */
            .card-rule {
                height: 1px;
                background: var(--border);
                margin-bottom: 28px;
            }

            /* ── Session status ── */
            .sess-ok {
                font-size: 13px; color: #3a7a3a;
                background: rgba(58,122,58,0.07);
                border: 1px solid rgba(58,122,58,0.18);
                padding: 10px 14px; border-radius: 2px;
                margin-bottom: 20px; font-weight: 300;
            }

            /* ── Fields ── */
            .field { margin-bottom: 18px; }

            .field-label {
                display: block;
                font-size: 10px; letter-spacing: 2px; text-transform: uppercase;
                color: var(--muted); font-weight: 400; margin-bottom: 7px;
            }

            .field-input {
                width: 100%;
                background: #f7f7f5;
                border: 1px solid var(--border);
                border-radius: 2px;
                padding: 12px 15px;
                font-family: 'Jost', sans-serif;
                font-size: 14px; font-weight: 300;
                color: var(--text);
                outline: none;
                transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
                -webkit-appearance: none;
            }
            .field-input::placeholder { color: #c8c8c8; }
            .field-input:focus {
                border-color: var(--gold);
                background: #ffffff;
                box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
            }

            .field-error {
                font-size: 12px; color: #b84040;
                margin-top: 5px; font-weight: 300;
            }

            /* ── Remember + forgot ── */
            .form-row {
                display: flex; justify-content: space-between; align-items: center;
                margin-bottom: 26px;
            }

            .remember {
                display: flex; align-items: center; gap: 8px;
                font-size: 12px; color: var(--muted); cursor: pointer;
            }
            .remember input { accent-color: var(--black); width: 13px; height: 13px; }

            .forgot {
                font-size: 12px; color: var(--muted);
                text-decoration: none; font-weight: 300;
                position: relative; padding-bottom: 1px;
                transition: color 0.2s;
            }
            .forgot::after {
                content: '';
                position: absolute; bottom: 0; left: 0; right: 0;
                height: 1px; background: var(--gold);
                transform: scaleX(0); transform-origin: left;
                transition: transform 0.25s;
            }
            .forgot:hover { color: var(--text); }
            .forgot:hover::after { transform: scaleX(1); }

            /* ── Submit ── */
            .btn {
                width: 100%;
                padding: 14px;
                background: var(--black); color: var(--white);
                border: 1px solid var(--black);
                font-family: 'Jost', sans-serif;
                font-size: 11px; letter-spacing: 3px; text-transform: uppercase;
                cursor: pointer; font-weight: 400; border-radius: 2px;
                transition: background 0.22s, color 0.22s;
                margin-bottom: 20px;
            }
            .btn:hover { background: transparent; color: var(--black); }

            /* ── Card footer ── */
            .card-footer {
                display: flex; justify-content: center;
                font-size: 11px; color: #bbbbbb; letter-spacing: 0.3px; font-weight: 300;
            }

            /* ── Bottom watermark ── */
            .bottom-watermark {
                position: fixed;
                bottom: -20px; left: 50%;
                transform: translateX(-50%);
                font-family: 'Cormorant Garamond', serif;
                font-size: 110px; font-weight: 300;
                color: rgba(255,255,255,0.04);
                letter-spacing: 10px;
                white-space: nowrap;
                pointer-events: none;
                z-index: 2;
            }

            /* ── Animations ── */
            @keyframes up {
                from { opacity: 0; transform: translateY(20px); }
                to   { opacity: 1; transform: none; }
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            .bg, .vignette { animation: fadeIn 1.2s ease forwards; }
            .top-bar { animation: fadeIn 1s 0.3s ease both; }
            .bottom-watermark { animation: fadeIn 1.5s 0.5s ease both; }

            .a { opacity: 0; animation: up 0.65s cubic-bezier(0.22,0.61,0.36,1) forwards; }
            .a1 { animation-delay: 0.35s; }
            .a2 { animation-delay: 0.43s; }
            .a3 { animation-delay: 0.51s; }
            .a4 { animation-delay: 0.59s; }
            .a5 { animation-delay: 0.67s; }
            .a6 { animation-delay: 0.75s; }
            .a7 { animation-delay: 0.83s; }
            .a8 { animation-delay: 0.91s; }

            @media (max-width: 520px) {
                .top-bar { padding: 20px 24px; }
                .top-tagline { display: none; }
                .card { padding: 40px 28px 36px; margin: 0 16px; }
                .card-title { font-size: 36px; }
            }
        </style>
    </head>
    <body>

        <!-- Background image + overlay -->
        <div class="bg"></div>
        <div class="vignette"></div>

        <!-- Top nav bar -->
        <div class="top-bar">
            <a href="/" class="top-logo">Lujain Junaidy</a>
            <span class="top-tagline">Interior Design Studio · Amman</span>
        </div>

        <!-- Bottom ghost text -->
        <div class="bottom-watermark">STUDIO</div>

        <!-- Centered login card -->
      <div class="card">

    <div class="card-badge a a1">✦ Client portal</div>
    <h1 class="card-title a a2">Welcome<br><em>back</em></h1>
    <p class="card-sub a a3">Sign in to access your project dashboard.</p>

    <div class="card-rule a a3"></div>

    <!-- 🔥 هون السحر -->
    @yield('content')

</div>

    </body>
</html>