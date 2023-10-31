<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:roles,name,'.$this->role->id],
            'permissions' => ['sometimes', 'required', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ];
    }
}
