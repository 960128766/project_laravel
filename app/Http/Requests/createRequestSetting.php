<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestSetting extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:5|max:200',
            'author' => 'required|min:5|max:200',
            'keywords' => 'required|between:5,500',
            'description' => 'required|between:5,500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'مقدار عنوان شما الزامی می باشد',
            'title.min' => 'کمترین مقدار عنوان شما 5 کاراکترالزامی می باشد',
            'title.max' => 'بیشترین مقدار عنوان شما 200 کاراکترالزامی می باشد',
            'author.required' => 'مقدار نویسنده  الزامی می باشد',
            'author.min' => 'کمترین مقدار نویسنده  5 کاراکترالزامی می باشد',
            'author.max' => 'بیشترین مقدار نویسنده  200 کاراکترالزامی می باشد',
            'keywords.required' => 'مقدار کلمات کلیدی الزامی می باشد',
            'keywords.between' => 'کلمات کلیدی باید بین 5 تا 500 کاراکتر باشد',
            'description.required' => 'مقدار توضیحات  الزامی می باشد',
            'description.between' => 'توضیحات  باید بین 5 تا 500 کاراکتر باشد'
        ];
    }
}
