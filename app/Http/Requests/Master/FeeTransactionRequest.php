<?php

namespace App\Http\Requests\master;

use Illuminate\Foundation\Http\FormRequest;

class FeeTransactionRequest extends FormRequest
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
            'payment_mode'=>'required',
            'amount'=>'required',
        ];
    }
}
