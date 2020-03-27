<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'username'      => ['required', 'string'],
            'bank_sn'       => ['required', 'string'],
            'province'      => ['required', 'string'],
            'city'          => ['required', 'string'],
            'area'          => ['required', 'string'],
            'bank_name'     => ['required', 'string'],
            'sub_bank_name' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'username.required'     =>'开户名必须填写',
            'bank_sn.required'      =>'银行卡号必须填写',
            'province.required'     =>'省份必须填写',
            'city.required'         =>'城市必须填写',
            'area.required'         =>'地区必须填写',
            'bank_name.required'    =>'银行名称必须填写',
            'sub_bank_name.required'=>'支行名称必须填写',
        ];
    }
}
