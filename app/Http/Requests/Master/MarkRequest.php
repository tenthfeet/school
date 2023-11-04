<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'student_admission_id' => 'required',
            'academic_year_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'class_room_id' => 'required',
            'marks' => 'required',
            'maximum_marks' => 'required',
            'pass_marks' => 'required',
            'grade_id' => 'required',
        ];
    }
}
