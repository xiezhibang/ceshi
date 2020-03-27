<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BlackUpgradeRequest extends FormRequest
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
            'company_name'    => ['required', 'string'],
            'social_code'  => ['required', 'string'],
            'province'  => ['required', 'string'],
            'city'  => ['required', 'string'],
            'district'  => ['required', 'string'],
            'address'  => ['required', 'string'],
            'username'  => ['required', 'string'],
            'mobile'  => ['required', 'numeric'],
            'license_image'  => ['required'],
            'front_identity_card'  => ['required'],
            'side_identity_card'  => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'company_name.required'    =>'公司名称必须填写',
            'social_code.required'  =>'社会信用代码必须填写',
            'province.required'  =>'省份必须填写',
            'city.required'  =>'城市必须填写',
            'district.required'  =>'区/县必须填写',
            'address.required'  =>'注册地址必须填写',
            'username.required'  =>'姓名必须填写',
            'mobile.required'  =>'电话必须填写',
            'license_image.required'  =>'营业执照必须填写',
            'front_identity_card.required'  =>'身份证正面必须填写',
            'side_identity_card.required'  =>'身份证反面必须填写',
        ];
    }
}
