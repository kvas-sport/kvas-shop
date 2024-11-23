<?php

namespace App\Http\Controllers;

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
            'product_id' => 'required|exists:products,id',
            'total_amount' => 'required|integer|min:1',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $order = Order::create([
            'total_amount' => $data['total_amount'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'status' => $data['status'],
        ]);

        $order->orderProducts()->attach($data['product_id'], $data['user_id']);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
