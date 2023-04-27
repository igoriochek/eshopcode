<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
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
        $validated = $this->validationFields($request);

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
        $validated = $this->validationFields($request);

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

    private function validationFields(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string'
        ]);
    }

    private function getProductSizeById(int $id): object
    {
        $productSize = ProductSize::find($id);

        if (!$productSize) {
            throw new \Error(__('messages.productSizeNotFound'));
        }

        return $productSize;
    }
}
