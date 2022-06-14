<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArrearByTeacherResource;
use App\Http\Resources\ArrearResource;
use App\Models\Arrear;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;

class ArrearController extends Controller
{

    public function arrearsByStudent(){
        return ArrearResource::collection(auth('sanctum')->user()->student->arrear);
    }

    public function arrearsOpenByStudent(){
        return ArrearResource::collection(auth('sanctum')->user()->student->arrear->where('closed', false));
    }

    public function arrearsClosedByStudent(){
        return ArrearResource::collection(auth('sanctum')->user()->student->arrear->where('closed', true));
    }

    public function arrearsByTeacher(){
        return ArrearByTeacherResource::collection(auth('sanctum')->user()->teacher->arrear);
    }

    public function arrearsOpenByTeacher(){
        return ArrearResource::collection(auth('sanctum')->user()->teacher->arrear->where('closed', false));
    }

    public function arrearsClosedByTeacher(){
        return ArrearResource::collection(auth('sanctum')->user()->teacher->arrear->where('closed', true));
    }

    public function closeTeacher($id){
        $arrear = Arrear::find($id);
        $arrear->closed = true;
        $arrear->save();
        return response()->json(['message' => 'Долг закрыт']);
    }
}
