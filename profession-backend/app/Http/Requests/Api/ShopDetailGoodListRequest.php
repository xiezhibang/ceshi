<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ShopDetailGoodListRequest extends FormRequest
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
            'page'  => ['sometimes', 'numeric'],
            'limit' => ['sometimes', 'numeric'],
            'shop_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'page.sometimes'  => '分页数可填写',
            'limit.sometimes' => '每页条数可填写',
            'shop_id.required'    =>'店铺ID必须填写',
        ];
    }

}
