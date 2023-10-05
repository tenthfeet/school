<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
        $id = $this->route('city');
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique(config('table.cities'), 'name')->where('state_id', $this->input('state_id'))->ignore($id)
            ],
            'state_id' => 'required|integer|max:50',
            'is_active' => 'required'
        ];
    }
}
