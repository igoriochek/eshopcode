<?php

namespace Database\Seeders;

use App\Models\ProductSauce;
use Illuminate\Database\Seeder;

class ProductSauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sauceTypes = [
            'en' => ['Garlic', 'Spicy', 'Chipotle', 'Mixed', 'Vegetarian'],
            'lt' => ['Česnakinis', 'Aštrus', 'Čipotle', 'Mišrus', 'Veganiškas'],
            'ru' => ['Чесночный', 'Острый', 'Чипотле', 'Смешанный', 'Вегетарианский']
        ];

        for ($i = 0; $i < 5; $i++) {
            ProductSauce::create([
                'en' => ['name' => $sauceTypes['en'][$i]],
                'lt' => ['name' => $sauceTypes['lt'][$i]],
                'ru' => ['name' => $sauceTypes['ru'][$i]],
                'color' => '#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT)
            ]);
        }

        $randomProductSauce = ProductSauce::find(1);
        $randomProductSauce->default = true;
        $randomProductSauce->save();
    }
}
