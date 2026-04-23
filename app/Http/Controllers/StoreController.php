<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // FR-2.1: Browse products
    public function index(Request $request)
    {
        $query = Product::with('category')->where('stock_status', 'in_stock');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products    = $query->paginate(12);
        $categories  = Category::all();

        return view('store.index', compact('products', 'categories'));
    }

    // FR-2.1: View product details
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('store.show', compact('product'));
    }
}