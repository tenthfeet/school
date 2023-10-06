<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeesTypeRequest extends FormRequest
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
        $id = $this->route('fees_type');
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique(config('table.fees_types'), 'name')->ignore($id)
            ],
            'fees_type'=>'required|string|max:120',
            'fees_amount'=>'required|numeric|min:0',
            'is_active' => 'required|boolean',

        ];
    }
}
