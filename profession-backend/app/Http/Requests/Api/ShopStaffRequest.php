<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ShopStaffRequest extends FormRequest
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
            'staff_name'    => ['required', 'string'],
            'staff_account' => ['required'],
            'mobile'        => ['required', 'numeric'],
            'checkCode'     => ['required', 'numeric'],
            'status'        => ['required', 'numeric'],
            'permission_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'staff_name.required'    =>'店员名称必须填写',
            'staff_account.required' =>'店员账号必须填写',
            'mobile.required'        =>'店员联系电话必须填写',
            'checkCode.required'     =>'验证码必须填写',
            'status.required'        =>'启用状态必须填写',
            'permission_id.required' =>'店员权限ID必须填写',
        ];
    }
}
