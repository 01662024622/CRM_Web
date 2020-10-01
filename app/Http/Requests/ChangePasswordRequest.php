<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
        return [
            'old_passowrd' => 'required|min:8',
            'new_passowrd' => 'required|min:8',
            'ver_passowrd' => 'required|same:new_passowrd|min:8',
        ];
    }

}
