<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function attestation(Request $request){
        $id_lesson = Lesson::where('name', $request->lesson)->first()->id;
        Attestation::create([
            'semester' => $request->semester,
            'rate' => $request->rate,
            'id_lesson' => $id_lesson,
            'id_student' => $request->id_student,
            'id_teacher' => auth('sanctum')->user()->teacher->id
        ]);
        return response()->json(['message' => 'Оценка поставлена'],200);
    }

    public function attestationJournal(Request $request){
        $id_lesson = Lesson::where($request->lesson, 'name')->first()->id;
        foreach ($request->students as $student){
            Attestation::create([
                'semester' => $student['semester'],
                'rate' => $student['rate'],
                'id_lesson' => $id_lesson,
                'id_student' => $student['id_student'],
                'id_teacher' => auth('sanctum')->user()->teacher->id
            ]);
        }
        $responseDate = now();
        return response()->json(['message' => 'Журнал заполнен за '. $responseDate], 200);
    }

    public function attestations(){
        $student_id = auth('sanctum')->user()->student->id;
        $attestations = Attestation::where('student_id', $student_id)->get();
        return response()->json($attestations);
    }


}
