<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RemoveStaffRequest extends FormRequest
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
            'staff_id'  => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'staff_id.required'  =>'店员ID（可以传单个ID，也可以传ID数组）必须填写',
        ];
    }
}
