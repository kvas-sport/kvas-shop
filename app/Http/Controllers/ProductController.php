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

    public function show(Product $product): View
    {
        $populars = Product::all();

        return view('products.show', compact('product'), compact('populars'));
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
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'cost' => 'required',
            'image_url' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::update([
            'name' => $data['name'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'cost' => $data['cost'],
            'image_url' => $data['image_url'],
        ]);

        $product->categories()->sync($data['category_id']);

        return redirect()->back();
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }

}
