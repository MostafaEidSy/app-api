<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'      => 'required',
            'detail'    => 'array|required'
        ];
    }
    public function messages(){
        return [
            'name.required'     => 'Name Is Required',
            'detail.required'   => 'The Fields Is Required',
            'detail.array'      => 'Please fill in all fields'
        ];
    }
}
