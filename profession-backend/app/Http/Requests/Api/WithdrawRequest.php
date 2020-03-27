<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends FormRequest
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
            'type' => ['required', 'numeric'],
            'money' => ['required', 'numeric'],
            'bank_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'type.required'    =>'提现类型必须填写',
            'money.required'    =>'提现金额必须填写',
            'bank_id.required'    =>'银行卡ID必须填写',
        ];
    }

}
