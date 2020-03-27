<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterRequest extends FormRequest
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
           // 'password'  => ['sometimes', 'string'],
            'checkCode' => ['required', 'numeric'],
            'uid'       => ['sometimes', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'    =>'手机号必须填写',
            //'password.sometimes'  =>'密码必须填写',
            'checkCode.required' =>'注册验证码必须填写',
            'uid.sometimes'      =>'推荐人ID可填写',
        ];
    }
}
