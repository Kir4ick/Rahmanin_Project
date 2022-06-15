<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class DelUserController extends Controller
{
    public function gelUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'Пользователь удалён']);
    }
}
