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
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id'
        ]);

        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'cost' => $data['cost'],
            'image_url' => $data['image_url'],
        ]);

        $product->categories()->attach($data['category_id']);

        return redirect()->route('products.index');
    }

    public function update(): RedirectResponse
    {
        $data = request()->validate([

        ]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
