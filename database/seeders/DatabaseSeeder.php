<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            DiscountSeeder::class,
            DiscountCouponSeeder::class,
            PromotionSeeder::class,
            ProductSeeder::class,
            ProductCategorySeeder::class,
        ]);
    }
}
