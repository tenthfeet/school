<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'name' => ['required', 'max:150'],
            'id_no' => ['required', 'max:15', ],
           // Rule::unique(config('table.students'), 'id_no')
            'gender' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'date_of_joining' => ['required', 'date'],
            'aadhar_no' => ['required', 'digits:12'],
            'blood_group' => ['required'],
            'mother_tounge_id' => ['required'],
            'photo_path' => ['nullable', 'image','max:1024'],
            'student_status_id' => ['required'],
            'sibling_id' => ['exclude_unless:has_sibling,1','required'],
            'father_name' => ['required', 'max:150'],
            'mother_name' => ['required', 'max:150'],
            'father_occupation' => ['nullable', 'max:200'],
            'mother_occupation' => ['nullable', 'max:200'],
            'email' => ['required', 'email', 'max:150',],
            'country_id' => ['required'],
            'mobile_no' => ['required', 'digits:10'],
            'city_id' => ['required', 'max:150'],
            'state_id' => ['required', 'max:150'],
            'address' => ['required', 'max:1000'],
            'pincode' => ['required', 'digits:6']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the Name',
            'id_no.required' => 'Please enter the Student Id',
            'date_of_birth.required' => 'Please enter the Date of Birth',
            'gender.required' => 'Please select the Gender',
            'date_of_joining.required' => 'Please enter the Date of Joining',
            'aadhar_no.required' => 'Please enter the Aadhar Number',
            'blood_group.required' => 'Please select the Blood Group',
            'mother_tounge_id.required' => 'Please select the mother tounge',
            'student_status_id.required' => 'Please select the status',
            'sibling_id.required' => 'Please enter the sibling Id',
            'father_name.required' => 'Please the Father name',
            'mother_name.required' => 'Please the Mother name',
            'father_occupation.max' => 'Occupation should not exceed 200 characters',
            'mother_occupation.max' => 'Occupation should not exceed 200 characters',
            'email.required' => 'Please enter the Email',
            'email.email' => 'Please enter the valid email id',
            'mobile_no.required' => 'Please enter the Mobile Number',
            'country_id.required' => 'Please select the County',
            'city_id.required' => 'Please select the City',
            'stat_id.required' => 'Please select the State',
            'address.required' => 'Please enter the Address',
            'pincode.required' => 'Please enter the Pincode'
        ];
    }
}
