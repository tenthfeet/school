<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class HomeworkRequest extends FormRequest
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
        return [
            'class_room_id'=>'required',
            'subject_id'=>'required',
            'user_id'=>'required',
            'date'=>'required',
            'homework_detail'=>'required',
            'is_active'=>'required'
        ];
    }
}
