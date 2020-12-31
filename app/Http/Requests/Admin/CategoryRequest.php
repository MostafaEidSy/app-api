<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'          => 'required',
            'parent'        => 'nullable',
            'status'        => 'required|in:1,0',
            'slug'          => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required'             => 'Name Is Required',
            'status.required'           => 'Status Is Required',
            'status.in'                 => 'Please do not change the values for this field',
            'slug.required'             => 'Slug Is Required',
        ];
    }
}
