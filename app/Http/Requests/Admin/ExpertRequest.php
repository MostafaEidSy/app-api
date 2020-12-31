<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'          => 'required',
            'description'   => 'required',
            'image'         => 'required|image|mimes:png,jpg,gif'
        ];
    }
    public function messages(){
        return [
            'name.required'             => 'Name Is Required',
            'description.required'      => 'Description Is Required',
            'image.required'            => 'Image Is Required',
            'image.image'               => 'This field should be an image only',
            'image.mimes'               => 'Supported extensions are png, jpg, gif only'
        ];
    }
}
