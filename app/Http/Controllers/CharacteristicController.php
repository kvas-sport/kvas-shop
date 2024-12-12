<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CharacteristicController extends Controller
{
    public function store(Product $product): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required|max:20',
            'amount' => 'required|integer|min:1',
        ]);

        $data['product_id'] = $product->id;

        Characteristic::create($data);

        return redirect()->back();
    }

    public function update(Product $product): RedirectResponse
    {
        $allCharacteristics = Characteristic::where('product_id', $product->id)->pluck('id')->toArray();
        $checkedCharacteristics = request()->input('characteristics', []);

        $characteristicsToDelete = array_diff($allCharacteristics, $checkedCharacteristics);

        Characteristic::whereIn('id', $characteristicsToDelete)->delete();

        return redirect()->back()->with('success', 'Характеристики успешно обновлены!');
    }
}
