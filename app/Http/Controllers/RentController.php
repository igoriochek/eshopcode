<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use App\Models\CartItem;
use App\Models\Product;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

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
        $pricePerDay = $product->discount
        ? $product->price - (round(($product->price * $product->discount->proc / 100), 2))
        : $product->price;

    $startDate = $validated['start_date'] ?? null;
    $endDate = $validated['end_date'] ?? null;
    $days = $startDate && $endDate ? (new Carbon($endDate))->diffInDays(new Carbon($startDate)) + 1 : 0;
    $rentalPrice = $pricePerDay * $days;

    CartItem::create([
        'cart_id' => $cart->id,
        'product_id' => $product->id,
        'rental_start_date' => $startDate,
        'rental_end_date' => $endDate,
        'price_current' => $rentalPrice,
        'count' => 1
    ]);
    }
}
