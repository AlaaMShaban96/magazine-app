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
use Event;
use App\Events\SendMail;
class AuthController extends Controller
{
    public function index(Request $request)
    { 
     return new IndexResource(auth()->user());
    }
    public function login(AuthRequest $request)
    { 
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user->verified) return response( ["message" =>'your email is not verified'], 422);
            if (!$user) return response(["message" =>'User does not exist'], 422);

                if (!auth()->attempt(['email'=>$request->email,'password'=>$request->password])) {
                    return response(['error_message' => 'Incorrect Details. 
                    Please try again']);
                }
        
                $token = auth()->user()->createToken('API Token')->plainTextToken;
                $user->api_token=$token;
                $user->save();
                return new UserResourc($user);

        } catch (\Throwable $th) {
            $response = ["message" =>'have problem in login '];
            return response($response, 500);
        }
    
        
    }
    public function register(AuthRequest $request)
    { 
        try {
            $request['password']=Hash::make($request->password);
            $request['verified_code']=rand(100,100000);
            User::create($request->all());
            Event::dispatch(new SendMail($request['email']));
    
            $response = ["message" =>'send code to email'];
            return response($response, 200);
        } catch (\Throwable $th) {
            $response = ["message" =>'have problem in register '];
            return response($response, 500);
        }
       
        
        
    }
    public function reSendCode(AuthRequest $request)
    { 
        try {
                $user= User::where('email', $request->email)->first();
                $user->verified_code=rand(100,100000);
                $user->save();
                Event::dispatch(new SendMail($request['email']));
                $response = ["message" =>'resend code to email'];
                return response($response, 200);
        } catch (\Throwable $th) {
                $response = ["message" =>'have problem in reSendCode '];
                return response($response, 500);
        }
      
        
        
    }
    public function verified(AuthRequest $request)
    { 
        try {
                $user= User::where('email', $request->email)->first();
                if (!auth()->attempt(['email'=>$request->email,'password'=>$request->password])) {
                    return response(['error_message' => 'Incorrect Details. 
                    Please try again']);
                }
                if ($user->verified_code==$request->code){
                    $user->verified=true;
                    $token = auth()->user()->createToken('API Token')->plainTextToken;
                    $user->api_token=$token;
                    $user->save();
                    $response = ["message" =>'your email is verified','token'=>$token];
                    return response($response, 200);
                }else {
                    $response = ["message" =>'your email is not verified'];
                    return response($response, 200);
                }
        } catch (\Throwable $th) {
                $response = ["message" =>'have problem in verified '];
                return response($response, 500);
        }
      
        
        
    }
}
