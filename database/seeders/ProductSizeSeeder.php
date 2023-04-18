<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizeTypes = [
            'en' => ['Small', 'Large'],
            'lt' => ['Mažas', 'Didelis'],
            'ru' => ['Маленький', 'Большой']
        ];

        for ($i = 0; $i < 2; $i++) {
            ProductSize::create([
                'en' => ['name' => $sizeTypes['en'][$i]],
                'lt' => ['name' => $sizeTypes['lt'][$i]],
                'ru' => ['name' => $sizeTypes['ru'][$i]]
            ]);
        }

        $randomProductSize = ProductSize::find(2);
        $randomProductSize->default = true;
        $randomProductSize->save();
    }
}
