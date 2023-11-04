<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamRequest extends FormRequest
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
        $id = $this->route('exam');
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique(config('table.exams'), 'name')->ignore($id)
            ],
            'exam_category_id' => 'required',
            'medium_of_study_id' => 'required',
            'date' => 'required',
            'session' => 'required',
            'subject_id' => 'required',
            'class_room_id' => 'required',
            'is_active' => 'required',
        ];
    }
}
