<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NearShopListRequest extends FormRequest
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
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'page.sometimes'      =>'分页数可填写',
            'limit.sometimes'      =>'每页条数可填写',
            'lat.required'  =>'当前用户定位的纬度必须填写',
            'lng.required' =>'当前用户定位的经度必须填写',
        ];
    }
}
