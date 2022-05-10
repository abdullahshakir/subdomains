<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomValidatorRequest extends FormRequest
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
            'title' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg', //|max:2048
            'section' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'file.required' => 'File is required',
            'section.required' => 'Section is required',
        ];
    }

}
