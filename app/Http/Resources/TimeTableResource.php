<?php

namespace App\Http\Resources;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Timetable\Calls;
use App\Models\Timetable\Classes;
use App\Models\Timetable\Days;
use App\Models\Timetable\Parity;
use App\Models\Users\Teacher;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $group = $this->group;
        $lesson = $this->lesson;
        $calls = $this->calls;
        $even = $this->even;
        $day = $this->day;
        $class = $this->class;
        $teacher = $this->teacher;
        return [
            'id' => $this->id,
            'group' => $group,
            'lesson' => $lesson,
            'calls' => $calls,
            'even' => $even,
            'day' => $day,
            'class' => $class,
            'teacher' => $teacher
        ];
    }
}
