<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Timetable\Calls;
use App\Models\Timetable\Classes;
use App\Models\Timetable\Days;
use App\Models\Timetable\Parity;
use App\Models\Timetable\TimeTable;
use App\Models\Users\Teacher;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TimeTableImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $group = Group::where('name', $row[0])->first()->id;
            $lesson = Lesson::where('name', $row[2])->first()->id;
            $calls = Calls::where('begin', $row[3])->first()->id;
            $even = Parity::where('even', $row[4])->first()->id;
            $day = Days::where('day', $row[1])->first()->id;
            $class = Classes::where('number', $row[5])->first()->id;
            $teacher = User::where('middle_name', $row[6])->first()->teacher;

            TimeTable::create([
                'id_day' => $day,
                'id_calls' => $calls,
                'id_class' => $class,
                'id_even' => $even,
                'id_lesson' => $lesson,
                'id_group' => $group,
                'id_teacher' => $teacher->id
            ]);
        }
    }
}
