<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('images')->get();

        return view('products.index', compact('products'));
    }

    public function show(int $id): View
    {
        $product = Product::with('images')->findOrFail($id);

        $populars = Product::with('images')->get();

        return view('products.show', compact('product'), compact('populars'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:20|max:512',
            'amount' => 'required|integer|min:1',
            'cost' => 'required|integer|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if (count($data['images']) > 4) {
            return back()->withErrors(['images' => 'Изображений не может быть больше 4']);
        }

        DB::transaction(function () use ($data) {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'amount' => $data['amount'],
                'cost' => $data['cost'],
                'category_id' => $data['category_id'],
            ]);

            foreach ($data['images'] as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('assets'), $imageName);

                $imagePath = 'assets/' . $imageName;

                $product->images()->create(['image_url' => $imagePath]);
            }
        }, 3);

        return redirect()->back()->with(['message' => 'Успешно добавлено']);
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

        return redirect()->back();
    }

}
