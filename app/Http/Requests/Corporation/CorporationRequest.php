<?php

namespace App\Http\Requests\Corporation;

use Illuminate\Foundation\Http\FormRequest;

class CorporationRequest extends FormRequest
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
            case 'store':
                return [
                    'name' => 'required',
                ];
                break;
                
            case 'update':
                return [
                    'name' => 'required',
                ];
                break;
         }
    }
}
