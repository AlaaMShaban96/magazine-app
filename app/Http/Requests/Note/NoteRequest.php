<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
                    'title' => 'required',
                    'body' => 'required|max:2048',
                    'number_id' => 'required',
                    // 'user_id' => 'required',
                ];
                break;

            case 'update':
                return [
                    'title' => 'required',
                    'body' => 'required|max:2048',
                    'number_id' => 'required',
                    // 'user_id' => 'required',
                ];
                break;
        }

    }
}
