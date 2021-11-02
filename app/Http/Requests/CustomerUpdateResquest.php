<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateResquest extends FormRequest
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
            'name_login'=> 'bail|
                     required|
                     max:255|
                     min:3',
            'name_customer'=> 'bail|
                     required|
                     max:255|
                     min:3',
            'address'=>'required|
                        min:15|
                        max:40',
            'gender'=> 'required',
            'birthday'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_login.required' => 'Name cannot be blank',
            'name_login.max' => 'Name cannot exceed 255 characters',
            'name_login.min' => 'Name must be greater than 3 characters',
            'name_customer.required' => 'Name cannot be blank',
            'name_customer.max' => 'Name cannot exceed 255 characters',
            'name_customer.min' => 'Name must be greater than 3 characters',
            'address.required' => 'Address cannot be blank',
            'address.min'=>'Invalid address number',
            'address.max'=>'Invalid address number',
            'gender.required' => 'Gender cannot be blank',
            'birthday.required' => 'Birthday cannot be blank',
        ];
    }
}
