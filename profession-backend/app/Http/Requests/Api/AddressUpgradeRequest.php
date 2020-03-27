<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpgradeRequest extends FormRequest
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
            'upgrade_id' => ['required', 'numeric'],
            'shop_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'upgrade_id.required'    =>'黑金卡升级ID必须填写',
            'shop_id.required'    =>'根据地ID必须填写',
        ];
    }

}
