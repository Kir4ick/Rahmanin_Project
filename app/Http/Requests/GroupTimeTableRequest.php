<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupTimeTableRequest extends ApiRequest
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
            'timetable' => 'required|array',
            'timetable.*.begin' => 'required|regex:/[0-24]{2}:[0-60]{2}/',
            'timetable.*.day' => 'required|min:4',
            'group' => 'required|regex:/[А-Я]{2}-[1-5]{2}/',
            'timetable.*.lesson' => 'required|min:2',
            'timetable.*.class' => 'required|min:2',
            'timetable.*.even' => 'required',
            'timetable.*.teacher' => 'required'
        ];
    }
}
