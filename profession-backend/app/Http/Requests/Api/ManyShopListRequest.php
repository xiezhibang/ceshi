<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ManyShopListRequest extends FormRequest
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
            'page'       => ['sometimes', 'numeric'],
            'limit'       => ['sometimes', 'numeric'],
            'shop_name'       => ['sometimes', 'string'],
            'good_name'       => ['sometimes', 'string'],
            'category_id'       => ['sometimes', 'numeric'],
            'address'       => ['sometimes', 'string'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'page.sometimes'      =>'分页数可填写',
            'limit.sometimes'      =>'每页条数可填写',
            'shop_name.sometimes'      =>'商家名称可填写',
            'good_name.sometimes'      =>'商品名称可填写',
            'category_id.sometimes'      =>'商品分类ID可填写',
            'address.sometimes'      =>'地区可填写',
            'lat.required'  =>'手机当前所在的纬度必须填写',
            'lng.required' =>'手机当前所在的经度必须填写',
        ];
    }
}
