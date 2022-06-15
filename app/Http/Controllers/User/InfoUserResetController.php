<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\OneParentRegistration;
use App\Http\Requests\Registration\OneStudentRegistration;
use App\Http\Requests\Registration\OneTeacherRegistration;
use App\Models\Users\Student;
use App\Models\Users\User;
use Illuminate\Http\Request;

class InfoUserResetController extends Controller
{

    public function studentInfoReset($id, Request $request){
        $user = auth('sanctum')->user();
        $student = $user->student;
        $user->update();
    }

    public function parentInfoReset($id, Request $request){

    }

    public function teacherInfoReset($id, Request $request){

    }
}
