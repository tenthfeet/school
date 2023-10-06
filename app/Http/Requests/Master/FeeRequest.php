<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeeRequest extends FormRequest
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
        $id = $this->route('fee');
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique(config('table.fees'), 'name')->ignore($id)
            ],
            'fee_type'=>'required|max:100',
            'fee_amount'=>'required|numeric|min:0',
            'is_active' => 'required|boolean',

        ];
    }
}
