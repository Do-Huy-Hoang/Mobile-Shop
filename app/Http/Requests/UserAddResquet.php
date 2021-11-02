<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddResquet extends FormRequest
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
           'name'=> 'bail|
                     required|
                     max:255|
                     min:3',
            'email'=>'required|
                      email|
                      unique:users|
                      regex:/(.*)@gmail\.com/',
            'password'=>'required|
                        min: 8|
                        regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]/',
            'role_id'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank',
            'name.max' => 'Name cannot exceed 255 characters',
            'name.min' => 'Name must be greater than 3 characters',
            'email.unique' => 'Email cannot be duplicated',
            'email.required' => 'Email cannot be blank',
            'email.regex' => 'Email must @gmail.com',
            'password.required' => 'Password cannot be blank',
            'password.regex'=> 'Password must contain at least one uppercase letter, one lowercase letter and a number',
            'role_id' => 'Select role cannot be blank'
        ];
    }
}
