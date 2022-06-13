<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ManyTeachersRegistration extends ApiRequest
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
            'teachers' => 'array|required',
            'teachers.*.name' => 'min:2|max:40|required',
            'teachers.*.middle_name' => 'min:2|max:40|required',
            'teachers.*.last_name' => 'min:2|max:40|required',
            'teachers.*.phone' => 'min:11|max:11|required',
            'teachers.*.password' =>'min:8|required',
            'teachers.*.lessons' =>'array|required',
            'teachers.*.lessons.*.name' =>'min:2|required',
        ];
    }
}
