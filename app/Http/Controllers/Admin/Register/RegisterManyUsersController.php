<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\ManyParentsRegistration;
use App\Http\Requests\Registration\ManyStudentsRegistration;
use App\Http\Requests\Registration\ManyTeachersRegistration;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Users\Parents;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use App\Models\Users\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterManyUsersController extends UserService
{
    public function manyStudentsRegister(ManyStudentsRegistration $request){
        $students = $request->all()['students'];
        $group = $students['group'];
        foreach ($students as $student){

            $user = $this->userRegister($student, 'student');

            $group_id = Group::where('name',$group)->first()->id;

            Student::create([
                'user_id' => $user['id'],
                'student_cart' => $student['student_cart'],
                'group_id' => $group_id
            ]);
        }

        return response()->json(['message' => 'new students register'], 200);
    }

    public function  manyParentsRegister(ManyParentsRegistration $request){
        $parents = $request->all()['parents'];
        foreach ($parents as $parent){

            $user = $this->userRegister($parent, 'parent');

            $new_parent = Parents::create([
                'user_id' => $user['id'],
            ]);

            foreach ($parent['students'] as $student){
                $new_parent->students()->attach(Student::where('student_cart', $student['student_cart'])->first());
                $new_parent->save();
            }
        }

        return response()->json([
            'message' => 'New parents create'
        ],200);
    }

    public function manyTeachersRegister(ManyTeachersRegistration $request){
        $teachers = $request->all()['teachers'];
        foreach ($teachers as $teacher){

            $user = $this->userRegister($teacher, 'teacher');

            $teacher = Teacher::create([
                'user_id' => $user['id'],
            ]);
        }

        foreach ($teacher['lessons'] as $lesson){
            $teacher->lessons()->attach(Lesson::where('code', $lesson)->first());
            $teacher->save();
        }

        return response()->json([
            'message' => 'New teacher create'
        ],200);
    }
}
