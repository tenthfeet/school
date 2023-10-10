<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassNameRequest extends FormRequest
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
        $id = $this->route('class_name');
        return [
            'name' => [
                'required',
                'max:150',
                Rule::unique(config('table.class_names'), 'name')->ignore($id)
            ],
            'medium_of_study' => 'required',
            'is_active' => 'required'
        ];
    }
}
