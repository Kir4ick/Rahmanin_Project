<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelRequest;
use App\Imports\ParentImport;
use App\Imports\StudentImport;
use App\Imports\TeacherImport;
use Maatwebsite\Excel\Facades\Excel;

class RegisterExcelUsersController extends Controller
{
    public function excelRegisterStudents(ExcelRequest $request){
        Excel::import(new StudentImport, $request->file('file'));
        return response()->json(['message' => 'Новые студенты созданы'], 200);
    }

    public function excelRegisterParents(ExcelRequest $request){
        Excel::import(new ParentImport(), $request->file('file'));
        return response()->json(['message' => 'Новые родители созданы'], 200);
    }

    public function excelRegisterTeachers(ExcelRequest $request){
        Excel::import(new TeacherImport(), $request->file('file'));
        return response()->json(['message' => 'Новые учителя созданы'], 200);
    }
}
