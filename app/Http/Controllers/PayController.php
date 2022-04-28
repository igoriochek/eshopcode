<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    public function index(PayRequest $request)
    {
        $validated = $request->validated();
        $userId = Auth::id();
        $cart = $this->cartRepository->getOrSetCart($request);

        $amount = CartItem::query()
            ->where([
                'cart_id' => $cart->id,
            ])
            ->sum('price_current');

        if (isset($validated['discount']) &&
            is_array($validated['discount'])
        ) {
            $discounts = DiscountCoupon::query()
                ->where([
                    'used' => 0,
                    'user_id' => $userId,
                ])
                ->whereIn('id', $validated['discount'])
                ->get();

            if ($discounts) {
                foreach ($discounts as $discount) {
                    $newAmount = $amount - $discount->value;
                    if ($newAmount > 0) {
                        $amount = $newAmount;

                        $discounts->used = 1;
                        $discount->save();
                    }
                }
            }
        }

        try {
            \WebToPay::redirectToPayment([
                'projectid' => env('WEBTOPAY_PROJECTID'),
                'sign_password' => env('WEBTOPAY_SIGN_PASSWORD'),
                'orderid' => $cart->id,
                'amount' => $amount,
                'currency' => 'EUR',
                'country' => 'LT',
                'accepturl' => env('APP_URL'). '/user/pay/accept',
                'cancelurl' => env('APP_URL'). '/user/pay/cancel',
                'callbackurl' => env('APP_URL'). '/user/pay/callback',
                'test' => 1,
            ]);
        } catch (Exception $exception) {
            echo get_class($exception) . ':' . $exception->getMessage();
        }
    }

    public function accept()
    {
        return view('user_views.pay.accept');
    }

    public function cancel()
    {
        return view('user_views.pay.cancel');
    }

    public function callback(Request $request)
    {
        $params = [];
        parse_str(base64_decode(strtr($request->get('data'), ['-' => '+', '_' => '/'])), $params);

        $cart = $this->cartRepository->getOrSetCart($request);

        if (is_array($params) &&
            isset($params['status']) &&
            $params['status'] == 1 &&
            $params['orderid'] == $cart->id
        ) {
            $cartItems = CartItem::query()
                ->where([
                    'cart_id' => $cart->id,
                ])
                ->get();

            if (!$cartItems->isEmpty()) {
                $cart->status_id = Cart::STATUS_OFF;
                $cart->save();

                $newOrder = new Order();
                $newOrder->user_id = $cart->user_id;
                $newOrder->status_id = 2;

                if ($newOrder->save()) {

                    foreach ($cartItems as $cartItem) {
                        $newOrderItem = new OrderItem();
                        $newOrderItem->order_id = $newOrder->id;
                        $newOrderItem->product_id = $cartItem->product_id;
                        $newOrderItem->price_current = $cartItem->price_current;
                        $newOrderItem->count = $cartItem->count;
                        $newOrderItem->save();
                    }

                    echo 'OK';
                }
            }
        }

        echo 'Error';
    }
}
