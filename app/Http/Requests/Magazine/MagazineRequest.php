<?php

namespace App\Http\Requests\Magazine;

use Illuminate\Foundation\Http\FormRequest;

class MagazineRequest extends FormRequest
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
                    'image' => 'required|mimes:jpg,gif,png|max:2048',
                    'available' => 'required',
                    'status' => 'required',
                    'corporation_id'=> 'required',
                    'rating_id' => 'required',
                    'country_id' => 'required'
                ];
                break;

            case 'update':
                return [
                    'name' => 'required',
                    'available' => 'required',
                    'image' => 'mimes:jpg,gif,png|max:2048',
                    'status' => 'required',
                    'corporation_id'=> 'required',
                    'rating_id' => 'required',
                    'country_id' => 'required'
                ];
                break;
        }

    }
}
