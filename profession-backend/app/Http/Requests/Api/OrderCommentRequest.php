<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderCommentRequest extends FormRequest
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
            'order_id' => ['required', 'numeric'],
            'overall_evaluate' => ['required', 'numeric'],
            'good_evaluate' => ['required', 'numeric'],
            'service_evaluate' => ['required', 'numeric'],
            'environment_evaluate' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'order_id.required'    =>'订单ID必须填写',
            'overall_evaluate.required'  =>'总体必须填写',
            'good_evaluate.required' =>'啥狗屁必须填写',
            'service_evaluate.required' =>'服务必须填写',
            'environment_evaluate.required' =>'环境必须填写',
        ];
    }
}
