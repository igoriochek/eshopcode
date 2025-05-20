<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function edit(): View
    {
        $company = Company::where('user_id', null)->get();

        if ($company->isEmpty()) {
            $company = Company::firstOrCreate(['user_id' => null]);
        }

        return view('site_company.edit')
            ->with('company', $company->first());
    }

    public function update(UpdateCompanyRequest $request): RedirectResponse
    {
        try {
            $validInput = $request->validated();
            Company::where('user_id', null)->update($validInput);

            session()->flash('success', __('messages.successUpdateSiteCompany'));
            return redirect()->route('editSiteCompany');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }
}
