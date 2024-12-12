<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Product $product): RedirectResponse
    {
        $data = request()->validate([
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if (count($product->images) + count($data['files']) > 4) {
            return back()->withErrors(['images' => 'Изображений не может быть больше 4']);
        }

        foreach ($data['files'] as $image) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $imagePath = 'assets/' . $imageName;

            Image::create([
                'product_id' => $product->id,
                'image_url' => $imagePath,
            ]);
        }

        return redirect()->back();
    }

    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();

        return redirect()->back();
    }
}
