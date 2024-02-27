<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function generateDailyOrders(int $quantity): void
    {
        $currentDateTimestamp = now()->timestamp;

        if (!cache()->get('nextDate')) {
            $nextDate = now()->addDay()->format('Y-m-d');
            $nextDateTimestamp = Carbon::parse($nextDate)->timestamp;
            $nextDateCacheLifespan = $nextDateTimestamp - $currentDateTimestamp;

            cache()->remember('nextDate', $nextDateCacheLifespan, fn () => $nextDateTimestamp);

            for ($i = 2; $i < $quantity + 2; $i++) {
                $companyPurchase = $i % 2;
                $generatedOrder = $this->generateOrder($companyPurchase);

                if ($generatedOrder && $generatedOrder->isCompanyBuying) {
                    $this->generateCompany($generatedOrder->id);
                }
                if ($generatedOrder) {
                    $this->generateOrderItem($generatedOrder->id);
                }

                sleep(1);
            }
        }
    }

    private function generateOrder(int|bool $companyPurchase): Order
    {
        $order = new Order();
        $order->cart_id = 46; /* 1 */
        $order->order_id = random_int(1000 * 100, 1000 * 200);
        $order->user_id = 1;
        $order->admin_id = 5; /* 1 */
        $order->status_id = 2;
        $order->collect_time = '20:00:00';
        $order->place = 2;
        $order->isCompanyBuying = $companyPurchase;
        $order->phone_number = '+37061699898';
        $order->sum = 5.40 + 2.50;
        $order->save();

        return $order;
    }

    private function generateCompany(int $orderId): void
    {
        $company = new Company();
        $company->name = 'UDISA, UAB';
        $company->address = 'Savanorių pr. 187-310';
        $company->code = '301532607';
        $company->vat_code = 'LT100003837110';
        $company->order_id = $orderId;
        $company->save();
    }

    private function generateOrderItem(int $orderId): void
    {
        $orderItem = new OrderItem();
        $orderItem->order_id = $orderId;
        $orderItem->product_id = 202; /* 1 */
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
