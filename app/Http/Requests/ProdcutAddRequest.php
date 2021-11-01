<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdcutAddRequest extends FormRequest
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

            'name' => 'bail|required|unique:products|max:255|min:5',
            'price'=>'required|max:9|min:6',
            'category_id' => 'required',
            'contents' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank',
            'name.unique' => 'Names cannot be duplicated',
            'name.max' => 'Name cannot exceed 255 characters',
            'name.min' => 'Name must be greater than 10 characters',
            'price.required' => 'Price must be greater than 0',
            'price.min'=>'Minimum price to enter is 100,000',
            'price.max'=>'The highest price to enter is 1,000,000,000',
            'category_id.required' => 'Category cannot be blank',
            'contents.required' => 'Content cannot be blank',
        ];
    }
}
