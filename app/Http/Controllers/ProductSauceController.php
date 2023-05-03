<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\ProductSauce;
use App\Repositories\ProductSauceRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Exception;

use Illuminate\Http\Request;

class ProductSauceController extends AppBaseController
{
    use PrepareTranslations;

    protected $productSauceRepository;
    private readonly array $default;

    public function __construct(ProductSauceRepository $productSauceRepo)
    {
        $this->productSauceRepository = $productSauceRepo;
        $this->default = [
            0 => __('names.no'),
            1 => __('names.yes')
        ];
    }

    public function index(): Factory|View|Application
    {
        return view('product_sauce.index')
            ->with('productSauces', $this->productSauceRepository->all()); 
    }

    public function create(): Factory|View|Application
    {
        return view('product_sauce.create')
            ->with('default', $this->default);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProductSauceRules($request);

        try {
            $this->changePreviousDefaultToFalse($request->default);

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            ProductSauce::create($input);

            session()->flash('success', __('messages.successCreateProductSauce'));
            return redirect(route('productSauce.index'));
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('product_sauce.edit')
            ->with([
                'productSauce' => $this->productSauceRepository->find($id),
                'default' => $this->default
            ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $this->validateProductSauceRules($request);

        try {
            $this->changePreviousDefaultToFalse($request->default);

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            $this->productSauceRepository->update($input, $id);

            session()->flash('success', __('messages.successUpdateProductSauce'));
            return redirect(route('productSauce.index')); 
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $this->productSauceRepository->delete($id);

            session()->flash('success', __('messages.successDeleteProductSauce'));
            return redirect(route('productSauce.index'));
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    private function validateProductSauceRules(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string',
            'color' => 'required|string'
        ]);
    }

    private function changePreviousDefaultToFalse(string $default): void
    {
        if ($default === "1") {
            $oldDefaultProductSauce = ProductSauce::where('default', true)->first();
            
            if ($oldDefaultProductSauce) {
                $oldDefaultProductSauce->default = false;
                $oldDefaultProductSauce->save();
            }
        }
    }
}