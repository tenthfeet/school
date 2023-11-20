<?php

namespace App\Http\Requests\master;

use Illuminate\Foundation\Http\FormRequest;

class FeeDueRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'academic_year_id'=>'required',
            'academic_standard_id'=>'required',
            'term_id'=>'required',
            'paid_amount'=>'required',
            'is_penalty_applied'=>'required',
            'partial_payment'=>'required'
        ];
    }
}
