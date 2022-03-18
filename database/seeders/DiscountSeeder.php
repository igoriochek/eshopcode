<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;
class DiscountSeeder extends Seeder
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
            DB::table('discounts')->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'proc' => rand(1,99),
            ]);
        }
    }
}
