<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeeDetailRequest extends FormRequest
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
        $id = $this->route('fee_detail');
        return [
            'academic_year_id' => 'required',
            'academic_standard_id' => 'required',
            'fee_id' => [
                'required',
                Rule::unique(config('table.fee_details'), 'fee_id')
                    ->where('academic_year_id', $this->input('academic_year_id'))
                    ->where('academic_standard_id', $this->input('academic_standard_id'))
                    ->ignore($id)
            ],
            'fee_amount' => 'required',
            'is_active' => 'required',

        ];
    }
}
