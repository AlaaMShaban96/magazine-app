<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\AuthRequest;
use App\Http\Resources\User\UserResourc;
use App\Http\Resources\Index\IndexResource;

class AuthController extends Controller
{
    public function index(Request $request)
    { 
        // dd(auth('api')->user());
     return new IndexResource(auth('api')->user());
    }
    public function login(AuthRequest $request)
    { 
 
        $user = User::where('email', $request->email)->first();
        // dd($user);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
               $user->api_token=$token;
               $user->save();
                return new UserResourc($user);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
}
