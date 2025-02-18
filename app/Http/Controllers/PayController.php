<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
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
use Illuminate\Support\Facades\Auth;
use Response;
use Log;

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
        $cartId = $request->session()->get('appPayCartId');
        $amount = $request->session()->get('appPayAmount');

        $amountArray = explode('.', $amount);
        $partialAmount = str_replace(",", "", $amountArray[0]);
        if (isset($amountArray[1]) && strlen($amountArray[1]) === 1) {
            $amountArray[1] = $amountArray[1] . '0';
        }
        $cents = $amountArray[1] ?? '00';
        $fullAmount = $partialAmount . $cents;

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $userId = Auth::user()->id;;
        if ($userId === null || !is_numeric($userId)) {
            Log::error('User ID is null or non-numeric before payment redirect:\n'
                . 'user_id:' . $userId);
            return redirect(route('home'));
        }

        $appUrl = env('APP_URL');
        $payment = [
            'projectid' => env('WEBTOPAY_PROJECTID'),
            'sign_password' => env('WEBTOPAY_SIGN_PASSWORD'),
            'orderid' => time(),
            'amount' => $fullAmount,
            'currency' => 'EUR',
            'country' => 'LT',
            'accepturl' => $appUrl . '/pay/accept/' . $userId . '/'. $cartId,
            'cancelurl' => $appUrl . '/pay/cancel/' . $userId . '/'. $cartId,
            'callbackurl' => $appUrl . '/pay/callback/' . $userId . '/'. $cartId,
        ];

        if (true !== env('WEBTOPAY_PROD')) {
            $payment['test'] = 1;
        }

        try {
            Log::info('Redirecting for payment for id:' . $cartId);
            \WebToPay::redirectToPayment($payment);
        } catch (Exception $exception) {
            echo get_class($exception) . ':' . $exception->getMessage();
        }
        exit;
    }

    public function accept(Request $request, $userId, $id)
    {
        Log::info('Received accept callback for cart id:' . $id . 'and user id: ' . $userId);
        $this->setOrder($request, $userId, $id);
        if (Auth::check()) {
            return view('user_views.pay.accept');
        } else {
            return redirect()->route('login');
        }
    }

    public function cancel(Request $request, $userId, $id)
    {
        Log::info('Received cancel callback for cart id:' . $id . 'and user id: ' . $userId);
        $this->setOrder($request, $userId, $id);
        if (Auth::check()) {
            return view('user_views.pay.cancel');
        } else {
            return redirect()->route('login');
        }
    }

    public function callback(Request $request, $userId, $id)
    {
        Log::info('Received callback for cart id:' . $id . 'and user id: ' . $userId);
        return $this->setOrder($request, $userId, $id);
    }

    private function verify($user, $cart, $params){
        if ($user->id != $cart->user_id) {
            Log::error('User ID and Cart User ID do not match in verification (' . $user->id . '!=' . $cart->user_id . ')');
            return false;
        }
        if ($cart->status_id != Cart::STATUS_ON) {
            Log::error('Cart status is not ON in verification (' . $cart->status_id . ')');
            return false;
        }
        $cart_sum_in_cents = (int) round($cart->sum * 100);
        $payment_sum_in_cents = (int) $params['amount'];
        if ($cart_sum_in_cents != $payment_sum_in_cents) {
            Log::error('Cart sum and params amount do not match in verification (' . $cart_sum_in_cents . '!=' . $payment_sum_in_cents . ')');
            return false;
        }
        if ($params['currency'] != 'EUR') {
            Log::error('Currency is not EUR in verification (' . $params['currency'] . ')');
            return false;
        }
        if ($params['country'] != 'LT') {
            Log::error('Country is not LT in verification (' . $params['country'] . ')');
            return false;
        }
        return true;
    }

    private function setOrder(Request $request, $userId, $id)
    {
        $params = [];
        parse_str(base64_decode(strtr($request->get('data'), ['-' => '+', '_' => '/'])), $params);

        if (is_array($params) &&
            isset($params['status']) &&
            $params['status'] == 1 &&
            is_numeric($id) &&
            is_numeric($userId)
        ) {
            $cart = $this->cartRepository->find($id);
            $user = User::find($userId);

            if ($cart && $user) {
                if (!$this->verify($user, $cart, $params)) {
                    Log::error('User and cart verification failed:\n'
                        . 'user_id:' . $userId . '\n'
                        . 'card_id:' . $id . '\n'
                        . 'params:' . json_encode($params) . '\n');
                    return response('Error', 400)->header('Content-Type', 'text/plain');
                }

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
                $newOrder->sum = $params['amount'] / 100;

                if ($newOrder->save()) {

                    foreach ($cartItems as $cartItem) {
                        $newOrderItem = new OrderItem();
                        $newOrderItem->order_id = $newOrder->id;
                        $newOrderItem->product_id = $cartItem->product_id;
                        $newOrderItem->price_current = $cartItem->price_current;
                        $newOrderItem->count = $cartItem->count;
                        $newOrderItem->save();
                    }
//                  $user->log("Created new Order ID:{$params['orderid']}");
                    $user->log("Created new Order ID:{$newOrder->id}");

                    event(new OrderCreated($newOrder->id, $newOrder->sum, $user->name, $cartItems));

                    Log::info("Order created for user id ".$userId." and cart id ".$id.". Sending back an OK");
                    return response('OK', 200)->header('Content-Type', 'text/plain');
                }
            }
        }

        if (isset($params['status']) && $params['status'] == 1){
            Log::error("Order creation failed. Sending back an Error. Params: ".json_encode($params));
        } else {
            Log::info("Received wrong status. Ignoring error.");
        }

        return response('Error', 400)->header('Content-Type', 'text/plain');
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
