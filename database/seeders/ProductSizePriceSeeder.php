<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizePrice;
use Illuminate\Database\Seeder;

class ProductSizePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $productSizes = ProductSize::all();

        foreach ($products as $product) {
            if ($product->hasSizes) {
                foreach ($productSizes as $productSize) {
                    ProductSizePrice::create([
                        'product_id' => $product->id,
                        'product_size_id' => $productSize->id,
                        'price' => $productSize->id == 1 ? rand(1, 10) : rand(10, 20)
                    ]);
                }
            }
        }
    }
}
