<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // FR-2.4: Show checkout page
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('store.cart')->with('error', 'Your cart is empty.');
        }

        $subtotal  = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);
        $addresses = Auth::user()->addresses ?? collect();

        return view('store.checkout', compact('cartItems', 'subtotal', 'addresses'));
    }

    // FR-2.4 + FR-2.5: Place order (COD)
    public function place(Request $request)
    {
        $request->validate([
            'address_id'     => 'required|exists:addresses,id',
            'payment_method' => 'required|in:cod',
            'notes'          => 'nullable|string|max:500',
        ]);

        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('store.cart')->with('error', 'Your cart is empty.');
        }

        DB::transaction(function () use ($request, $cartItems) {
            $subtotal = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);

            $order = Order::create([
                'user_id'         => Auth::id(),
                'address_id'      => $request->address_id,
                'subtotal'        => $subtotal,
                'discount_amount' => 0,
                'total'           => $subtotal,
                'payment_method'  => 'cod',
                'status'          => 'pending',
                'notes'           => $request->notes,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->order_id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'unit_price' => $item->product->price,
                ]);
            }

            // Clear cart after order
            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('store.index')->with('success', 'Order placed successfully! 🎉');
    }
}