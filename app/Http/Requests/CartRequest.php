<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'qty' => 'required',
            'name' => 'unique:carts'
        ];
    }
    public function messages()
    {
        return [
        'qty.required' => 'Product Out Of Stock!',
        'name.unique' => 'This item is already in the Cart'
        ];
    }
}
