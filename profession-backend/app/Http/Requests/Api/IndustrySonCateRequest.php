<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class IndustrySonCateRequest extends FormRequest
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
            'industry_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'industry_id.required'    =>'行业ID必须填写',
        ];
    }

}
