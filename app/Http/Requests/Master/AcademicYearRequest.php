<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AcademicYearRequest extends FormRequest
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
        $id = $this->route('academic_year');
        return [
            'name' => [
                'required',
                Rule::unique(config('table.academic_years'), 'name')->ignore($id)
            ],
            'start_date' => 'required',
            'end_date' =>'required|date|before:+1 years',
            'is_active' => 'required',
        ];
    }
}
