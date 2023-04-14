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
        $hasSizes = [false, true];

        for ($i = 0; $i <= 100; $i++) {
            $randomHasSizes = $hasSizes[rand(0, 1)];
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
                'small' => $randomHasSizes ? rand(1, 10) : null,
                'big' => $randomHasSizes ? rand(10, 20) : null,
                'hasSizes' => $randomHasSizes,
                'promotion_id' => ($i % 10 ? rand(1, 10) : null)
            ];
            Product::create($productData);

//            DB::table('products')->insert([
////                'name' => "product $faker->name",
////                'description' => "product $faker->text",
//                'price' => rand(1,1000),
//                'promotion_id' => ( $i % 10 ? rand(1,10) : null )
//            ]);
        }
    }
}
