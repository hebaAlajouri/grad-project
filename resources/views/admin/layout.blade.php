<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f6f7fb;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #18181b;
            position: fixed;
            display: flex;
            flex-direction: column;
        }

        .sb-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sb-logo {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .sb-nav {
            flex: 1;
            padding: 10px;
        }

        .sb-section {
            font-size: 10px;
            color: rgba(255,255,255,0.4);
            margin: 10px 8px;
            text-transform: uppercase;
        }

        .sb-item {
            display: block;
            padding: 10px 12px;
            border-radius: 8px;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            margin-bottom: 4px;
            font-size: 14px;
            transition: 0.2s;
        }

        .sb-item:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .sb-item.active {
            background: rgba(83,74,183,0.25);
            color: #AFA9EC;
        }

        /* Main */
        .main-wrap {
            margin-left: 230px;
        }

        .topbar {
            background: #fff;
            padding: 14px 24px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }

        .topbar-title {
            font-weight: 600;
        }

        .page-content {
            padding: 25px;
        }

        /* Cards */
        .card-modern {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.04);
        }

        /* Table */
        .table {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }

        .table th {
            font-size: 12px;
            text-transform: uppercase;
            color: #999;
            border: none;
        }

        .table td {
            border-top: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .table tr:hover {
            background: #fafafa;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-size: 13px;
            padding: 6px 14px;
        }

        .btn-primary {
            background: #534AB7;
            border: none;
        }

        .btn-warning {
            background: #f59e0b;
            color: #fff;
            border: none;
        }

        .btn-danger {
            background: #ef4444;
            border: none;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">

    <div class="sb-brand">
        <a href="{{ route('admin.dashboard') }}" class="sb-logo">
            Admin Panel
        </a>
    </div>

    <div class="sb-nav">

        <div class="sb-section">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="sb-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <div class="sb-section">Catalog</div>
        <a href="{{ route('products.index') }}" class="sb-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
            Products
        </a>

        <a href="{{ route('categories.index') }}" class="sb-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            Categories
        </a>

        <div class="sb-section">Sales</div>
        <a href="{{ route('orders.index') }}" class="sb-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
            Orders
        </a>

        <a href="{{ route('coupons.index') }}" class="sb-item {{ request()->routeIs('coupons.*') ? 'active' : '' }}">
            Coupons
        </a>

        <div class="sb-section">Users</div>
        <a href="{{ route('users.index') }}" class="sb-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            Users
        </a>

    </div>

</div>

<!-- Main -->
<div class="main-wrap">

    <div class="topbar">
        <div class="topbar-title">
            @yield('page-title', 'Dashboard')
        </div>

        <div>
            {{ now()->format('M d, Y') }}
        </div>
    </div>

    <div class="page-content">

        <div class="card-modern">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>