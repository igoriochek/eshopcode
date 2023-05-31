<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use App\Models\CartItem;
use App\Models\Product;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use DateTime;

class RentController extends AppBaseController
{
    public function __construct(private CartRepository $cartRepository)
    {
    }

    public function rentProduct(int $id, Request $request)
    {
        $twoWeeks = null;

        if ($request->start_date) {
            $twoWeeks = Carbon::createFromFormat('Y-m-d', $request->start_date)->addWeeks(2)->toDateString();
        }

        $validated = $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|before:' . $twoWeeks . '|after:start_date'
        ]);

        try {
            $product = Product::findOrFail($id);
            $cart = $this->cartRepository->getOrSetCart($request);

            $this->addProductRentToCart($cart, $product, $validated);
            $this->cartRepository->cartSum($cart);

            return redirect(route('viewcart'));
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    private function addProductRentToCart(object $cart, object $product, array $validated): void
    {
        $rentalPrice = $product->discount
            ? (round(($product->rental_price * $product->discount->proc / 100), 2))
            : $product->rental_price;

        $startDate = new DateTime($validated['start_date']);
        $endDate = new DateTime($validated['end_date']);
        $days = $startDate->diff($endDate)->format('%a');

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'rental_start_date' => $validated['start_date'],
            'rental_end_date' => $validated['end_date'],
            'price_current' => $rentalPrice * $days,
            'count' => 1
        ]);
    }
}
