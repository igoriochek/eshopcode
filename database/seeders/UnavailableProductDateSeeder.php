<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class UnavailableProductDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('unavailable_product_dates')->insert([
                'product_id' => 1,
                'unavailable_date' => now()->addDays(rand(7, 7 * 8))->format('Y-m-d'),
                'created_at' => now()
            ]);
        }
    }
}
