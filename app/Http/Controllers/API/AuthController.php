<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthRequest;
use App\Http\Resources\User\UserResourc;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    { 
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::guard()->logout();
       
        if (auth()->attempt($credential, $request->member)) {
           if (auth()->user()->email_verified_at==null) {
                return response()->json(['error'=> 'الرجاء التاكد من البريد الالكتروني لتفعيل الحساب'],401);
           }
                return new UserResourc(auth()->user);            
        }else {
            return response()->json(['error'=> 'البيانات المدخلة خطأ'],401);
        }
    }
}
