<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassResquest extends FormRequest
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
            'password'=> 'required',
            'password_new'=>'required|
                        min: 8|
                        regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]/',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Password cannot be blank',
            'password_new.required' => 'Password cannot be blank',
            'password_new.regex'=> 'Password must contain at least one uppercase letter, one lowercase letter and a number',
        ];
    }
}
