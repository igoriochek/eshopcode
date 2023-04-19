<?php

namespace Database\Seeders;

use App\Models\PaidAccessory;
use App\Models\ProductMeat;
use Illuminate\Database\Seeder;

class PaidAccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paidAccessoryTypes = [
            'en' => ['French fries', 'Fried onion rings', 'Less sauce', 'More sauce'],
            'lt' => ['Bulvytės', 'Kepti svogūnų žiedai', 'Mažiau padažo', 'Daugiau padažo'],
            'ru' => ['Картофель фри', 'Жареные луковые кольца', 'Меньше соуса', 'Больше соуса']
        ];

        for ($i = 0; $i < 4; $i++) {
            PaidAccessory::create([
                'en' => ['name' => $paidAccessoryTypes['en'][$i]],
                'lt' => ['name' => $paidAccessoryTypes['lt'][$i]],
                'ru' => ['name' => $paidAccessoryTypes['ru'][$i]],
                'price' => rand(1, 5)
            ]);
        }
    }
}
