<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|min:2|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $data->image;

        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets'), $imageName);
        $imagePath = 'assets/' . $imageName;

        $Category = Category::create([
            'name' => $data['name'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
