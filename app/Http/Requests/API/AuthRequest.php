<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1];  // The controller method
    
        switch ($method) {
            case 'login':
                return [
                    'email' => 'required|email',
                    'password' => 'required',
                ];
                break;
                
            case 'register':
                return [
                    'email' => 'required|email|unique:users,email',
                    'name' => 'required',
                    'password' => 'required',
                ];
                break;
            case 'reSendCode':
                return [
                    'email' => 'required|email',
                ];
                break;
            case 'verified':
                return [
                    'email' => 'required|email',
                    'code' => 'required',
                ];
                break;
            case 'sendCodeToResetPassword':
                return [
                    'email' => 'required|email',
                ];
            case 'resetPassword':
                return [
                    'newPassword' => 'required',
                ];
                break;
         }
        
    }
}
