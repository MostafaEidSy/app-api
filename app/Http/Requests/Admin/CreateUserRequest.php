<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'          => 'required|min:5',
            'email'         => 'required|email',
            'password'      => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'name.required'         => '',
            'name.min'              => '',
            'email.required'        => '',
            'email.email'           => '',
            'password.required'     => '',
            'password.min'          => '',
        ];
    }
}
