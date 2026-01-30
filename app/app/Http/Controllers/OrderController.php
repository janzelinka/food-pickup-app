<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $cart = session()->get('cart', []);
        if (count($cart) < 1) {
            return redirect()->route('products.index')->with('error', 'Cart is empty!');
        }
        return view('checkout.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'pickup_time' => 'required|date|after:now',
        ]);

        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('products.index')->with('error', 'Cart is empty!');
        }

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_price' => $total,
            'pickup_time' => $request->pickup_time,
            'status' => 'pending'
        ]);

        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully! Your pickup is scheduled.');
    }
}
