<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
        $id = $this->route('subject');
        return [
            'name' => [
                'required',
                'max:150',
                Rule::unique(config('table.subjects'), 'name')->ignore($id)
            ],
            'printable_name' => 'required|max:150',
            'is_active' => 'required|boolean',

        ];
    }
}
