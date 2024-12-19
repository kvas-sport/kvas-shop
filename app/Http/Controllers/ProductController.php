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
        $hasMore = $products->hasMorePages();

        return view('products.index', compact('products', 'title', 'hasMore'));
    }

    public function search(): View
    {
        $search = mb_strtolower(request()->query('search'));

        $query = Product::query();

        $title = 'Подборка';
        $query->where(function ($query) use ($search) {
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                });
        });

        $products = $query->paginate(12);
        $hasMore = $products->hasMorePages();

        return view('products.index', compact('products', 'title', 'hasMore'));
    }

    public function loadMore(Request $request): JsonResponse
    {
        $page = $request->input('page', 2);

        $queryParams = $request->query();
        unset($queryParams['page']);

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
        $product = Product::with('images', 'characteristics')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:20|max:4096',
            'cost' => 'required|integer|min:1',
            'images' => 'array|max:4', // Ограничение на 4 изображения
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'nullable', // Массив размеров необязателен
            'sizes.*' => 'min:1', // Все размеры должны быть положительными числами
        ]);
       dd(request()->all());
    
        try {
            DB::transaction(function () use ($data) {
                // Создаем продукт
                $product = Product::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'amount' => '1',
                    'cost' => $data['cost'],
                    'category_id' => $data['category_id'],
                ]);
    
                // Обрабатываем изображения
                if (!empty($data['images'])) {
                    foreach ($data['images'] as $image) {
                        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('assets'), $imageName);
                        $imagePath = 'assets/' . $imageName;
    
                        $product->images()->create(['image_url' => $imagePath]);
                    }
                }
    
                // Обрабатываем размеры
                if (!empty($data['sizes'])) {
                    foreach ($data['sizes'] as $size => $quantity) {
                        $product->characteristics()->create([
                            'name' => $size,
                            'amount' => $quantity,
                        ]);
                    }
                }
            });
    
            return redirect()->back()->with(['message' => 'Успешно добавлено']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Произошла ошибка при сохранении продукта.']);
        }
    }
    


    public function update(Product $product): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:20|max:4096',
            'amount' => 'required|integer|min:1',
            'cost' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'cost' => $data['cost'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->back();
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->back();
    }

    public function productCreate(): View
    {
        $products = Product::all();
        $categories = Category::all();

        return view('users.products.create', compact('products', 'categories'));
    }

    public function productEditList(): View
    {
        $products = Product::paginate(10);

        return view('users.products.editList', compact('products'));
    }

    public function edit(Product $product): View
    {
        $product = $product->load('images', 'characteristics');
        $categories = Category::all();

        return view('users.products.edit', compact('product', 'categories'));
    }
}
