<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelRequest;
use App\Http\Requests\GroupTimeTableRequest;
use App\Http\Requests\TimeTableRequest;
use App\Http\Resources\TimeTableResource;
use App\Imports\ParentImport;
use App\Imports\TimeTableImport;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Timetable\Calls;
use App\Models\Timetable\Classes;
use App\Models\Timetable\Days;
use App\Models\Timetable\Parity;
use App\Models\Timetable\TimeTable;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TimeTableController extends Controller
{
    public function timeTable(TimeTableRequest $request){
        $group = Group::where('name', $request->group)->id;
        $lesson = Lesson::where('name', $request->lesson)->id;
        $calls = Calls::where('begin', $request->begin)->id;
        $even = Parity::where('even', $request->even)->id;
        $day = Days::where('day', $request->day)->id;
        $class = Classes::where('class', $request->class)->id;
        $teacher = Teacher::where('middle_name', $request->teacher)->id;
        TimeTable::create([
            'id_day' => $day,
            'id_calls' => $calls,
            'id_class' => $class,
            'id_even' => $even,
            'id_lesson' => $lesson,
            'id_group' => $group,
            'id_teacher' => $teacher
        ]);
        return response()->json(['message' => 'Блок расписания создан']);
    }

    public function timeTableInGroup(GroupTimeTableRequest $request){
        $group = Group::where('name', $request->group)->id;
        foreach ($request->timetable as $timetable){
            $lesson = Lesson::where('name', $timetable->lesson)->id;
            $calls = Calls::where('begin', $timetable->begin)->id;
            $even = Parity::where('even', $timetable->even)->id;
            $day = Days::where('day', $timetable->day)->id;
            $class = Classes::where('class', $timetable->class)->id;
            $teacher = Teacher::where('middle_name', $timetable->teacher)->id;
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
        return response()->json(['message' => 'Блок расписания для группы создан']);
    }

    public function timeTableExcel(ExcelRequest $request){
        Excel::import(new TimeTableImport(), $request->file('file'));
        return response()->json(['message' => 'Расписание импортировано успешно'], 200);
    }

    public function newCalsses(Request $request){
        Classes::create(['number' => $request->number]);
        return response()->json(['message' => 'Кабинет добавлен в базу данных']);
    }

    public function getByStudentTimeTable(){

        $student = auth('sanctum')->user()->student;
        $id = $student->group->id;
        return TimeTableResource::collection(TimeTable::where('id_group', $id)->get());
    }

    public function getByTeacherTimeTable(){
        $id = auth('sanctum')->user()->teacher;
        return TimeTableResource::collection(TimeTable::where('id_teacher', $id));
    }
}
