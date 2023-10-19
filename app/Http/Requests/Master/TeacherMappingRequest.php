<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherMappingRequest extends FormRequest
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
        $id = $this->route('teacher_mapping');
        return [
            'class_room_id'=>'required',
            'academic_year_id'=>'required',
            'user_id'=>[
                'required',
                Rule::unique(config('table.mapping_teachers_classrooms_day_time'), 'user_id')
                ->where('class_room_id', $this->input('class_room_id'))
                ->where('class_period_id', $this->input('class_period_id'))
                ->where('day', $this->input('day'))
                ->ignore($id)
            ],
            'day'=>'required',
            'class_period_id'=>'required'
        ];
    }
}
