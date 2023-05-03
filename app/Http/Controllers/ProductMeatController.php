<?php

namespace App\Http\Controllers;

use App\Models\ProductMeat;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductMeatRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Exception;

class ProductMeatController extends AppBaseController
{
    use PrepareTranslations;

    protected $productMeatRepository;
    private readonly array $default;

    public function __construct(ProductMeatRepository $productMeatRepo)
    {
        $this->productMeatRepository = $productMeatRepo;
        $this->default = [
            0 => __('names.no'),
            1 => __('names.yes')
        ];
    }

    public function index(): Factory|View|Application
    {
        return view('product_meat.index')
            ->with('productMeats', $this->productMeatRepository->all());
    }

    public function create(): Factory|View|Application
    {
        return view('product_meat.create')
            ->with('default', $this->default);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProductMeatRules($request);

        try {
            $this->changePreviousDefaultToFalse($request->default);

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            ProductMeat::create($input);

            session()->flash('success', __('messages.successCreateProductMeat'));
            return redirect()->route('productMeat.index');
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('product_meat.edit')
            ->with([
                'productMeat' => $this->productMeatRepository->find($id),
                'default' => $this->default
            ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $this->validateProductMeatRules($request);

        try {
            $this->changePreviousDefaultToFalse($request->default);

            $requestData = [...$validated, 'default' => $request->default ?? false];
            $input = $this->prepare($requestData, ['name']);
            $this->productMeatRepository->update($input, $id);

            session()->flash('success', __('messages.successUpdateProductMeat'));
            return redirect()->route('productMeat.index');
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $this->productMeatRepository->delete($id);

            session()->flash('success', __('messages.successDeleteProductMeat'));
            return redirect()->route('productMeat.index');
        }
        catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    private function validateProductMeatRules(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string'
        ]);
    }

    private function changePreviousDefaultToFalse(string $default): void
    {
        if ($default === "1") {
            $oldDefaultProductMeat = ProductMeat::where('default', true)->first();
            
            if ($oldDefaultProductMeat) {
                $oldDefaultProductMeat->default = false;
                $oldDefaultProductMeat->save();
            }
        }
    }

}