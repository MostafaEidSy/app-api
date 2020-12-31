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
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
            'birthday'      => 'nullable|date',
            'avatar'        => 'nullable|image|mimes:png,jpg,gif'
        ];
    }
    public function messages(){
        return [
            'name.required'         => 'Name Is Required',
            'name.min'              => 'The Name Must Be At Least 5 Characters',
            'email.required'        => 'Email Is Required',
            'email.email'           => 'Email Is Invalid',
            'email.unique'          => 'This email already exists',
            'password.required'     => 'Password Is Required',
            'password.min'          => 'The Password Must Be At Least 8 Characters',
            'birthday.date'         => 'Birth Day Is Date',
            'avatar.image'          => 'This field should be an image only',
            'avatar.mimes'          => 'Supported extensions are png, jpg, gif only'
        ];
    }
}
