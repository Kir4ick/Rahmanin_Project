<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Register\RegisterOneUserController;
use App\Http\Controllers\Admin\Register\RegisterManyUsersController;
use App\Http\Controllers\Admin\Register\RegisterExcelUsersController;
use App\Http\Controllers\Admin\Data\GetDataUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\User\EmailAndPasswordResetController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\AttestationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::put('/email/reset', [EmailAndPasswordResetController::class, 'emailReset']);
Route::put('/password/reset', [EmailAndPasswordResetController::class, 'passReset']);

Route::get('/rate/{group}/{lesson}/{date}', [RateController::class, 'getJournal']);
Route::get('/rate/{lesson}/{rate}', [RateController::class, 'getStudentsByRateAndLesson']);
Route::post('/rate', [RateController::class, 'rateNew']);
Route::put('/rate/{id}', [RateController::class, 'putRate']);
Route::delete('/rate/{id}', [RateController::class, 'delRate']);
Route::post('/journal', [RateController::class, 'rateJournal']);

Route::post('/attestation',[AttestationController::class, 'attestation']);
Route::post('/attestation/journal', [AttestationController::class, 'attestationJournal']);
Route::get('/attestations', [AttestationController::class, 'attestations']);
//'middleware' => 'role:admin'
//'middleware' => 'auth:sanctum'
Route::group([], function (){
    Route::get('/me', [AuthController::class, 'user']);
    Route::group([], function (){
        //Регистрация групп пользователей: по одному, списком и через импорт excel таблицы
        Route::post('/one/student', [RegisterOneUserController::class, 'oneStudentRegister']);
        Route::post('/one/parent', [RegisterOneUserController::class, 'oneParentRegister']);
        Route::post('/one/teacher',[RegisterOneUserController::class, 'oneTeacherRegister']);
        Route::post('/many/students', [RegisterManyUsersController::class, 'manyStudentsRegister']);
        Route::post('/many/parents', [RegisterManyUsersController::class, 'manyParentsRegister']);
        Route::post('/many/teachers', [RegisterManyUsersController::class, 'manyTeachersRegister']);
        Route::post('/excel/students', [RegisterExcelUsersController::class, 'excelRegisterStudents']);
        Route::post('/excel/parents', [RegisterExcelUsersController::class, 'excelRegisterParents']);
        Route::post('/excel/teachers', [RegisterExcelUsersController::class, 'excelRegisterTeachers']);
    });
    //Вывод всех пользователей
    Route::get('/student/{id}', [GetDataUserController::class, 'getStudentById']);
    Route::get('/students/{offset}', [GetDataUserController::class, 'getStudents']);
    Route::get('/students/by-parent/{id}', [GetDataUserController::class, 'getStudentsByParents']);
    Route::get('/parents/{offset}', [GetDataUserController::class, 'getParents']);
    Route::get('/parent/{id}', [GetDataUserController::class, 'getParentById']);
    Route::get('/parents/by-student/{id}', [GetDataUserController::class, 'getParentsByStudent']);
    Route::get('/teacher/{id}', [GetDataUserController::class, 'getTeacher']);
    Route::get('/teachers/{offset}', [GetDataUserController::class, 'getTeachersById']);

    Route::group([], function (){
        Route::get('/groups', [GroupController::class , 'getGroups']);
        Route::get('/group/{name}',[GroupController::class, 'getGroupByName']);
        Route::get('/group/{id}', [GroupController::class, 'getGroup']);
        Route::post('/new/group', [GroupController::class, 'newGroup']);
        Route::put('/group/{id}', [GroupController::class, 'putGroup']);
        Route::post('/excel/groups', [GroupController::class, 'excelImportGroups']);
        Route::get('/students/group/{id}', [GroupController::class, 'getStudentsByGroup']);
        Route::delete('/group/{id}' , [GroupController::class, 'deleteGroup']);

        Route::get('/lessons', [LessonController::class, 'getLesons']);
        Route::get('/lesson/{id}', [LessonController::class, 'getLesson']);
        Route::get('/lesson/{name}', [LessonController::class, 'getLessonByName']);
        Route::put('/lesson/{id}', [LessonController::class, 'putLesson']);
        Route::post('/new/lesson', [LessonController::class, 'newLesson']);
        Route::post('/excel/lesson', [LessonController::class, 'importExcelLessons']);
        Route::get('/teacher/lesson/{id}' , [LessonController::class, 'getTeachersByLessons']);
        Route::delete('/lesson/{id}', [LessonController::class, 'deleteLesson']);
    });
    //Изменение данных пользователей

});



