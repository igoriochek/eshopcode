<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'title' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:50',
            'vat' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:100',
            'user_id' => 'nullable|integer|unique:companies'
        ];
    }
}
