<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
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

            $dailyOrdersArray[$key]['id'] = $order->order_id;
            $dailyOrdersArray[$key]['collect_time'] = $order->collect_time;
            $dailyOrdersArray[$key]['place'] = $order->place === Order::ONTHESPOT ? __('names.onTheSpot') : __('names.takeaway');
            $dailyOrdersArray[$key]['is_company_buying'] = $order->isCompanyBuying;
            $dailyOrdersArray[$key]['company_info'] = $order->isCompanyBuying
                ? [
                    'name' => $orderCompanyInfo->name,
                    'address' => $orderCompanyInfo->address,
                    'code' => $orderCompanyInfo->code,
                    'vat_code' => $orderCompanyInfo->vat_code
                ]
                : [];
            $dailyOrdersArray[$key]['client_name'] = $order->user->name;
            $dailyOrdersArray[$key]['client_name'] = $order->user->name;
            $dailyOrdersArray[$key]['phone_number'] = $order->phone_number ?? $order->user->phone_number;
            $dailyOrdersArray[$key]['items'] = $this->buildDailyOrdersItemsArray($dailyOrdersItems[$order->id]);
            $dailyOrdersArray[$key]['total_price'] = $order->sum;
            $dailyOrdersArray[$key]['created_at'] = $order->created_at->format('Y-m-d H:i:s');
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
}
