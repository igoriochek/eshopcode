<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

trait DailyOrdersBuilder
{
    public function getDailyOrdersCompanyInfos(Collection $dailyOrders): array
    {
        $dailyOrdersCompanyInfos = [];

        foreach ($dailyOrders as $order) {
            $orderCompanyInfo = Company::where('order_id', $order->id)->first();
            $dailyOrdersCompanyInfos[$order->id] = $orderCompanyInfo;
        }

        return $dailyOrdersCompanyInfos;
    }

    public function getDailyOrdersItems(Collection $dailyOrders): array
    {
        $dailyOrdersItems = [];

        foreach ($dailyOrders as $order) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            $dailyOrdersItems[$order->id] = $orderItems;
        }

        return $dailyOrdersItems;
    }

    public function buildDailyOrdersArray(
        Collection $dailyOrders,
        array $dailyOrdersCompanyInfos,
        array $dailyOrdersItems
    ): array {
        $dailyOrdersArray = [];

        foreach ($dailyOrders as $key => $order) {
            $orderCompanyInfo = $dailyOrdersCompanyInfos[$order->id];

            $collectDateTime = DateTime::createFromFormat(
                'Y-m-d H:i:s',
                now()->format('Y-m-d') . $order->collect_time
            )->getTimestamp();

            $dailyOrdersArray[$key]['id'] = $order->order_id;
            $dailyOrdersArray[$key]['collect_time'] = $collectDateTime;
            $dailyOrdersArray[$key]['place'] = $order->place === Order::ONTHESPOT ? __('names.onTheSpot') : __('names.takeaway');
            $dailyOrdersArray[$key]['is_company_buying'] = $order->isCompanyBuying;
            $dailyOrdersArray[$key]['company_info'] = $order->isCompanyBuying
                ? [
                    'name' => $orderCompanyInfo->name,
                    'address' => $orderCompanyInfo->address,
                    'code' => $orderCompanyInfo->code,
                    'vat_code' => $orderCompanyInfo->vat_code
                ]
                : null;
            $dailyOrdersArray[$key]['client_name'] = $order->user->name;
            $dailyOrdersArray[$key]['client_name'] = $order->user->name;
            $dailyOrdersArray[$key]['phone_number'] = $order->phone_number ?? $order->user->phone_number;
            $dailyOrdersArray[$key]['items'] = $this->buildDailyOrdersItemsArray($dailyOrdersItems[$order->id]);
            $dailyOrdersArray[$key]['total_price'] = $order->sum;
            $dailyOrdersArray[$key]['created_at'] = $order->created_at->timestamp;
        }

        return $dailyOrdersArray;
    }

    public function buildDailyOrdersItemsArray(Collection $dailyOrdersItems): array
    {
        $dailyOrdersItemsArray = [];

        foreach ($dailyOrdersItems as $key => $orderItem) {
            $dailyOrdersItemsArray[$key]['name'] = $orderItem->product->name;
            $dailyOrdersItemsArray[$key]['size'] = $orderItem->itemSize->name ?? null;
            $dailyOrdersItemsArray[$key]['meat'] = $orderItem->meat->name ?? null;
            $dailyOrdersItemsArray[$key]['sauce'] = $orderItem->sauce->name ?? null;
            $dailyOrdersItemsArray[$key]['paid_accessories'] = $orderItem->paid_accessories
                ? $this->buildAccessoriesArray($orderItem->paid_accessories, 'PaidAccessory')
                : [];
            $dailyOrdersItemsArray[$key]['removed_accessories'] = $orderItem->free_accessories
                ? $this->buildAccessoriesArray($orderItem->free_accessories, 'FreeAccessory')
                : [];
            $dailyOrdersItemsArray[$key]['price'] = $orderItem->price_current;
            $dailyOrdersItemsArray[$key]['quantity'] = $orderItem->count;
        }

        return $dailyOrdersItemsArray;
    }

    public function buildAccessoriesArray(string $orderItemAccessories, string $accessoryType): array
    {
        $accesoriesArray = [];
        $orderItemAccessories = explode(',', $orderItemAccessories);
        $accessoryModel = "\\App\Models\\" . $accessoryType;

        foreach ($orderItemAccessories as $accessory) {
            if (class_exists($accessoryModel)) {
                $accessory = $accessoryModel::where('id', $accessory)->first()->name;
                $accesoriesArray[] = $accessory;
            }
        }

        return $accesoriesArray;
    }

    public function generateDailyOrders(int $quantity = 1): void
    {
        $currentDateTimestamp = now()->timestamp;

        if (!cache()->get('nextDateForDailyOrders')) {
            $nextDate = now()->addDay()->format('Y-m-d');
            $nextDateTimestamp = Carbon::parse($nextDate)->timestamp;
            $nextDateCacheLifespan = $nextDateTimestamp - $currentDateTimestamp;

            for ($i = 2; $i < $quantity + 2; $i++) {
                $companyPurchase = $i % 2;
                $generatedOrder = $this->generateOrder($companyPurchase);

                if ($generatedOrder && $generatedOrder->isCompanyBuying) {
                    $this->generateCompany($generatedOrder->id);
                }
                if ($generatedOrder) {
                    $this->generateOrderItems($generatedOrder->id, rand(2, 10));
                }

                $generatedOrder->sum =
                    OrderItem::where('order_id', $generatedOrder->id)->sum('price_current');
                $generatedOrder->save();
            }

            cache()->remember('nextDateForDailyOrders', $nextDateCacheLifespan, fn () => $nextDateTimestamp);
        }
    }

    private function generateOrder(int|bool $companyPurchase): Order
    {
        $currentDate = now();

        $order = new Order();
        $order->cart_id = config('app.env') != 'production' ? 1 : 46;
        $order->order_id = random_int(1000 * 100, 1000 * 200);
        $order->user_id = 1;
        $order->admin_id = config('app.env') != 'production' ? 1 : 5;
        $order->status_id = 2;
        $order->collect_time = rand(16, 22) . ':00:00';
        $order->place = $companyPurchase ? 2 : 1;
        $order->isCompanyBuying = $companyPurchase;
        $order->phone_number = '+370' . rand(00000000, 99999999);
        $order->sum = 0.0;
        $order->created_at = $currentDate->addSeconds(rand(1, 60 * 60));
        $order->save();

        return $order;
    }

    private function generateCompany(int $orderId): void
    {
        $company = new Company();
        $company->name = 'UDISA, UAB';
        $company->address = 'Savanorių pr. 18-64';
        $company->code = '3015326078';
        $company->vat_code = 'LT100003837110';
        $company->order_id = $orderId;
        $company->save();
    }

    private function generateOrderItems(int $orderId, int $quantity = 2): void
    {
        for ($i = 0; $i < $quantity; $i++) {
            $productCount = rand(1, 2);
            $orderItem = new OrderItem();

            if (config('app.env') == 'production') {
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
                    $orderItem->free_accessories = '278,279';
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
