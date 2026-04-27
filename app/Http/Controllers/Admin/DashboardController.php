<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
public function index()
{
    // 🔥 إنشاء أدمن إذا مش موجود
    $admin = User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]
    );

    return view('admin.dashboard', [
        'users' => User::count(),
        'products' => Product::count(),
        'orders' => Order::count(),
        'revenue' => Order::sum('total')
    ]);
}
}