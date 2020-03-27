<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BankCardRequest extends FormRequest
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
            'bank_sn' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'bank_sn.required'    =>'银行卡号必须填写',
        ];
    }

}
