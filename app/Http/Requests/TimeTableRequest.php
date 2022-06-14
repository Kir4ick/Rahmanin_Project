<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeTableRequest extends ApiRequest
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
            'begin' => 'required|regex:/[0-24]{2}:[0-60]{2}/',
            'day' => 'required|min:4',
            'group' => 'required|regex:/[А-Я]{2}-[1-5]{2}/',
            'lesson' => 'required|min:2',
            'class' => 'required|min:2',
            'even' => 'required',
            'teacher' => 'required'
        ];
    }
}
