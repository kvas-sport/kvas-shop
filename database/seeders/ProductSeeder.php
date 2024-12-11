<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Джемпер флисовый мужской Outventure",
                'description' => "Мягкая и уютная флиска Outventure — оптимальный вариант для активного отдыха на природе и путешествий.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 1,
            ]);

            $product->images()->create(['image_url' => 'assets/1733942733-6759ddcd49f3e.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942733-6759ddcd4a4d5.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942733-6759ddcd4a601.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942733-6759ddcd4a746.jpg']);
        }

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Спортивные брюки  бра Demix ActiveMove GFX",
                'description' => "Брюки для бега от Demix — идеальный вариант для тех, кто не хочет подбирать спортивную экипировку, а хочет получить сразу стильную и функциональную форму.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 2,
            ]);

            $product->images()->create(['image_url' => 'assets/1733942777-6759ddf99fd1f.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942777-6759ddf9a0137.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942777-6759ddf9a02c3.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942777-6759ddf9a03bb.jpg']);
        }

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Костюм спортивный для мальчиков PUMA Poly",
                'description' => "Удобный и практичный костюм от PUMA поможет создать образ в спортивном стиле.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 3,
            ]);

            $product->images()->create(['image_url' => 'assets/1733942865-6759de51908eb.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942865-6759de5190ea5.jpg']);
            $product->images()->create(['image_url' => 'assets/1733942865-6759de5190ff2.jpg']);
        }

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Ботинки мужские adidas Terrex Eastrail 2 Mid R.RDY",
                'description' => "Ботинки Terrex Eastrail 2 Mid R.RDY — оптимальный выбор для легких дневных походов и повседневных приключений.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 6,
            ]);

            $product->images()->create(['image_url' => 'assets/1733943131-6759df5b14c28.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943131-6759df5b1521c.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943131-6759df5b152e9.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943131-6759df5b153ab.jpg']);
        }

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Гантель Demix, 2 кг",
                'description' => "Гантель эргономичной формы со скругленными краями. Предназначена для безопасного использования и хранения в домашних условиях. Нескользящее неопреновое покрытие обеспечивает надежный хват гантелей во время занятий и амортизацию при соприкосновении с полом.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 4,
            ]);

            $product->images()->create(['image_url' => 'assets/1733943257-6759dfd94e11e.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943257-6759dfd94e5fb.jpg']);
        }

        for ($i = 0; $i < $faker->numberBetween(3, 20); $i++) {
            $product = Product::create([
                'name' => "Протеин Optimum System, 900 гр",
                'description' => "Optimum System 100% Whey protein — универсальный источник дополнительного белка в виде порошка для приготовления коктейля. Идеальный вариант для тех, кто следит за своим питанием и ведет активный образ жизни! Сывороточный белок в составе протеинового коктейля — это полноценный белок, который быстро усваивается и содержит все нужные аминокислоты для построения новых мышечных тканей. По вкусу он напоминает обычный молочный коктейль, только без сахара и с хорошей порцией белка. В 1 порции коктейля (30 г) содержится: белки (в том числе ВСАА) — 23 (4.9) г, жиры — 1.77 г, углеводы — 1.57 г. Энергетическая ценность 1 порции — 114/477 ккал/кДж. Мерная ложка может находиться на дне упаковки.",
                'amount' => $faker->numberBetween(1, 100),
                'cost' => $faker->numberBetween(300, 15000),
                'category_id' => 5,
            ]);

            $product->images()->create(['image_url' => 'assets/1733943518-6759e0de88c27.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943518-6759e0de8902f.jpg']);
            $product->images()->create(['image_url' => 'assets/1733943518-6759e0de89182.jpg']);
        }
    }
}
