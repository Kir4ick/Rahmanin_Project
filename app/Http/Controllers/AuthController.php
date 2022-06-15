<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\ParentResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if(Auth::attempt($request->all())){
            $user = Auth::user();
            $role = $user->roles[0]->slug;
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => 'Авторизован',
                'role' => $role,
                'token' => $token
            ]);
        }
        return response()->json([
            'message' => 'User not found'
        ], 401);
    }

    public function user(){
        $user = auth('sanctum')->user();
        $role = $user->roles[0]->slug;
        switch ($role){
            case 'student':
                    return new StudentResource($user->student);
            case 'parent':
                    return new ParentResource($user->parent);
            case 'teacher':
                    return new TeacherResource($user->teacher);
            case 'admin':
                    return new AdminResource($user->admin);
            default:
                    return response()->json([
                        'message' => 'Ты что такое вообще?'
                    ], 400);
        }
    }

    public function logout(){
        \auth('sanctum')->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Вы успешно вышли'
        ], 200);
    }
}
