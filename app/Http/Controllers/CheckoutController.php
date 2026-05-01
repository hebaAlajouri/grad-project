<?php



namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product.category')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $addresses = Address::where('user_id', auth()->id())->get();

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);
        $discount = session('cart_discount', 0);
        $total = max(0, $subtotal - $discount);

        return view('checkout.index', compact(
            'cartItems',
            'addresses',
            'subtotal',
            'discount',
            'total'
        ));
    }

    public function place(Request $request)
    {
        $request->validate([
            'address_id' => 'nullable|exists:addresses,id',
            'street' => 'required_without:address_id|string|max:255',
            'city' => 'required_without:address_id|string|max:255',
            'region' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        return DB::transaction(function () use ($request, $cartItems) {
            $addressId = $request->address_id;

            if (!$addressId) {
                $address = Address::create([
                    'user_id' => auth()->id(),
                    'label' => 'Home',
                    'street' => $request->street,
                    'city' => $request->city,
                    'region' => $request->region,
                    'postal_code' => $request->postal_code,
                    'country' => 'Jordan',
                    'is_default' => 0,
                ]);

                $addressId = $address->id;
            }

            $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);
            $discount = session('cart_discount', 0);
            $total = max(0, $subtotal - $discount);

            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
                'coupon_id' => session('cart_coupon_id'),
                'subtotal' => $subtotal,
                'discount_amount' => $discount,
                'total' => $total,
                'payment_method' => 'cod',
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->price,
                ]);

                Product::where('id', $item->product_id)->decrement('quantity', $item->quantity);
            }

            CartItem::where('user_id', auth()->id())->delete();

            session()->forget([
                'cart_count',
                'cart_coupon_id',
                'cart_discount',
            ]);

            return redirect()->route('checkout.success', $order->id);
        });
    }

    public function success(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product', 'address');

        return view('checkout.success', compact('order'));
    }
}