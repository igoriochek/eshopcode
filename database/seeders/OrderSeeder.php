<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\CartRepository;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=30; $i++){
            $this->createOrder($i,$i, 3);
        }
    }

    public function createOrder( $cartID, $orderID, $adminID ){

        $cartRepository = new CartRepository(app());
        $cart = $cartRepository->find($cartID);

        if ($cart) {
            $cartItems = CartItem::query()
                ->where([
                    'cart_id' => $cart->id,
                ])
                ->get();

            $cart->status_id = Cart::STATUS_OFF;
            $cart->save();

//            DiscountCoupon::where([
//                'cart_id' => $cart->id,
//            ])->update([
//                'used' => 1
//            ]);

            $faker = Faker::create();

            $newOrder = new Order();
            $newOrder->cart_id = $cart->id;
            $newOrder->order_id = $orderID;
            $newOrder->user_id = $cart->user_id;
            $newOrder->admin_id = 1;
            $newOrder->status_id = rand(1,7);
            $newOrder->collect_time = rand(7, 24).':00';
            $newOrder->sum = $cart->sum;
            $newOrder->created_at = Carbon::today()->subDays(rand(0, 365));

            if ($newOrder->save()) {

                foreach ($cartItems as $cartItem) {
                    $newOrderItem = new OrderItem();
                    $newOrderItem->order_id = $newOrder->id;
                    $newOrderItem->product_id = $cartItem->product_id;
                    $newOrderItem->product_size_id = $cartItem->product_size_id;
                    $newOrderItem->product_meat_id = $cartItem->product_meat_id;
                    $newOrderItem->product_sauce_id = $cartItem->product_sauce_id;
                    $newOrderItem->price_current = $cartItem->price_current;
                    $newOrderItem->count = $cartItem->count;
                    $newOrderItem->save();
                }
            }
        }
    }

}
