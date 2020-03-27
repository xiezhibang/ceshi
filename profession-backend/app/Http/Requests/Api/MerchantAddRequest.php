<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MerchantAddRequest extends FormRequest
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
            'type'    => ['required', 'numeric'],
            'industry_pid'  => ['required', 'numeric'],
            'industry_son_id'  => ['required', 'numeric'],
            'shop_name'  => ['required', 'string'],
            'desc'  => ['required', 'string'],
            'shop_province'  => ['required', 'string'],
            'shop_city'  => ['required', 'string'],
            'shop_district'  => ['required', 'string'],
            'shop_address'  => ['required', 'string'],
            'shop_mobile'  => ['required', 'numeric'],
            'longitude'  => ['required', 'numeric'],
            'latitude'  => ['required', 'numeric'],
            'company_name'  => ['required', 'string'],
            'social_code'  => ['required', 'string'],
            'company_province'  => ['required', 'string'],
            'company_city'  => ['required', 'string'],
            'company_district'  => ['required', 'string'],
            'company_address'  => ['required', 'string'],
            'username'  => ['required', 'string'],
            'phone'  => ['required'],
            'license_image'  => ['required'],
            'front_identity_card'  => ['required'],
            'side_identity_card'  => ['required'],
            'league_id'  => ['required', 'numeric'],
            'engineer_image'  => ['sometimes'],
            'shop_image'  => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'type.required'    =>'入驻类型必须填写',
            'industry_pid.required'  =>'一级行业分类ID必须填写',
            'industry_son_id.required' =>'二级行业分类ID必须填写',
            'shop_name.required' =>'店铺名称必须填写',
            'desc.required' =>'简介必须填写',
            'shop_province.required' =>'店铺省份必须填写',
            'shop_city.required' =>'店铺城市必须填写',
            'shop_district.required' =>'店铺区/县必须填写',
            'shop_address.required' =>'店铺地址必须填写',
            'shop_mobile.required' =>'店铺电话必须填写',
            'longitude.required' =>'店铺的经度必须填写',
            'latitude.required' =>'店铺的纬度必须填写',
            'company_name.required' =>'公司名称必须填写',
            'social_code.required' =>'社会信用代码必须填写',
            'company_province.required' =>'公司省份必须填写',
            'company_city.required' =>'公司城市必须填写',
            'company_district.required' =>'公司区/县必须填写',
            'company_address.required' =>'公司注册地址必须填写',
            'username.required' =>'用户名称必须填写',
            'phone.required' =>'用户电话必须填写',
            'license_image.required' =>'营业执照必须填写',
            'front_identity_card.required' =>'身份证正面必须填写',
            'side_identity_card.required' =>'身份证反面必须填写',
            'league_id.required' =>'项目ID必须填写',
            'engineer_image.sometimes' =>'中资联加盟凭证可填写',
            'shop_image.required' =>'店铺图片必须填写',
        ];
    }
}
