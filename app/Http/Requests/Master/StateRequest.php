<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StateRequest extends FormRequest
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
     * @return array<string \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string,integer,boolean>
     */
    public function rules(): array
    {
        $id = $this->route('state');
        return [
            'name' => [
                'required',
                'max:50',
                Rule::unique(config('table.states'), 'name')->ignore($id)
            ],
            'code' => 'required|integer|max:50',
            'is_active' => 'required|boolean',

        ];
    }
}
