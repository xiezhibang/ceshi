<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'cart_item'      => ['required'],
            'cart_item.*.cart_id' => [ // 检查 cart_item 数组下每一个子数组的 cart_id 参数
                'required',
                'numeric'
            ],
            'cart_item.*.amount'  => ['required', 'numeric', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'cart_item.required'           => '购物车数组必须填写',
            'cart_item.*.cart_id.required' => 'cart_item 数组下每一个子数组的 cart_id 必须填写',
            'cart_item.*.amount.required'  => 'cart_item 数组下每一个商品数量必须填写',
        ];
    }

}
