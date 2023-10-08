<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        return [
            'name' => 'required|max:200',
            'employee_no' => 'required',
            'email' => [
                'required',
                Rule::unique(config('table.users'), 'email')->ignore($id)
            ],
            'country_id' => 'required',
            'mobile_no' => 'required|max:20',
            'city_id' => 'required',
            'state_id' => 'required',
            'address' => 'required|max:1000',
            'date_of_birth' => 'required|date|before:-18 years',
            'date_of_join' => 'required',
            'role_id' => 'required',
            'qualification' => 'required',
            'is_active' => 'required|boolean',
        ];
    }
}
