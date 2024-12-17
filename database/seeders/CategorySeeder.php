<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Мужская спортивная одежда', 'Женская спортивная одежда', 'Детская спортивная одежда', 'Инвентарь', 'Питание', 'Обувь'];
        $image_urls = ['/assets/мужская.jpg', '/assets/женская.jpg', '/assets/детская.jpg', '/assets/инвентарь.jpg', '/assets/питание.jpg', '/assets/обувь.jpg'];

        array_map(function ($name, $image_url) {
            Category::create([
                'name' => $name,
                'image_url' => $image_url
            ]);
        }, $names, $image_urls);
    }
}
