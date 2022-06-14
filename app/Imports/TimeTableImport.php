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
            $group = Group::where('name', $row[0])->id;
            $lesson = Lesson::where('name', $row[2])->id;
            $calls = Calls::where('begin', $row[3])->id;
            $even = Parity::where('even', $row[4])->id;
            $day = Days::where('day', $row[1])->id;
            $class = Classes::where('class', $row[6])->id;
            $teacher = Teacher::where('middle_name', $row[7])->id;
            TimeTable::create([
                'id_day' => $day,
                'id_calls' => $calls,
                'id_class' => $class,
                'id_even' => $even,
                'id_lesson' => $lesson,
                'id_group' => $group,
                'id_teacher' => $teacher
            ]);
        }
    }
}
