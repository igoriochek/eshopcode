<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Repositories\CartRepository;
use Exception;
use Flash;
use Illuminate\Http\Request;
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
        $orderId = $request->session()->get('appPayOrderId');
        $amount = $request->session()->get('appPayAmount');

        if (!preg_match("/\./", $amount)) {
            $amount = $amount * 100;
        }
        $amount = preg_replace("/\D/", "", $amount);

        $appUrl = env('APP_URL');
        $payment = [
            'projectid' => env('WEBTOPAY_PROJECTID'),
            'sign_password' => env('WEBTOPAY_SIGN_PASSWORD'),
            'orderid' => $orderId,
            'amount' => $amount,
            'currency' => 'EUR',
            'country' => 'LT',
            'accepturl' => $appUrl. '/user/pay/accept',
            'cancelurl' => $appUrl. '/user/pay/cancel',
            'callbackurl' => $appUrl. '/user/pay/callback',
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

    public function accept(Request $request)
    {
        $this->setOrder($request);
        return view('user_views.pay.accept');
    }

    public function cancel(Request $request)
    {
        $this->setOrder($request);
        return view('user_views.pay.cancel');
    }

    public function callback(Request $request)
    {
        return $this->setOrder($request);
    }

    private function setOrder(Request $request)
    {
        $params = [];
        parse_str(base64_decode(strtr($request->get('data'), ['-' => '+', '_' => '/'])), $params);

        if (is_array($params) &&
            isset($params['status']) &&
            $params['status'] == 1
        ) {
            $cart = $this->cartRepository->find($params['orderid']);

            if ($cart) {
                $cartItems = CartItem::query()
                    ->where([
                        'cart_id' => $params['orderid'],
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
                $newOrder->user_id = $cart->user_id;
                $newOrder->admin_id = $this->getAdminId();
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
}
