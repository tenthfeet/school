<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassPeriodRequest extends FormRequest
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
        $id = $this->route('class_period');
        return [
            'name' => [
                'required',
                Rule::unique(config('table.class_periods'), 'name')->ignore($id)
            ],
            'start_time' => [
                'required',
                Rule::unique(config('table.class_periods'), 'start_time')->ignore($id)
            ],
            'end_time' => 'required',
            'is_active' => 'required'
        ];
    }
}
