<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'mobile'    => ['required', 'string'],
            'checkCode' => ['required', 'numeric'],
            'password'  => ['required', 'string'],
            'confirm_password'  => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'    =>'手机号必须填写',
            'checkCode.required' =>'验证码必须填写',
            'password.required'  =>'密码必须填写',
            'confirm_password.required'  =>'确认密码必须填写',
        ];
    }
}
