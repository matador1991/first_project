<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'keywords_ar'=>'required',
            'keywords_en'=>'required',
            'author_ar'=>'required',
            'author_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'first_phone'=>'required|numeric',
            'address_ar'=>'required',
            'address_en'=>'required',
            'title_ar'=>'required',
            'title_en'=>'required',
            'email'=>'required|Email',
            'logo'=>'image|max:2048|mimes:jpeg,png,jpg,gif',
        ];
    }
}
