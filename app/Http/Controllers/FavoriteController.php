<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function index(): View
    {
        $favorites = Favorite::with('product')->get();

        return view('favorites.index', compact('favorites'));
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        Favorite::create($data);

        return redirect()->back();
    }

    public function destroy(Favorite $favorite): RedirectResponse
    {
        $favorite->delete();

        return redirect()->route('favorites.index');
    }
}
