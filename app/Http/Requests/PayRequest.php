<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'discount.*' => 'integer',
            'company_purchase' => 'boolean',
            'company_title' => 'nullable|string|max:100',
            'company_code' => 'nullable|string|max:50',
            'company_vat' => 'nullable|string|max:50',
            'company_address' => 'nullable|string|max:100'
        ];
    }
}
