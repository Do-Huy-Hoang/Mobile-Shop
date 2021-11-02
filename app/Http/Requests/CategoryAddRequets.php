<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequets extends FormRequest
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
            'name'=>'required|unique:category|min:2|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank',
            'name.unique' => 'Names cannot be duplicated',
            'name.max' => 'Name cannot exceed 255 characters',
            'name.min' => 'Name must be greater than 4 characters',
        ];
    }
}
