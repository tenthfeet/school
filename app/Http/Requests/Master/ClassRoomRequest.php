<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassRoomRequest extends FormRequest
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
        $id = $this->route('class_room');
        return [
        'academic_standard_id'=>'required',
        'department_id'=>'required|nullable',
        'section'=>'required|nullable',
        'name' => [
            'required',
            Rule::unique(config('table.class_rooms'), 'name')->ignore($id)
        ],
        'is_active'=>'required'
        ];
    }
}
