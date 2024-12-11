<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    public function category(Request $request): View
    {
        $queryParams = $request->query();

        $products = Product::query();

        $title = 'Подборка';
        if (isset($queryParams['category_id']) && $queryParams['category_id'] > 0 && !is_array($queryParams['category_id'])) {
            $title = Category::findOrFail((int)$queryParams['category_id'])->name;
        }

        foreach ($queryParams as $key => $value) {
            if (is_array($value)) {
                $products = $products->whereIn($key, $value);
            } else {
                $products = $products->where($key, '=', $value);
            }
        }

        $products = $products->paginate(12);

        return view('products.list', compact('products', 'title'));
    }

    public function loadMore(Request $request): JsonResponse
    {
        $page = $request->input('page', 2);
        $queryParams = $request->query();

        $products = Product::query();

        foreach ($queryParams as $key => $value) {
            if (is_array($value)) {
                $products = $products->whereIn($key, $value);
            } else {
                $products = $products->where($key, '=', $value);
            }
        }

        $products = $products->paginate(12, ['*'], 'page', $page);

        $html = view('partials.product_cards', ['products' => $products])->render();

        return response()->json(['html' => $html, 'hasMore' => $products->hasMorePages()]);
    }


    public function show(Category $category, int $id): View
    {
        $product = Product::with('images')->findOrFail($id);

        $populars = Product::where('category_id', $category->id)->with('images')->get();

        return view('products.show', compact('product'), compact('populars'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:20|max:4096',
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

    public function search(): View
    {
        $search = mb_strtolower(request()->query('search'));

        $query = Product::query();

        $query->where(function ($query) use ($search) {
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                });
        });

        $products = $query->paginate(12);
        $title = 'Подборка';

        return view('products.list', compact('products', 'title'));
    }

    public function productCreate(): View
    {
        $products = Product::all();
        $categories = Category::all();

        return view('users.products.create', compact('products', 'categories'));
    }

    public function productEditList(): View
    {
        $products = Product::all();

        return view('users.products.editList', compact('products'));
    }

    public function edit(Product $product): View
    {
        $product = $product->load('images');
        $categories = Category::all();

        return view('users.products.edit', compact('product', 'categories'));
    }
}
