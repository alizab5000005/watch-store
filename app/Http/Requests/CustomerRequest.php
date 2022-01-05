<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'full_name' => 'required|alpha|min:6|max:15',
            'username' => 'required|unique:customers',
            'email' => 'required|unique:customers',
            'password' => 'required'
        ];

    }
    public function messages()
    {
        return [
            
            'username.required' => 'Please enter user name starting with an alphabet',
            'username.unique' => 'This Username is already taken'                
        ];
    }
}
