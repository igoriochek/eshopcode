<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

trait WeeksOrdersBuilder
{
    public function generateWeeksOrders(int $quantity): void
    {
        $currentDateTimestamp = now()->timestamp;

        if (!cache()->get('nextDate')) {
            $nextDate = now()->addDay()->format('Y-m-d');
            $nextDateTimestamp = Carbon::parse($nextDate)->timestamp;
            $nextDateCacheLifespan = $nextDateTimestamp - $currentDateTimestamp;

            cache()->remember('nextDate', $nextDateCacheLifespan, fn () => $nextDateTimestamp);

            for ($i = 2; $i < $quantity + 2; $i++) {
                $companyPurchase = $i % 2;
                $generatedOrder = $this->generateWeeksOrder($companyPurchase);

                if ($generatedOrder && $generatedOrder->isCompanyBuying) {
                    $this->generateWeeksCompany($generatedOrder->id);
                }
                if ($generatedOrder) {
                    $this->generateWeeksOrderItem($generatedOrder->id);
                }

                sleep(1);
            }
        }
    }

    private function generateWeeksOrder(int|bool $companyPurchase): Order
    {
        $order = new Order();
        $order->cart_id = 1;
        $order->order_id = random_int(1000 * 100, 1000 * 200);
        $order->user_id = 1;
        $order->admin_id = 1;
        $order->status_id = 2;
        $order->collect_time = '20:00:00';
        $order->place = 2;
        $order->isCompanyBuying = $companyPurchase;
        $order->phone_number = '+37061699898';
        $order->sum = rand(0, 200);
        $order->created_at = now()->subDays(rand(0, 7));
        $order->save();
        
        return $order;
    }

    private function generateWeeksCompany(int $orderId): void
    {
        $company = new Company();
        $company->name = 'UDISA, UAB';
        $company->address = 'Savanorių pr. 187-310';
        $company->code = '301532607';
        $company->vat_code = 'LT100003837110';
        $company->order_id = $orderId;
        $company->save();
    }

    private function generateWeeksOrderItem(int $orderId): void
    {
        $orderItem = new OrderItem();
        $orderItem->order_id = $orderId;
        $orderItem->product_id = 1; /* 202 */
        $orderItem->product_size_id = 2;
        $orderItem->product_meat_id = 1;
        $orderItem->product_sauce_id = 1;
        $orderItem->paid_accessories = null;
        $orderItem->free_accessories = null;
        $orderItem->price_current = 5.40 + 2.50;
        $orderItem->count = rand(1, 2);
        $orderItem->save();
    }
}
