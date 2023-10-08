<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('country');
        return [
            'name' => [
                'required',
                'max:200',
                Rule::unique(config('table.countries'), 'name')->ignore($id)
            ],
            'iso_code' => [
                'required',
                'max:3',
                Rule::unique(config('table.countries'), 'iso_code')->ignore($id)
            ],
            'mobile_code' => [
                'required',
                'max:6',
                Rule::unique(config('table.countries'), 'mobile_code')->ignore($id)
            ],
            'is_active' => 'required|boolean',

        ];
    }
}
