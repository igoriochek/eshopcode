<?php

namespace App\Http\Controllers;

use App\Models\PaidAccessory;
use App\Models\FreeAccessory;
use App\Events\OrderCreated;
use App\Http\Requests\PayRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Company;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Repositories\CartRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class PayController extends AppBaseController
{
    /** @var CartRepository $cartRepository*/
    private $cartRepository;

    private object $order;
    private object $orderItems;
    private array $companyInfo = [];

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    public function index(PayRequest $request)
    {
        $cartId = $request->session()->get('appPayCartId');
        $amount = $request->session()->get('appPayAmount');

        $amountArray = explode('.', $amount);
        $partialAmount = str_replace(",", "", $amountArray[0]);

        if (isset($amountArray[1]) && strlen($amountArray[1]) === 1) {
            $amountArray[1] = $amountArray[1] . '0';
        }

        $cents = $amountArray[1] ?? '00';
        $fullAmount = $partialAmount . $cents;

        $appUrl = env('APP_URL');
        $payment = [
            'projectid' => env('WEBTOPAY_PROJECTID'),
            'sign_password' => env('WEBTOPAY_SIGN_PASSWORD'),
            'orderid' => time(),
            'amount' => $fullAmount,
            'currency' => 'EUR',
            'country' => 'LT',
            'accepturl' => $appUrl . '/user/pay/accept/' . $cartId,
            'cancelurl' => $appUrl . '/user/pay/cancel/' . $cartId,
            'callbackurl' => $appUrl . '/user/pay/callback/' . $cartId,
        ];

        if (true !== env('WEBTOPAY_PROD')) {
            $payment['test'] = 1;
        }

        try {
            \WebToPay::redirectToPayment($payment);
        } catch (Exception $exception) {
            echo get_class($exception) . ':' . $exception->getMessage();
        }
        exit;
    }

    public function accept(Request $request, $id)
    {
        $this->setOrder($request, $id);

        return view('user_views.pay.accept')
            ->with([
                'order' => $this->order,
                'orderItems' => $this->orderItems,
                'company' => $this->companyInfo
            ]);
    }

    public function cancel(Request $request, $id)
    {
        $this->setOrder($request, $id);

        return view('user_views.pay.cancel');
    }

    public function callback(Request $request, $id)
    {
        return $this->setOrder($request, $id);
    }

    private function setCompany(int $id, array $companyInfo): void
    {
        Company::create([
            'name' => $companyInfo['name'],
            'address' => $companyInfo['address'],
            'code' => $companyInfo['code'],
            'vat_code' => $companyInfo['vatCode'],
            'order_id' => $id
        ]);
    }

    private function setOrder(Request $request, $id)
    {
        $params = [];
        parse_str(base64_decode(strtr($request->get('data'), ['-' => '+', '_' => '/'])), $params);

        if (
            is_array($params) &&
            isset($params['status']) &&
            $params['status'] == 2 &&
            is_numeric($id)
        ) {
            $cart = $this->cartRepository->find($id);

            if ($cart) {
                $cartItems = CartItem::query()
                    ->where([
                        'cart_id' => $cart->id,
                    ])
                    ->get();

                $cart->status_id = Cart::STATUS_OFF;
                $cart->save();

                DiscountCoupon::where([
                    'cart_id' => $cart->id,
                ])->update([
                    'used' => 1
                ]);

                $newOrder = new Order();
                $newOrder->cart_id = $cart->id;
                $newOrder->order_id = $params['orderid'];
                $newOrder->user_id = $cart->user_id;
                $newOrder->admin_id = $this->getAdminId();
                $newOrder->status_id = 2;
                $newOrder->collect_time = $cart->collect_time;
                $newOrder->place = $cart->place;
                $newOrder->isCompanyBuying = $cart->isCompanyBuying;
                $newOrder->phone_number = $cart->phone_number;
                $newOrder->sum = $params['amount'] / 100;

                if ($newOrder->save()) {

                    foreach ($cartItems as $cartItem) {
                        $newOrderItem = new OrderItem();
                        $newOrderItem->order_id = $newOrder->id;
                        $newOrderItem->product_id = $cartItem->product_id;
                        $newOrderItem->product_size_id = $cartItem->product_size_id;
                        $newOrderItem->product_meat_id = $cartItem->product_meat_id;
                        $newOrderItem->product_sauce_id = $cartItem->product_sauce_id;
                        $newOrderItem->paid_accessories = $cartItem->paid_accessories;
                        $newOrderItem->free_accessories = $cartItem->free_accessories;
                        $newOrderItem->price_current = $cartItem->price_current;
                        $newOrderItem->count = $cartItem->count;
                        $newOrderItem->save();
                    }
                    $user = Auth::user();

                    if ($user) {
                        $user->log("Created new Order ID:{$newOrder->id}");
                    }

                    $orderDescription = $this->createDescriptionText($newOrder, $cartItems);
                    $newOrder->description = htmlspecialchars($orderDescription);
                    $newOrder->save();

                    if ($cart->isCompanyBuying) {
                        $companyInfo = $request->session()->get('companyInfo');
                        $this->setCompany($newOrder->id, $companyInfo);
                        $this->companyInfo = $companyInfo;

                        event(new OrderCreated($newOrder, $user, $cartItems, $orderDescription, $companyInfo));

                        // $request->session()->forget('companyInfo');
                    } else {
                        event(new OrderCreated($newOrder, $user, $cartItems, $orderDescription));
                    }

                    $this->order = $newOrder;
                    $this->orderItems = $cartItems;

                    return 'OK';
                }
            }
        }

        return 'Error';
    }

    private function getAdminId()
    {
        $admins = User::query()
            ->select('id')
            ->withCount('adminOrders')
            ->where([
                'type' => User::TYPE_ADMIN
            ])
            ->get()
            ->toArray();

        $admins = array_column($admins, 'id', 'admin_orders_count');
        ksort($admins);

        return array_shift($admins);
    }

    private function createDescriptionText(object $order, object $orderItems): string
    {
        $orderId = __('names.order') . ' ID:' . $order->id;
        $clientName = __('names.name') . ':' . $order->user->name;

        $orderClientPhoneNumber = isset($order->user->phone_number) ? $order->user->phone_number : '';
        $clientPhoneNumber = __('forms.phone_number') . ':' . $orderClientPhoneNumber;

        $collectTime = __('table.collectTime') . ':' . $order->collect_time;

        $orderPlace = $order->place == '1' ? __('names.onTheSpot') : __('names.takeaway');
        $place = __('names.eatLocation') . ':' . $orderPlace;

        $orderCompanyPurchase = $order->isCompanyBuying ? __('names.yes') : __('names.no');
        $companyPurchase = __('names.companyBuy') . ':' . $orderCompanyPurchase;

        $orderItemDescriptions = [];

        foreach ($orderItems as $orderItem) {
            $name = __('names.productName') . ':' . $orderItem->product->name;
            $size = isset($orderItem->itemSize->name) ? __('names.sauce') . ':' . $orderItem->itemSize->name : '';
            $meat = isset($orderItem->meat->name) ? __('names.meat') . ':' . $orderItem->meat->name : '';
            $sauce = isset($orderItem->sauce->name) ? __('names.meat') . ':' . $orderItem->sauce->name : '';

            $paidAccessories = $this->setPaidAccessoriesToOrderItem($orderItem);
            $freeAccessories = $this->setFreeAccessoriesToOrderItem($orderItem);

            count($paidAccessories) > 0 ? $paidAccessories = __('names.paidAccessories') . ':' . implode(",", $paidAccessories) : $paidAccessories = '';
            count($freeAccessories) > 0 ? $freeAccessories = __('names.compositionWithout') . ':' . implode(",", $freeAccessories) : $freeAccessories = '';

            $orderItemDescriptions[] = $name . ' - ' . $size . ' ' . $meat . ' ' . $sauce . ' ' . $paidAccessories . ' ' . $freeAccessories;
        }

        count($orderItemDescriptions) > 0 ? $orderItemDescriptions = implode(", ", $orderItemDescriptions) : $orderItemDescriptions = '';

        return $orderId . ' ' . $clientName . ' ' . $clientPhoneNumber . ' ' . $collectTime . ' ' . $place . ' ' . $companyPurchase . ' ' . $orderItemDescriptions;
    }

    private function setPaidAccessoriesToOrderItem(object $orderItem): array
    {
        $paidAccessories = [];

        if ($orderItem->paid_accessories) {
            $paidAccessoryIds = explode(',', $orderItem->paid_accessories);

            foreach ($paidAccessoryIds as $paidAccessoryId) {
                $paidAccessories[] = PaidAccessory::find($paidAccessoryId)->name;
            }
        }

        return $paidAccessories;
    }

    private function setFreeAccessoriesToOrderItem(object $orderItem): array
    {
        $freeAccessories = [];

        if ($orderItem->free_accessories) {
            $freeAccessoryIds = explode(',', $orderItem->free_accessories);

            foreach ($freeAccessoryIds as $freeAccessoryId) {
                $freeAccessories[] = FreeAccessory::find($freeAccessoryId)->name;
            }
        }

        return $freeAccessories;
    }
}
