<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'user_id' => 'required|exists:users,id',
            'product_ids.*' => 'required|exists:products,id',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $order = Order::create([
            'user_id' => $data['user_id'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        foreach ($data['product_ids'] as $product_id) {
            $product = Cart::where('product_id', $product_id)->first();
            $characteristic_id = $product->characteristic_id;
            $amount = $product->amount;

            $order->products()->attach($product_id, [
                'characteristic_id' => $characteristic_id,
                'amount' => $amount,
            ]);
        }

        Cart::where('user_id', $data['user_id'])->delete();

        return redirect()->back();
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
