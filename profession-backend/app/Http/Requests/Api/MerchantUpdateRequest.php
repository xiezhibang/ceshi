<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MerchantUpdateRequest extends FormRequest
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
            'shop_name'  => ['required', 'string'],
            'desc'  => ['required', 'string'],
            'shop_province'  => ['required', 'string'],
            'shop_city'  => ['required', 'string'],
            'shop_district'  => ['required', 'string'],
            'shop_address'  => ['required', 'string'],
            'shop_mobile'  => ['required', 'numeric'],
            'longitude'  => ['required', 'numeric'],
            'latitude'  => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' =>'店铺名称必须填写',
            'desc.required' =>'简介必须填写',
            'shop_province.required' =>'店铺省份必须填写',
            'shop_city.required' =>'店铺城市必须填写',
            'shop_district.required' =>'店铺区/县必须填写',
            'shop_address.required' =>'店铺地址必须填写',
            'shop_mobile.required' =>'店铺电话必须填写',
            'longitude.required' =>'店铺的经度必须填写',
            'latitude.required' =>'店铺的纬度必须填写',
        ];
    }
}
