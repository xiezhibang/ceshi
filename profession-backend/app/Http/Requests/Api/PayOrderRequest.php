<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PayOrderRequest extends FormRequest
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
            'order_sn'     => ['required', 'string'],
            'pay_type'     => ['required', 'string'],
            'password'     => ['sometimes', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'order_sn.required'     =>'订单号必须填写',
            'pay_type.required'     =>'支付方式必须填写',
            'password.sometimes'    =>'支付密码可填写',
        ];
    }
}
