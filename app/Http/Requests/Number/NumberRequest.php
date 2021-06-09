<?php

namespace App\Http\Requests\Number;

use Illuminate\Foundation\Http\FormRequest;

class NumberRequest extends FormRequest
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
                    'number' => 'required',
                    'edition' => 'required',
                    'pdf' => ''
                ];
                break;

            case 'update':
                return [
                    'number' => 'required',
                    'edition' => 'required',

                ];
                break;
         }
    }
}
