<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneUpdateResquest extends FormRequest
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
            'phone'=>'required|
                      regex:/(0)[0-9]/|not_regex:/[a-z]/|
                      min:10|
                      max:11',
        ];
    }

    public function messages(){
        return[
            'phone.required' => 'Email cannot be blank',
            'phone.regex' => 'Invalid phone number',
            'phone.min'=>'Invalid phone number',
            'phone.max'=>'Invalid phone number',
        ];
    }
}
