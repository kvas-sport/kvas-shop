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
            'user_id' => 'required',
            'total_amount' => 'required|integer|min:1',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        Order::create($data);

        return redirect()->route('orders.index');
    }

    public function addFavorites(User $user): RedirectResponse
    {
        $data = request()->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $user->favorities()->syncWithoutDetaching($data);

        return redirect()->route('favorites.index');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
