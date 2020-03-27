<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GiftBagDetailRequest extends FormRequest
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
            'gift_bag_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'gift_bag_id.required'    =>'礼包ID必须填写',
        ];
    }

}
