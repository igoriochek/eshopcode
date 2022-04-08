<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CartController extends AppBaseController
{
    /** @var CartRepository $cartRepository*/
    private $cartRepository;

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
        return view('carts.create');
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

        return view('carts.show')->with('cart', $cart);
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

        return view('carts.edit')->with('cart', $cart);
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

        Flash::success('Cart deleted successfully.');

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
            $cart = self::getOrSetCart($request);

            // getOrSet CartItem
            $cartItem = CartItem::query()
                ->where([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    //'price_current' => $product->price,
                ])
                ->first();

            if (null === $cartItem) {
                $cartItem = new CartItem([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'price_current' => $product->price,
                ]);
                $cartItem->save();
            }

            Flash::success('ok');
        } else {
            Flash::error('Product not found');
        }
        return redirect(route('viewcart'));
    }


    public function viewCart(Request $request)
    {
        $cart = self::getOrSetCart($request);

        $cartItems = CartItem::query()
            ->with('product')
            ->where([
                'cart_id' => $cart->id,
            ])
            ->first();

        return view('user_views.cart.view')
            ->with([
                'cartItems'=> $cartItems
            ]);
    }


    protected static function getOrSetCart(Request $request)
    {
        $userId = Auth::id();

        // getOrSet session/code
        if ($request->session()->has('appToken')) {
            $cartCode = $request->session()->get('appToken');
        } else {
            $cartCode = md5(time() . 'ಉಪ್ಪು');
            $request->session()->put('appToken', $cartCode);
        }

        // getOrSet Cart
        $cart = Cart::query()
            ->where([
                'user_id' => $userId,
                'code' => $cartCode,
            ])
            ->first();

        if (null === $cart) {
            $cart = new Cart([
                'user_id' => $userId,
                'code' => $cartCode,
                'status_id' => 1,
                'admin_id' => 2,
            ]);
            $cart->save();
        }

        return $cart;
    }
}
