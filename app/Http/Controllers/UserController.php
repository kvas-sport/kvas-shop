<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('users.profile');
    }

    public function admin(): View
    {
        $products = Product::all();

        return view('users.admin', compact('products'));
    }
}
