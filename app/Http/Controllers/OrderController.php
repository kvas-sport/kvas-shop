<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = request()->validate([
            'user_id' => 'required|exists:users,id',
            'product_ids.*' => 'required|exists:products,id',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $order = Order::create([
            // Создаем новый заказ, связанный с текущим пользователем
            'user_id' => auth()->id(),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'total_cost' => $request->total_cost,
            'delivery_cost' => $request->delivery_cost,
        ]);

        foreach ($data['product_ids'] as $product_id) {
            $product = Cart::where('product_id', $product_id)->first();
            $characteristic_id = $product->charaфcteristic_id;
            $amount = $product->amount;

            $order->products()->attach($product_id, [
                'characteristic_id' => $characteristic_id,
                'amount' => $amount,
            ]);
            // Создаем уведомление о заказе для текущего пользователя
            Notification::create([
                'user_id' => auth()->id(),
                'message' => 'Ваш заказ успешно оформлен!',
            ]);
        }
        

        Cart::where('user_id', $data['user_id'])->delete();
         // Перенаправляем пользователя обратно с сообщением об успешном заказе
        return redirect()->back()->with('success', 'Заказ успешно оформлен!');

    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
