<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateSliderRequest extends FormRequest
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
            'image' => 'max:5000|mimes:jpg,jpeg,png',
            'alt' => 'required|between:5,100',
            'caption' => 'required|between:5,500',
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'نبیاد مقدار عکس از 5 مگابایت بیشتر باشد',
            'image.mimes' => 'فرمت عکس باید از انواع مشخص باشد',
            'alt.required' => 'مقدار اسم عکس  الزامی می باشد',
            'alt.between' => 'مقدار نام عکس باید بین 5 تا 100 کاراکتر باشد',
            'caption.required' => ' مقدار زیرنویس  الزامی می باشد',
            'caption.between' => 'مقدار زیرنویس باید بین 5 تا 500 کارکتر باشد',
        ];

    }
}
