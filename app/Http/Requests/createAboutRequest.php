<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAboutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'font' => 'required|max:40',
            'color' => 'required',
            'about' => 'required|between:10,1500'
        ];
    }

    public function messages()
    {
        return [
            'font.required' => 'مقدار فونت الزامی می باشد',
            'font.max' => 'مقدار فونت بیشتر از 40 پیکسل نباشد',
            'color.required' => 'مقدار رنکگ الزامی است',
            'about.required' => 'مقدار درباره ما الزامی می باشد',
            'font.between' => 'مقدار درباره ما باید بین 10 تا 1500 کاراکتر باشد',
        ];
    }
}
