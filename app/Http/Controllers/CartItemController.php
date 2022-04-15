<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\CartItem;
use App\Repositories\CartItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CartItemController extends AppBaseController
{
    /** @var CartItemRepository $cartItemRepository*/
    private $cartItemRepository;

    use \App\Http\Controllers\forSelector;

    public function __construct(CartItemRepository $cartItemRepo)
    {
        $this->cartItemRepository = $cartItemRepo;
    }

    /**
     * Display a listing of the CartItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cartItems = $this->cartItemRepository->all();

        return view('cart_items.index')
            ->with('cartItems', $cartItems);
    }

    /**
     * Show the form for creating a new CartItem.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $cartItem = new CartItem([
            'cart_id' => $request->get('cart_id', 0),
        ]);

        return view('cart_items.create')->with([
            'cartItem' => $cartItem,
            'product_list' => $this->productsForSelector(),
            'carts_list' => $this->cartsForSelector(),
        ]);
    }

    /**
     * Store a newly created CartItem in storage.
     *
     * @param CreateCartItemRequest $request
     *
     * @return Response
     */
    public function store(CreateCartItemRequest $request)
    {
        $input = $request->all();

        $cartItem = $this->cartItemRepository->create($input);

        Flash::success('Cart Item saved successfully.');

        return redirect(route('carts.show', [$cartItem->cart_id]));
    }

    /**
     * Display the specified CartItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cartItem = $this->cartItemRepository->find($id);

        if (empty($cartItem)) {
            Flash::error('Cart Item not found');

            return redirect(route('cartItems.index'));
        }

        return view('cart_items.show')->with('cartItem', $cartItem);
    }

    /**
     * Show the form for editing the specified CartItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cartItem = $this->cartItemRepository->find($id);

        if (empty($cartItem)) {
            Flash::error('Cart Item not found');

            return redirect(route('cartItems.index'));
        }

        return view('cart_items.edit')->with([
            'cartItem' => $cartItem,
            'product_list' => $this->productsForSelector(),
            'carts_list' => $this->cartsForSelector(),
        ]);
    }

    /**
     * Update the specified CartItem in storage.
     *
     * @param int $id
     * @param UpdateCartItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartItemRequest $request)
    {
        $cartItem = $this->cartItemRepository->find($id);

        if (empty($cartItem)) {
            Flash::error('Cart Item not found');

            return redirect(route('cartItems.index'));
        }

        $cartItem = $this->cartItemRepository->update($request->all(), $id);

        Flash::success('Cart Item updated successfully.');

        return redirect(route('carts.show', [$cartItem->cart_id]));
    }

    /**
     * Remove the specified CartItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cartItem = $this->cartItemRepository->find($id);

        if (empty($cartItem)) {
            Flash::error('Cart Item not found');

            return redirect(route('cartItems.index'));
        }

        $this->cartItemRepository->delete($id);

        Flash::success('Cart Item deleted successfully.');

        return redirect(route('carts.show', [$cartItem->cart_id]));
    }



    public function userCartItemDestroy($id)
    {
        $cartItem = $this->cartItemRepository->find($id);

        if (empty($cartItem)) {
            Flash::error('Cart Item not found');

            return redirect(route('cartItems.index'));
        }

        $this->cartItemRepository->delete($id);

        Flash::success('Cart Item deleted successfully.');

        return redirect(route('viewcart'));
    }
}
