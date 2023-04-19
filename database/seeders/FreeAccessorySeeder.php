<?php

namespace Database\Seeders;

use App\Models\FreeAccessory;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FreeAccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $products = Product::where('hasFreeAccessories', true)->get();

        foreach ($products as $product) {
            for ($j = 0; $j < rand(3, 10); $j++) {
                FreeAccessory::create([
                    'en' => ['name' => 'en'.$faker->text(rand(10, 30))],
                    'lt' => ['name' => 'lt'.$faker->text(rand(10, 30))],
                    'ru' => ['name' => 'ru'.$faker->text(rand(10, 30))],
                    'product_id' => $product->id
                ]);
            }
        }
    }
}
