<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $boolean = [false, true];

        for ($i = 0; $i <= 100; $i++) {
            $randomHasSizes = $boolean[rand(0, 1)];
            $randomHasMeats = $boolean[rand(0, 1)];
            $randomHasSauces = $boolean[rand(0, 1)];
            $randomHasPaidAccessories = $boolean[rand(0, 1)];
            $randomHasFreeAccessories = $boolean[rand(0, 1)];

            $productData = [
                'en' => [
                    'name' => "product $faker->name",
                    'description' => "product $faker->text",
                ],
                'lt' => [
                    'name' => "produktas $faker->name",
                    'description' => "produktas $faker->text",
                ],
                'ru' => [
                    'name' => "продукт $faker->name",
                    'description' => "продукт $faker->text",
                ],
                'price' => $randomHasSizes ? null : rand(1, 20),
                'hasSizes' => $randomHasSizes,
                'hasMeats' => $randomHasMeats,
                'hasSauces' => $randomHasSauces,
                'hasPaidAccessories' => $randomHasPaidAccessories,
                'hasFreeAccessories' => $randomHasFreeAccessories,
                'promotion_id' => ($i % 10 ? rand(1, 10) : null)
            ];

            Product::create($productData);
        }
    }
}
