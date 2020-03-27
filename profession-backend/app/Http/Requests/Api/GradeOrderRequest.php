<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GradeOrderRequest extends FormRequest
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
            'pay_type'     => ['required', 'string'],
            'upgrade_type' => ['required', 'numeric'],
            'money'        => ['required', 'numeric'],
            'fee_type'     => ['required', 'numeric'],
            'password'     => ['sometimes', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'pay_type.required'     =>'支付方式必须填写',
            'upgrade_type.required' =>'升级类型必须填写',
            'money.required'        =>'支付金额必须填写',
            'fee_type.required'     =>'订单类型必须填写',
            'password.sometimes'    =>'支付密码可填写',
        ];
    }
}
