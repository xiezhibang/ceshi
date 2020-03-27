<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'feedback_content'      => ['required', 'string'],
            'image'       => ['sometimes'],
        ];
    }

    public function messages()
    {
        return [
            'feedback_content.required'     =>'反馈内容必须填写',
            'image.sometimes'      =>'反馈图片可填写',
        ];
    }
}
