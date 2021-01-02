<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'fullName'          => 'required|min:5',
            'username'          => 'required|min:5|unique:users',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:8'
        ];
    }
    public function messages(){
        return [
            'fullName.required'         => 'Vollständiger Name ist erforderlich',
            'fullName.min'              => 'Der vollständige Name muss mindestens 5 Zeichen enthalten',
            'email.required'            => 'E-Mail ist erforderlich',
            'email.email'               => 'E-Mail ist ungültig',
            'email.unique'              => 'Diese E-Mail existiert bereits',
            'password.required'         => 'Passwort wird benötigt',
            'password.min'              => 'Das Passwort muss mindestens 8 Zeichen lang sein',
            'username.required'         => 'Benutzername wird benötigt',
            'username.min'              => 'Der Benutzername muss mindestens 5 Zeichen lang sein',
            'username.unique'           => 'Benutzername existiert bereits',
        ];
    }
}
