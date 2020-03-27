<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'mobile'    => ['required', 'numeric'],
            'checkCode'  => ['required', 'numeric'],
            'new_password'  => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'    =>'手机号必须填写',
            'checkCode.required'  =>'验证码必须填写',
            'new_password.required'  =>'新密码必须填写',
        ];
    }
}
