<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            'full_name' => 'required|min:5|max:120',
            'email' => 'required|email|unique:users',
            'company_name' => 'required',
            'password' => 'required|confirmed|min:10|max:120',
            'password_confirmation' => 'required',
            'mobile' => [
                'required', 'unique:users'
            ],
            'phone' => [
                'required',
                "unique:users",
            ],
            'address' => 'required',
        ];
    }
}
