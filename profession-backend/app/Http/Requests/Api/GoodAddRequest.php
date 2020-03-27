<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GoodAddRequest extends FormRequest
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
            'good_name'    => ['required', 'string'],
            'commodity_price'=> ['required', 'numeric'],
            'category_id'  => ['required', 'numeric'],
            'type'         => ['required', 'numeric'],
            'selling_price'=> ['required', 'numeric'],
            'good_integral'=> ['required', 'numeric'],
            'sku_id'       => ['required'],
//            'sku_id.*.attr_value_id' => [ // 检查 sku_id 数组下每一个子数组的 attr_value_id 参数
//                'required',
//                'numeric'
//            ],
            'limit_num'    => ['required', 'numeric'],
            'total_stock'  => ['required','numeric'],
            'state'        => ['required','numeric'],
            'order'        => ['required','numeric'],
            'good_image'   => ['required'],
            'detail_image' => ['required'],
            'description'  => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'good_name.required'    =>'商品名称必须填写',
            'commodity_price.required'  =>'商品原价必须填写',
            'category_id.required'  =>'商品分类ID必须填写',
            'type.required'  =>'是否特权 1-否 2-是必须填写',
            'selling_price.required'  =>'商品售价必须填写',
            'good_integral.required'  =>'商品积分必须填写',
            'sku_id.required'  =>'商品规格值，数组形式必须填写',
           // 'sku_id.*.attr_value_id.required'  =>'sku_id数组下每一个子数组的 attr_value_id必须填写',
            'limit_num.required'  =>'限购数量必须填写',
            'total_stock.required'  =>'商品总库存必须填写',
            'state.required'  =>'上下架 1-上架 2-下架 3-软删除必须填写',
            'order.required'  =>'排序必须填写',
            'good_image.required'  =>'商品主图必须填写',
            'detail_image.required'  =>'商品详情必须填写',
            'description.required'  =>'购买须知必须填写',
        ];
    }
}
