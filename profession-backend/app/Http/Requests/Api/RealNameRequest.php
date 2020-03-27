<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RealNameRequest extends FormRequest
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
            'name'       => ['required', 'string'],
            'card_code'  => ['required', 'string'],
            'address'    => ['required', 'string'],
            'card_front' => ['required'],
            'card_back'  => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'       =>'姓名必须填写',
            'card_code.required'  =>'身份证必须填写',
            'address.required'    =>'出生所在地必须填写',
            'card_front.required' =>'身份证正面必须填写',
            'card_back.required'  =>'身份证反面必须填写',
        ];
    }
}
