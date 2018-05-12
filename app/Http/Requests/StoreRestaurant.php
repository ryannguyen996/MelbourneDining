<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurant extends FormRequest
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
            'name' => 'required',
            'address1' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'numberofseats' => 'required|numeric',
            'country_id' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the Restaurant name.',
            'address1.required' => 'Please enter the Restaurant address.',
            'suburb.required' => 'Please enter the Restaurant suburb.',
            'state.required' => 'Please enter the Restaurant state.',
            'numberofseats.required' => 'Please enter the Restaurant number of seats.',
            'country_id.required' => 'Please enter the Restaurant country ID.',
            'category_id.required' => 'Please enter the Restaurant category ID.',
        ];
    }
}
