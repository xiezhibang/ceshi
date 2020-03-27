<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ShopOrderListRequest extends FormRequest
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
            'shop_id'   => ['required', 'numeric'],
            'page'      => ['sometimes', 'numeric'],
            'limit'     => ['sometimes', 'numeric'],
            'status'    => ['sometimes', 'numeric'],
            //'good_name' => ['sometimes', 'string'],
            //'order_no'  => ['sometimes', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'shop_id.required'    =>'店铺ID必须填写',
            'page.sometimes'      =>'分页数可填写',
            'limit.sometimes'     =>'每页条数可填写',
            'status.sometimes'    =>'订单状态可填写',
           // 'good_name.sometimes' =>'商品名称可填写',
            //'order_no.sometimes'  =>'订单号可填写',
        ];
    }
}
