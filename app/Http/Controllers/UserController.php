<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function update(User $user): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|min:11|max:11',
        ]);

        $user->update($data);

        return redirect()->back();
    }

    public function profile(): View
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->with('products')->get();
        $characteristics = Characteristic::all()->keyBy('id');

        return view('users.profile', compact('user', 'orders', 'characteristics'));
    }
}
