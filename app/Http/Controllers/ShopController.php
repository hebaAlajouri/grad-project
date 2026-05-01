<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $products = Product::with('category')
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->sort === 'price_asc', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($request->sort === 'price_desc', fn ($q) => $q->orderBy('price', 'desc'))
            ->when(!$request->sort || $request->sort === 'newest', fn ($q) => $q->latest())
            ->paginate(8)
            ->withQueryString();

        return view('shop.index', compact('categories', 'products'));
    }
}