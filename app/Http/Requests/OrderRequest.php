<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'city' => 'required|max:255',
            'customer_phone' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'address' => 'required|max:255',
            'pay_mode' => 'required|max:255',
            'products' => 'required'

        ];
    }
    public function messages()
    {
        return [
         'products.required' => 'Please add one product to the cart'
        ];
    }
}
