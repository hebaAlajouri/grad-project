<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product.category')
            ->where('user_id', auth()->id())
            ->get();

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $discount = session('cart_discount', 0);
        $total = max(0, $subtotal - $discount);

        return view('cart.index', compact('cartItems', 'subtotal', 'discount', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock_status === 'out_of_stock' || $product->quantity <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Product is out of stock',
            ]);
        }

        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => min($cartItem->quantity + 1, $product->quantity),
            ]);
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity ?? 1,
                'added_at' => now(),
            ]);
        }

        $cartCount = CartItem::where('user_id', auth()->id())->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->findOrFail($request->item_id);

        $qty = min($request->quantity, $item->product->quantity);

        $item->update(['quantity' => $qty]);

        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
        ]);

        CartItem::where('user_id', auth()->id())
            ->where('id', $request->item_id)
            ->delete();

        $cartCount = CartItem::where('user_id', auth()->id())->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
        ]);
    }

    public function coupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $coupon = Coupon::where('code', strtoupper($request->code))
            ->where('is_active', 1)
            ->whereDate('expiry_date', '>=', now())
            ->first();

        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired coupon',
            ]);
        }

        if ($subtotal < $coupon->min_order_amt) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum order amount is not reached',
            ]);
        }

        if ($coupon->usage_limit && $coupon->usage_count >= $coupon->usage_limit) {
            return response()->json([
                'success' => false,
                'message' => 'Coupon usage limit reached',
            ]);
        }

        $discount = $coupon->discount_type === 'percentage'
            ? ($subtotal * $coupon->discount_value / 100)
            : $coupon->discount_value;

        $discount = min($discount, $subtotal);
        $total = max(0, $subtotal - $discount);

        session([
            'cart_coupon_id' => $coupon->id,
            'cart_discount' => $discount,
        ]);

        return response()->json([
            'success' => true,
            'discount' => round($discount),
            'total' => round($total),
            'message' => 'Coupon applied successfully',
        ]);
    }
}