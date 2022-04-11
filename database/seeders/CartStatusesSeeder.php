<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CartStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_statuses')->insert([
            'name' => 'Draft',
        ]);
        DB::table('cart_statuses')->insert([
            'name' => 'New',
        ]);
        DB::table('cart_statuses')->insert([
            'name' => 'Waiting',
        ]);
        DB::table('cart_statuses')->insert([
            'name' => 'Shipped',
        ]);
        DB::table('cart_statuses')->insert([
            'name' => 'Canceled',
        ]);
    }
}
