<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AcademicStandardRequest extends FormRequest
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
        $id = $this->route('academic_standard');
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique(config('table.academic_standards'), 'name')->ignore($id)
            ],
            'is_active' => 'required|boolean',

        ];
    }
}
