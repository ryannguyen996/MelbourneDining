<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'content' => 'required',
            'post_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Please enter the Comment content.',
            'post_id.required' => 'Please enter the Post ID.',
            'user_id.required' => 'Please enter the User ID.',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
