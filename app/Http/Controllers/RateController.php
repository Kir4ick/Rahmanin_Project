<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Http\Resources\RateResource;
use App\Http\Resources\StudentResource;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Rate;

class RateController extends Controller
{
    public function rate(RateRequest $request){
        $id_lesson = Lesson::where('name', $request->lesson)->first()->id;
        Rate::create([
            'rate' => $request->rate,
            'id_lesson' => $id_lesson,
            'id_student' => $request->id_student,
            'id_teacher' => auth('sanctum')->user()->teacher->id
        ]);
        return response()->json(['message' => 'Оценка поставлена'],200);
    }

    public function rateJournal(Request $request){
        $id_lesson = Lesson::where($request->lesson, 'name')->first()->id;
        foreach ($request->students as $student){
            Rate::create([
                'rate' => $student['rate'],
                'id_lesson' => $id_lesson,
                'id_student' => $student['id_student'],
                'id_teacher' => auth('sanctum')->user()->teacher->id
            ]);
        }
        $responseDate = now();
        return response()->json(['message' => 'Журнал заполнен за '. $responseDate], 200);
    }

    public function putRate($id, Request $request){

        $rate = Rate::find($id);
        $rate->rate = $request->rate;
        $rate->save;
        return response()->json(['message' => 'Оценка изменена']);
    }

    public function delRate($id){
        $rate = Rate::find($id);
        $rate->delete();
        return response()->json(['message'=>'Оценка удалена']);
    }

    public function getStudentsByRateAndLesson($lesson, $rate){
        $id_lesson = Lesson::where('name' ,$lesson)->first()->id;

        return StudentResource::collection(Rate::where('rate', $rate)->where('id_lesson', $id_lesson)->get()->student);
    }

    public function getJournal($group, $lesson, $date){
        $group = Group::where('name', $group)->first();
        $id_lesson = Lesson::where('name' ,$lesson)->first()->id;
        return RateResource::collection($group->rates->where('id_lesson', $id_lesson)->where('created_at', $date));
    }
}
