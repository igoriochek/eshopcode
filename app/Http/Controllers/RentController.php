<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends AppBaseController
{
    public function rent(Request $request, Product $product)
    {
        $product->rental_start_date = Carbon::now()->toDateString();
        $product->rental_end_date = Carbon::now()->addWeeks(2)->toDateString();
        $product->save();

        // Perform any additional logic or redirection as needed

        return back()->with('success', 'Product rented successfully.');
    }

    public function returnProduct(Request $request, Product $product)
    {
        $product->rental_start_date = null;
        $product->rental_end_date = null;
        $product->save();

        // Perform any additional logic or redirection as needed

        return back()->with('success', 'Product returned successfully.');
    }
}
