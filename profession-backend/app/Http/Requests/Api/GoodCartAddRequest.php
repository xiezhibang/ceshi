<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GoodCartAddRequest extends FormRequest
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
            'good_id' => ['required', 'numeric'],
            'num' => ['required', 'numeric'],
            'attribute_id' => ['required', 'numeric'],
            'sku_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'good_id.required'    =>'商品ID必须填写',
            'num.required'    =>'商品数量必须填写',
            'attribute_id.required'    =>'规格ID必须填写',
            'sku_id.required'    =>'规格值ID必须填写',
        ];
    }

}
