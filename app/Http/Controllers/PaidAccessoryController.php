<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\PaidAccessory;
use App\Repositories\PaidAccessoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Exception;

use Illuminate\Http\Request;

class PaidAccessoryController extends AppBaseController
{
    use PrepareTranslations;
    
    protected $paidAccessoryRepository;

    public function __construct(PaidAccessoryRepository $paidAccessoryRepo)
    {
        $this->paidAccessoryRepository = $paidAccessoryRepo;
    }

    public function index(): Factory|View|Application
    {
        return view('paid_accessory.index')
            ->with('paidAccessories', $this->paidAccessoryRepository->all());
    }

    public function create(): Factory|View|Application
    {
        return view('paid_accessory.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePaidAccessoryRules($request);

        try {
            $input = $this->prepare($validated, ['name']);
            PaidAccessory::create($input);

            session()->flash('success', __('messages.successCreatePaidAccessory'));
            return redirect()->route('paidAccessory.index');
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('paid_accessory.edit')
            ->with('paidAccessory', $this->paidAccessoryRepository->find($id));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $this->validatePaidAccessoryRules($request);

        try {
            $input = $this->prepare($validated, ['name']);
            $paidAccessory = $this->paidAccessoryRepository->find($id);
            $paidAccessory->update($input);

            session()->flash('success', __('messages.successUpdatePaidAccessory'));
            return redirect()->route('paidAccessory.index');
        } 
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $paidAccessory = $this->paidAccessoryRepository->find($id);
            $paidAccessory->delete();

            session()->flash('success', __('messages.successDeletePaidAccessory'));
            return back();
        }
        catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    private function validatePaidAccessoryRules(object $request): array
    {
        return $request->validate([
            'name_en' => 'required|string',
            'name_lt' => 'required|string',
            'name_ru' => 'required|string',
            'price' => 'required|numeric'
        ]);
    }
}