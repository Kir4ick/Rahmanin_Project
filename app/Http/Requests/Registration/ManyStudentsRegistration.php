<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class ManyStudentsRegistration extends FormRequest
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
            'students' => 'array|required',
            'students.*.name' => 'min:2|max:40|required',
            'students.*.middle_name' => 'min:2|max:40|required',
            'students.*.last_name' => 'min:2|max:40|required',
            'students.*.phone' => 'min:11|max:11|required',
            'students.*.password' =>'min:8|required',
            'students.*.student_cart' => 'min:4|max:4|required',
            'group' => 'required'
        ];
    }
}
