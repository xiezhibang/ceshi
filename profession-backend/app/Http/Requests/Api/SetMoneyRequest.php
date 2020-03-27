<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SetMoneyRequest extends FormRequest
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
            'money'  => ['required', 'numeric'],
            'remark' => ['sometimes', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'money.required'   =>'金额必须填写',
            'remark.sometimes' =>'收钱理由可填写',
        ];
    }
}
