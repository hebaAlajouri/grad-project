<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // FR-2.2: View cart
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('store.cart', compact('cartItems', 'total'));
    }

    // FR-2.2: Add to cart
    public function add(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,product_id']);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock_status === 'out_of_stock') {
            return back()->with('error', 'This product is out of stock.');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => 1,
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    // FR-2.3: Update quantity
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        CartItem::where('cart_item_id', $id)
            ->where('user_id', Auth::id())
            ->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated.');
    }

    // FR-2.3: Remove item
    public function remove($id)
    {
        CartItem::where('cart_item_id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Item removed from cart.');
    }
}