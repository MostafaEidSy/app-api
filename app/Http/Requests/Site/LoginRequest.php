<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'username'  => 'required|min:5',
            'password'  => 'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'username.required'     => 'Benutzername wird benötigt',
            'username.min'          => 'Der Benutzername muss mindestens 5 Zeichen lang sein',
            'password.required'     => 'Passwort wird benötigt',
            'password.min'          => 'Das Passwort muss mindestens 8 Zeichen lang sein'
        ];
    }
}
