<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }

    public function productCreate(): View
    {
        $products = Product::all();

        return view('users.products.create', compact('products'));
    }

    public function productEdit(): View
    {
        $products = Product::all();

        return view('users.products.edit', compact('products'));
    }
}
