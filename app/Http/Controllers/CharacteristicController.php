<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CharacteristicController extends Controller
{
    public function store(Product $product): RedirectResponse
    {
        dd(request()->all());
    }
}
