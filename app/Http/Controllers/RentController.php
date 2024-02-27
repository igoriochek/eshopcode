<?php

namespace App\Http\Controllers;

use App\Models\UnavailableProductDate;
use App\Repositories\CartRepository;
use App\Models\CartItem;
use App\Models\Product;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use DateTime;
use Carbon\CarbonPeriod;
use Illuminate\Validation\ValidationException;

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
            'days' => 'required|integer|min:1|max:3'
        ]);

        try {
            $product = Product::findOrFail($id);
            $cart = $this->cartRepository->getOrSetCart($request);

            $this->findUnavailableDateBetweenStartAndEnd($validated, $product->id);

            $this->addProductRentToCart($cart, $product, $validated);
            $this->cartRepository->cartSum($cart);

            return redirect(route('viewcart'));
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    private function findUnavailableDateBetweenStartAndEnd(array $validated, int $productId): void
    {
        $unavailableDates = [];
        $endDate = Carbon::createFromFormat('Y-m-d', $validated['start_date'])->addDays($validated['days'])->toDateString();
        $carbonDates = CarbonPeriod::create($validated['start_date'], $endDate);

        foreach ($carbonDates as $carbonDate) {
            $unavailableDates[] = $carbonDate->format('Y-m-d');
        }

        foreach ($unavailableDates as $unavailableDate) {
            $existingUnavailableDate = UnavailableProductDate::where('unavailable_date', $unavailableDate)
                ->where('product_id', $productId)
                ->first();

            if ($existingUnavailableDate) {
                throw new Exception('An unavailable date exists between chosen start and end dates');
            }
        }
    }

    private function addProductRentToCart(object $cart, object $product, array $validated): void
    {
        $rentalPrice = $product->discount
            ? $product->price - (round(($product->rental_price * $product->discount->proc / 100), 2))
            : $product->rental_price;

        CartItem::firstOrCreate([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'rental_start_date' => $validated['start_date'],
            'days' => $validated['days'],
            'price_current' => $rentalPrice * $validated['days'],
            'count' => 1
        ]);
    }
}