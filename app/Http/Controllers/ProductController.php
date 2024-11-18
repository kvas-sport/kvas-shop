<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'cost' => 'required',
            'image_url' => 'required',
            'category_id' => 'required',
        ]);

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
