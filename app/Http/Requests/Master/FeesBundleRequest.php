<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class FeesBundleRequest extends FormRequest
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
        return [
            'name' => 'required',
            'academic_year_id' => 'required',
            'academic_standard_id' => 'required',
            'due_date' => 'required',
            'penalty_amount' => 'required',
            'fee_details_id' =>  'required',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'Please enter the Bundle name',
            'academic_year_id' => 'Please select the Academic year',
            'academic_standard_id' => 'Please select the Academic standard',
            'due_date' => 'Please select the due date',
            'penalty_amount' => 'Please enter the penalty amount',
            'fee_details_id' => 'Please select the Fees Details'
        ];
    }
}
