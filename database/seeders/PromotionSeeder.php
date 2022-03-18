<?php

namespace Database\Seeders;

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
        for ($i=0; $i<10; $i++){
            DB::table('promotions')->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'start' => $faker->date,
                'finish' => $faker->date,
            ]);
        }
    }
}
