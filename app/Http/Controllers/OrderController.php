<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class OrderController extends AppBaseController
{
    use \App\Http\Controllers\forSelector;

    /** @var OrderRepository $orderRepository*/
    private $orderRepository;

    /** @var CartRepository $cartRepository*/
    private $cartRepository;

    public function __construct(OrderRepository $orderRepo, CartRepository $cartRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create')->with([
            'users_list' => $this->usersForSelector(),
            'statuses_list' => $this->orderStatusesForSelector(),
        ]);
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $orderItems = OrderItem::query()
            ->with('product')
            ->where([
                'order_id' => $order->id,
            ])
            ->get();

        return view('orders.show')->with([
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with([
            'order' => $order,
            'users_list' => $this->usersForSelector(),
            'statuses_list' => $this->orderStatusesForSelector(),
        ]);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }


    /**
     * Orders list
     */
    public function indexOrders()
    {
        $userId = Auth::id();
        $orders = $this->orderRepository->all([
            'user_id' => $userId,
        ]);

        return view('user_views.orders.index')->with([
            'orders' => $orders,
        ]);
    }



    public function viewOrder($id)
    {
        $userId = Auth::id();
        $order = Order::query()
            ->where([
                'id' => $id,
                'user_id' => $userId,
            ])
            ->first();

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('rootorders'));
        }

        $orderItems = OrderItem::query()
            ->with('product')
            ->where([
                'order_id' => $order->id,
            ])
            ->get();

        return view('user_views.orders.view')->with([
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }



    public function destroyOrder($id)
    {
        $userId = Auth::id();
        $order = Order::query()
            ->where([
                'id' => $id,
                'user_id' => $userId,
            ])
            ->first();

        if (empty($order)) {
            Flash::error('Order not found');
        }

        $order->status_id = 5;
        $order->save();

        return redirect(route('rootorders'));
    }



    public function checkout(Request $request)
    {
        $cart = $this->cartRepository->getOrSetCart($request);

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
                Flash::success('Order saved successfully.');
            }
        }
        return redirect(route('rootorders'));
    }
}
