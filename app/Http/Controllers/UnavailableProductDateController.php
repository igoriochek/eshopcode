<?php

namespace App\Http\Controllers;

use App\Models\UnavailableProductDate;
use Illuminate\Http\Request;
use Exception;

class UnavailableProductDateController extends Controller
{
    use forSelector;

    public function index()
    {
        return view('unavailable_product_dates.index')
            ->with('unavailableDates', UnavailableProductDate::all());
    }

    public function create()
    {
        return view('unavailable_product_dates.create')
            ->with('products', $this->rentableRroductsForSelector());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'unavailable_date' => 'required|date_format:Y-m-d'
        ]);

        try {
            UnavailableProductDate::firstOrCreate([
                'product_id' => $validated['product_id'],
                'unavailable_date' => $validated['unavailable_date'],
                'created_at' => now()
            ]);

            return redirect(route('unavailable_product_dates.index'));
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $date = UnavailableProductDate::findOrFail($id);
            $date->delete();

            return redirect(route('unavailable_product_dates.index'));
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function getUnavailableProductDates(Request $request)
    {
        try {
            $unavailableDates = [];
            $unavailableProductDates = UnavailableProductDate::where('product_id', $request->productId)
                ->select('unavailable_date')
                ->get();

            foreach ($unavailableProductDates as $unavailableProductDate) {
                $unavailableDates[] = $unavailableProductDate->unavailable_date->toDateString();
            }

            return ['unavailableDates' => $unavailableDates];
        } catch (Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }
}
