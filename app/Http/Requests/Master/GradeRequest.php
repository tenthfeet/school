<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GradeRequest extends FormRequest
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
        $id = $this->route('grade');
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique(config('table.grades'), 'name')->ignore($id)
            ],
            'is_active' => 'required|boolean',

        ];
    }
}
