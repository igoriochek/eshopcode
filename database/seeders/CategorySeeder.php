<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $p = null;
        for ($i=0; $i<10; $i++){
            $p = $i > 5 ? 5 : null;
            DB::table('categories')->insert([
                'name' => "category $faker->name",
                'description' => "category $faker->text",
                'parent_id' => $p,
            ]);
        }
    }
}
