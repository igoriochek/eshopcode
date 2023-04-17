<?php

namespace Database\Seeders;

use App\Models\ProductMeat;
use Illuminate\Database\Seeder;

class ProductMeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meatTypes = [
            'en' => ['Beef', 'Chicken'],
            'lt' => ['Jautiena', 'Vištiena'],
            'ru' => ['Говядина', 'Курятина']
        ];

        for ($i = 0; $i < 2; $i++) {
            ProductMeat::create([
                'en' => ['name' => $meatTypes['en'][$i]],
                'lt' => ['name' => $meatTypes['lt'][$i]],
                'ru' => ['name' => $meatTypes['ru'][$i]],
            ]);
        }
    }
}
