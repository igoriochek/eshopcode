<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Repositories\FreeAccessoryRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Exception;

class FreeAccessoryController extends AppBaseController
{
    use PrepareTranslations, forSelector;

    protected $freeAccessoryRepository;
    
    public function __construct(FreeAccessoryRepository $freeAccessoryRepo)
    {
        $this->freeAccessoryRepository = $freeAccessoryRepo;
    }

    public function index(): Factory|View|Application
    {
        return view('free_accessory.index')
            ->with('freeAccessories', $this->freeAccessoryRepository->all()); 
    }

    public function create(): Factory|View|Application
    {
        return view('free_accessory.create')
            ->with('productList', $this->productsForSelector());
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateFreeAccessoryRules($request);

        try {
            $input = $this->prepare($validated, ['name']);
            $this->freeAccessoryRepository->create($input);

            return redirect(route('freeAccessory.index'));
        }
        catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('free_accessory.edit')
            ->with([
                'freeAccessory' => $this->freeAccessoryRepository->find($id),
                'productList' => $this->productsForSelector()
            ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $this->validateFreeAccessoryRules($request);

        try {
            $input = $this->prepare($validated, ['name']);
            $freeAccessory = $this->freeAccessoryRepository->find($id);
            $this->freeAccessoryRepository->update($input, $id);

            return redirect(route('freeAccessory.index'));
        }
        catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $this->freeAccessoryRepository->delete($id);
            return redirect(route('freeAccessory.index'));
        }
        catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    private function validateFreeAccessoryRules(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string',
            'product_id' => 'required|integer'
        ]);
    }
}