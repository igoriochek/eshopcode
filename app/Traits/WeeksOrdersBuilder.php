<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

trait WeeksOrdersBuilder
{
    public function generateWeeksOrders(int $quantity): void
    {
        $currentDateTimestamp = now()->timestamp;

        if (!cache()->get('nextDateForWeeksOrders')) {
            $nextDate = now()->addDay()->format('Y-m-d');
            $nextDateTimestamp = Carbon::parse($nextDate)->timestamp;
            $nextDateCacheLifespan = $nextDateTimestamp - $currentDateTimestamp;

            for ($i = 2; $i < $quantity + 2; $i++) {
                $companyPurchase = $i % 2;
                $generatedOrder = $this->generateWeeksOrder($companyPurchase);

                if ($generatedOrder && $generatedOrder->isCompanyBuying) {
                    $this->generateWeeksCompany($generatedOrder->id);
                }
                if ($generatedOrder) {
                    $this->generateWeeksOrderItem($generatedOrder->id, rand(2, 10));
                }

                $generatedOrder->sum =
                    OrderItem::where('order_id', $generatedOrder->id)->sum('price_current');
                $generatedOrder->save();
            }

            cache()->remember('nextDateForWeeksOrders', $nextDateCacheLifespan, fn () => $nextDateTimestamp);
        }
    }

    private function generateWeeksOrder(int|bool $companyPurchase): Order
    {
        $order = new Order();
        $order->cart_id = config('app.env') != 'production' ? 1 : 46;
        $order->order_id = random_int(1000 * 100, 1000 * 200);
        $order->user_id = 1;
        $order->admin_id = config('app.env') != 'production' ? 1 : 5;
        $order->status_id = 2;
        $order->collect_time = rand(16, 22) . ':00:00';
        $order->place = 2;
        $order->isCompanyBuying = $companyPurchase;
        $order->phone_number = '+370' . rand(00000000, 99999999);
        $order->sum = 0.0;
        $order->created_at = now()->subDays(rand(1, 7));
        $order->save();

        return $order;
    }

    private function generateWeeksCompany(int $orderId): void
    {
        $company = new Company();
        $company->name = 'UDISA, UAB';
        $company->address = 'Savanorių pr. 187-310';
        $company->code = '3015326076';
        $company->vat_code = 'LT100003837110';
        $company->order_id = $orderId;
        $company->save();
    }

    private function generateWeeksOrderItem(int $orderId, int $quantity = 2): void
    {
        for ($i = 0; $i < $quantity; $i++) {
            $productCount = rand(1, 2);
            $orderItem = new OrderItem();

            if(config('app.env') == 'production') {
                if ($i === 0) {
                    $orderItem->order_id = $orderId;
                    $orderItem->product_id = 202;
                    $orderItem->product_size_id = 2;
                    $orderItem->product_meat_id = 1;
                    $orderItem->product_sauce_id = 1;
                    $orderItem->paid_accessories = null;
                    $orderItem->free_accessories = null;
                    $orderItem->price_current = 5.40 * $productCount;
                    $orderItem->count = $productCount;
                    $orderItem->save();
                    continue;
                }
                
                if ($i === 1) {
                    $randomPaidAccessory = rand(1, 2);
                    $paidAccesoryPrice = $randomPaidAccessory === 1 ? 2.50 : 3.00;

                    $orderItem->order_id = $orderId;
                    $orderItem->product_id = 217;
                    $orderItem->product_size_id = null;
                    $orderItem->product_meat_id = null;
                    $orderItem->product_sauce_id = null;
                    $orderItem->paid_accessories = strval($randomPaidAccessory);
                    $orderItem->free_accessories = '287,297';
                    $orderItem->price_current = 6.50 * $productCount + $paidAccesoryPrice;
                    $orderItem->count = $productCount;
                    $orderItem->save();
                    continue;
                }

            }

            $randomProduct = Product::whereNotIn('id', [config('app.env') != 'production' ? 1 : 202])
                ->inRandomOrder()
                ->first();

            $orderItem->order_id = $orderId;
            $orderItem->product_id = $randomProduct->id;
            $orderItem->product_size_id = $randomProduct->hasSizes ? 1 : null;
            $orderItem->product_meat_id = $randomProduct->hasMeats ? 1 : null;
            $orderItem->product_sauce_id = $randomProduct->hasSauces ? 1 : null;
            $orderItem->paid_accessories = null;
            $orderItem->free_accessories = null;
            $orderItem->price_current = $productCount * $randomProduct->price;
            $orderItem->count = $productCount;
            $orderItem->save();
            continue;
        }
    }
}
