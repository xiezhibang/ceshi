<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class HelpDetailShowRequest extends FormRequest
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
            'cate_id'    => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'cate_id.required'    =>'分类ID必须填写',
        ];
    }
}
