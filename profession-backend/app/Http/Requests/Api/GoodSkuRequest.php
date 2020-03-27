<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GoodSkuRequest extends FormRequest
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
            'items'      => ['required'],
            'items.*.attribute_id' => ['required', 'numeric'],
            'items.*.type'  => ['required', 'numeric'],
            'items.*.sku_name'  => ['required', 'string'],
            'items.*.money'  => ['required', 'numeric', 'min:1'],
            'items.*.stock'  => ['required', 'numeric'],
        ];

    }

    public function messages()
    {
        return [
            'items.required'           => '规格值数组必须填写',
            'items.*.attribute_id.required' => 'items 数组下每一个规格ID必须填写',
            'items.*.type.required'  => 'items 数组下每一个类型 1-价格 2-积分必须填写',
            'items.*.sku_name.required'  => 'items 数组下每一个规格选项名称必须填写',
            'items.*.money.required'  => 'items 数组下每一个积分或者价格必须填写',
            'items.*.stock.required'  => 'items 数组下每一个库存必须填写',
        ];
    }
}
