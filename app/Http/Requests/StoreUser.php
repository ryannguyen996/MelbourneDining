<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
            'country_id' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter the User name.',
            'email.required' => 'Please enter the User email.',
            'password.required' => 'Please enter the User paasword.',
            'country_id.required' => 'Please enter the Country ID.',
            'country_id.numeric' => 'Country ID must be a number.',
        ];
    }
}
