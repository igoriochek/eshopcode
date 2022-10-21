<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $cdata = [
                'en' => [
                    'name' => "promotion $faker->name",
                    'description' => "promotion $faker->text",
                ],
                'lt' => [
                    'name' => "akcija $faker->name",
                    'description' => "akcija $faker->text",
                ],
                'ru' => [
                    'name' => "скидка $faker->name",
                    'description' => "скидка $faker->text",
                ],
                'start' => $faker->date,
                'finish' => $faker->date,
            ];
            $discount = Promotion::create($cdata);
        }
    }
}
