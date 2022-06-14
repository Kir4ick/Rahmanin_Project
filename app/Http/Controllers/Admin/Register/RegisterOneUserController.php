<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\OneParentRegistration;
use App\Http\Requests\Registration\OneStudentRegistration;
use App\Http\Requests\Registration\OneTeacherRegistration;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Users\Parents;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use App\Models\Users\User;
use App\Services\UserService;
use http\Env\Response;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Json;

class RegisterOneUserController extends UserService
{
    //Регистрация одного студента
    public function oneStudentRegister(OneStudentRegistration $request){
        $student = $request->all();

        $user = $this->userRegister($student, 'student');

        $group_id = Group::where('name',$student['group'])->first()->id;

        Student::create([
            'user_id' => $user['id'],
            'student_cart' => $student['student_cart'],
            'group_id' => $group_id
        ]);

        return response()->json([
            'message' => 'New student create'
        ],200);
    }
    //Регистрация одного родителя
    public function oneParentRegister(OneParentRegistration $request)
    {
        $parent = $request->all();

        $user = $this->userRegister($parent, 'parent');

        $new_parent = Parents::create([
            'user_id' => $user['id'],
        ]);

        foreach ($parent['students'] as $student){
            $new_parent->students()->attach(Student::where('student_cart', $student['student_cart'])->first());
            $new_parent->save();
        }

        return response()->json([
            'message' => 'New parent create'
        ],200);
    }
    //Регистрация одного учителя
    public function oneTeacherRegister(OneTeacherRegistration $request){
        $teacher = $request->all();
        //Регистрация пользователя
        $user = $this->userRegister($teacher, 'teacher');

        $teacher = Teacher::create([
            'user_id' => $user['id'],
        ]);

        foreach ($teacher['lessons'] as $lesson){
            $teacher->lessons()->attach(Lesson::where('name', $lesson['name'])->first());
            $teacher->save();
        }

        return response()->json([
            'message' => 'New teacher create'
        ],200);
    }
}
