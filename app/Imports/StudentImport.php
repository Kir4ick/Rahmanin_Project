<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $student){

            $group_id = Group::where('name',$student[6])->first()->id;

            $user = User::create([
                'name' => $student[0],
                'middle_name' => $student[1],
                'last_name' => $student[2],
                'login' => $student[3],
                'phone' => $student[4],
                'password' => Hash::make($student[5]),
            ]);

            $user->roles()->attach(Role::where('slug', 'student')->first());
            $user->save();

            Student::create([
                'user_id' => $user['id'],
                'student_cart' => $student[7],
                'group_id' => $group_id
            ]);
        }
    }
}
