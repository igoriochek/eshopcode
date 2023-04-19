<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CartStatus;
use App\Models\FreeAccessory;
use App\Models\PaidAccessory;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CartRepository;
use App\Http\Controllers\AppBaseController;
use App\Traits\CartItems;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CartController extends AppBaseController
{
    use \App\Http\Controllers\forSelector;

    /** @var CartRepository $cartRepository*/
    private $cartRepository;
    use CartItems;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->all();

        return view('carts.index')
            ->with('carts', $carts);
    }

    /**
     * Show the form for creating a new Cart.
     *
     * @return Response
     */
    public function create()
    {
        return view('carts.create')->with([
            'users_list' => $this->usersForSelector(),
            'statuses_list' => $this->cartStatusesForSelector(),
            'admin_list' => $this->adminForSelector(),
        ]);
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param CreateCartRequest $request
     *
     * @return Response
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->all();

        $cart = $this->cartRepository->create($input);

        Flash::success('Cart saved successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $cartItems = CartItem::query()
            ->where([
                'cart_id' => $cart->id,
            ])
            ->get();

        return view('carts.show')->with([
            'cart' => $cart,
            'cartItems' => $cartItems,
        ]);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.edit')->with([
            'cart' => $cart,
            'users_list' => $this->usersForSelector(),
            'statuses_list' => $this->cartStatusesForSelector(),
            'admin_list' => $this->adminForSelector(),
        ]);
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param int $id
     * @param UpdateCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $cart = $this->cartRepository->update($request->all(), $id);

        Flash::success('Cart updated successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $this->cartRepository->delete($id);

//        Flash::success('Cart deleted successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Add to cart
     *
     * @param AddToCartRequest $request
     * @return void
     */
    public function addToCart(AddToCartRequest $request)
    {
        $validated = $request->validated();

        $product = Product::find($validated['id']);

        // if isset product
        if (null !== $product) {
            $cart = $this->cartRepository->getOrSetCart($request);

            // getOrSet CartItem
            $cartItem = CartItem::query()
                ->where([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    //'price_current' => $product->price,
                ])
                ->get()
                ->last();

            $productPrice = $product->price;

            foreach ($product->sizesPrices as $sizePrice) {
                if ($product->hasSizes && $request->size == $sizePrice->product_size_id) {
                    $productPrice = $sizePrice->price;
                }
            }

            $paidAccessoriesTotalPrice = 0;

            if ($request->paid_accessories) {
                $paidAccessoryIds = explode(',', $request->paid_accessories);

                foreach ($paidAccessoryIds as $paidAccessoryId) {
                    $paidAccessoriesTotalPrice += PaidAccessory::find($paidAccessoryId)->price;
                }
            }

            if (null === $cartItem || $cartItem->size !== $request->size) {
                $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'product_size_id' => $request->size,
                    'product_meat_id' => $request->meat,
                    'product_sauce_id' => $request->sauce,
                    'paid_accessories' => $request->paid_accessories,
                    'free_accessories' => $request->free_accessories,
                    'price_current' => $product->discount
                        ? $productPrice - (round(($productPrice * $product->discount->proc / 100), 2)) + $paidAccessoriesTotalPrice
                        : $productPrice + $paidAccessoriesTotalPrice,
                    'count' => $validated['count'],
                ]);
                $cartItem->save();
            } else {
                $cartItem->increment('count', $validated['count']);
                $cartItem->save();
            }

            $this->cartRepository->cartSum($cart);

//            Flash::success(__('messages.addToCart'));
        } else {
            Flash::error('Product was not found');
        }
        return redirect(route('viewcart'));
    }

    private function setPaidAccessoriesToCartItem(object $cartItem): object
    {
        $paidAccessories = collect();
        $cartItem->paidAccessoriesTotalPrice = 0;

        if ($cartItem->paid_accessories) {
            $paidAccessoryIds = explode(',', $cartItem->paid_accessories);

            foreach ($paidAccessoryIds as $paidAccessoryId) {
                $paidAccessory = PaidAccessory::find($paidAccessoryId);

                $paidAccessories->add($paidAccessory);
                $cartItem->paidAccessoriesTotalPrice += $paidAccessory->price;
            }
        }

        return $paidAccessories;
    }

    private function setFreeAccessoriesToCartItem(object $cartItem): object
    {
        $freeAccessories = collect();

        if ($cartItem->free_accessories) {
            $freeAccessoryIds = explode(',', $cartItem->free_accessories);

            foreach ($freeAccessoryIds as $freeAccessoryId) {
                $freeAccessories->add(FreeAccessory::find($freeAccessoryId));
            }
        }

        return $freeAccessories;
    }

    public function viewCart(Request $request)
    {
        $cart = $this->cartRepository->getOrSetCart($request);
        $cartItems = $this->getCartItems($cart);

        foreach ($cartItems as $cartItem) {
            $cartItem->paidAccessories = $this->setPaidAccessoriesToCartItem($cartItem);
            $cartItem->freeAccessories = $this->setFreeAccessoriesToCartItem($cartItem);
        }

        return view('user_views.cart.view')
            ->with([
                'cart' => $cart,
                'cartItems'=> $cartItems
            ]);
    }
}
