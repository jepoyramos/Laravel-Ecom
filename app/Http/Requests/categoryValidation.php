<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryValidation extends FormRequest
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
        /*dd($this->method());*/

        if ($this->method() == 'POST' ) {
            return [
                'name' => 'required',
                'image' => 'required',
            ];
        }else{
            return [
                'name' => 'required',
            ];

        }

    }


    public function messages()//overwrites default error messages 
    {
        return [
            'name.required' => 'Category name is required',//custom error message
            'image.required' => 'Category image is required',
        ];
    }
}
