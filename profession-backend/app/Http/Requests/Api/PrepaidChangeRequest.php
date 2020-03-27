<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PrepaidChangeRequest extends FormRequest
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
            'pay_type' => 'required|string',
            'money'    => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'pay_type.required' =>'支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付 必须填写',
            'money.required'    =>'充值金额必须填写',
        ];
    }
}
