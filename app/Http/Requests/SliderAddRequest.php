<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name'=>'bail|required|max:255|min:5',
            'description'=>'required|min:10',
            'image_path' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank',
            'name.max' => 'Name cannot exceed 255 characters',
            'name.min' => 'Name must be greater than 10 characters',
            'description.required' => 'Description cannot be blank',
            'description.min' => 'Description must be greater than 10 characters',
            'image_path.required' => 'Category cannot be blank'
        ];
    }
}
