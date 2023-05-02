<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizePrice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Exception;

class ProductSizeController extends AppBaseController
{
    use PrepareTranslations;

    private readonly array $default;

    public function __construct()
    {
        $this->default = [
            0 => __('names.no'),
            1 => __('names.yes')
        ];
    }

    public function index(): Factory|View|Application
    {
        return view('product_sizes.index')
            ->with('productSizes', ProductSize::all());
    }

    public function create(): Factory|View|Application
    {
        return view('product_sizes.create')
            ->with('default', $this->default);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProductSizeRules($request);

        try {
            if ($request->default === "1") {
                $oldDefaultProductSize = ProductSize::where('default', true)->first();
                $oldDefaultProductSize->default = false;
                $oldDefaultProductSize->save();
            }

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            ProductSize::create($input);

            session()->flash('success', __('messages.successCreateProductSize'));
            return redirect()->route('product_sizes.index');
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('product_sizes.edit')
            ->with([
                'productSize' => $this->getProductSizeById($id),
                'default' => $this->default
            ]);
    }

    public function update($id, Request $request): RedirectResponse
    {
        $validated = $this->validateProductSizeRules($request);

        try {
            if ($request->default === "1") {
                $oldDefaultProductSize = ProductSize::where('default', true)->first();
                $oldDefaultProductSize->default = false;
                $oldDefaultProductSize->save();
            }

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            $productSize = $this->getProductSizeById($id);
            $productSize->update($input);

            session()->flash('success', __('messages.successUpdateProductSize'));
            return redirect()->route('product_sizes.index');
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $productSize = $this->getProductSizeById($id);
            $productSize->delete();

            session()->flash('success', __('messages.successDeleteProductSize'));
            return back();
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function addProductSizePriceView($id): View|Factory|Application
    {
        $addedProductSizes = collect();
        $productSizesPrices = ProductSizePrice::where('product_id', $id)->get();

        foreach ($productSizesPrices as $productSizePrice) {
            $addedProductSizes->add($productSizePrice->size);
        }

        $notAddedProductSizes = [];
        $productSizes = ProductSize::all();

        if (count($addedProductSizes) == 0) {
            foreach ($productSizes as $productSize) {
                $notAddedProductSizes[$productSize->id] = $productSize->name;
            }
        }
        if (count($addedProductSizes) > 0) {
            foreach ($productSizes as $key => $productSize) {
                if (!isset($addedProductSizes[$key])) {
                    $notAddedProductSizes[$productSize->id] = $productSize->name;
                }
                else continue;
            }
        }

        return view('product_sizes.add_product_size_price')
            ->with([
                'productId' => $id,
                'notAddedProductSizes' => $notAddedProductSizes
            ]);
    }

    public function addProductSizePrice($id, Request $request): RedirectResponse
    {
        $validated = $this->validateProductSizePriceRules($request);

        try {
            ProductSizePrice::firstOrCreate([
                'product_id' => $validated['product_id'],
                'product_size_id' => $validated['product_size_id'],
                'price' => $validated['price'],
                'created_at' => now()
            ]);

            session()->flash('success', __('messages.successAddProductSizePrice'));
            return redirect()->route('products.show', $id);
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    /**
     * @throws Exception
     */
    public function editProductSizePriceView($productId, $sizePriceId): Factory|View|Application
    {
        return view('product_sizes.edit_product_size_price')
            ->with([
                'productId' => $productId,
                'productSizePrice' => $this->getProductSizePriceById($sizePriceId)
            ]);
    }

    public function editProductSizePrice($productId, $sizePriceId, Request $request): RedirectResponse
    {
        $validated = $this->validateProductSizePriceRules($request);

        try {
            $productSizePrice = $this->getProductSizePriceById($sizePriceId);
            $productSizePrice->price = $validated['price'];
            $productSizePrice->save();

            session()->flash('success', __('messages.successEditProductSizePrice'));
            return redirect()->route('products.show', $productId);
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    private function validateProductSizeRules(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string'
        ]);
    }

    private function validateProductSizePriceRules(object $request): array
    {
        return $request->validate([
            'product_id' => 'required|integer',
            'product_size_id' => 'required|integer',
            'price' => 'required|numeric'
        ]);
    }

    /**
     * @throws Exception
     */
    private function getProductSizeById(int $id): object
    {
        $productSize = ProductSize::find($id);

        if (!$productSize) {
            throw new Exception(__('messages.productSizeNotFound'));
        }

        return $productSize;
    }

    /**
     * @throws Exception
     */
    private function getProductSizePriceById(int $id): object
    {
        $productSizePrice = ProductSizePrice::find($id);

        if (!$productSizePrice) {
            throw new Exception(__('messages.productSizePriceNotFound'));
        }

        return $productSizePrice;
    }
}