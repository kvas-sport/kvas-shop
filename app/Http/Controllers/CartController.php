<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $products = Cart::with('product')->get();
        return view('carts.index', compact('products'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        Cart::create($data);

        return redirect()->route('carts.index');
    }

    public function destroy(Cart $Cart): RedirectResponse
    {
        $Cart->delete();

        return redirect()->route('carts.index');
    }
}
