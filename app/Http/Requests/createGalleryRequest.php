<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createGalleryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'required|max:5000|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'مقدار عکس الزامی است',
            'image.max' => 'سایز عکس نباید از 5مگابایت بیشتر باشد',
            'image.mimes' => 'باید فرمت مشخص شده باشد'
        ];
    }
}
