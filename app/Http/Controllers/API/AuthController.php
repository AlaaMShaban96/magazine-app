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
            if (!$user->verified) return response( ["message" =>'لم يتم تأكيد البريد الالكتروني ','status'=>"NOT_VERIFIED"], 422);
            if (!$user) return response(["message" =>'المستخدم غير مسجل','status'=>"NOT_REGISTRED"], 422);

                if (!auth()->attempt(['email'=>$request->email,'password'=>$request->password])) {
                    return response(['message' => 'كلمة السر غير صحيحة','status'=>"INCORRECT_PASSWORD"], 422 );
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
                Event::dispatch(new SendMail($request['email'],'sendCodeToEmail'));
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
                if (!auth()->loginUsingId($user->id))
                    return response(['error_message' => 'Incorrect Details. Please try again']);
                
                if (!($user->verified_code==$request->code)) 
                    return response(["message" =>'your email is not verified'], 422);

                $user->verified=true;
                $token = auth()->user()->createToken('API Token')->plainTextToken;
                $user->api_token=$token;
                $user->save();
                $response = ["message" =>'your email is verified','token'=>$token];
                return response($response, 200);
                
        } catch (\Throwable $th) {
                $response = ["message" =>'have problem in verified '.$th];
                return response($response, 500);
        }
      
        
        
    }
    public function sendCodeToResetPassword(AuthRequest $request)
    { 
        try {
                $user= User::where('email', $request->email)->first();
                $data=rand(100,100000);
                $user->password=Hash::make($data);
                $user->save();
                Event::dispatch(new SendMail($request['email'],'sendCodeToResetPassword',$data));
                $response = ["message" =>'send new password  to email'];
                return response($response, 200);
        } catch (\Throwable $th) {
                $response = ["message" =>'have problem in reSendCode '];
                return response($response, 500);
        }
      
        
        
    }
    public function resetPassword(AuthRequest $request)
    { 
        try {
                auth()->user()->password=Hash::make($request->newPassword);
                auth()->user()->save();
                $response = ["message" =>'created new password '];
                return response($response, 200);
        } catch (\Throwable $th) {
                $response = ["message" =>'have problem in reSendCode '];
                return response($response, 500);
        }
      
        
        
    }
}
