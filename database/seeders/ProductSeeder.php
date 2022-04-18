<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;
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
        for ($i=0; $i<=200; $i++){
            DB::table('products')->insert([
                'name' => "product $faker->name",
                'description' => "product $faker->text",
                'price' => rand(1,1000),
                'promotion_id' => ( $i % 10 ? rand(1,10) : null )
            ]);
        }
    }
}
