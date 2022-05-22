<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterValidatorRequest extends FormRequest
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
            'theme_id' => 'required',
            'address_title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'total_download' => 'required',
            'download_text' => 'required',
            'total_client' => 'required',
            'client_text' => 'required',
            'subscribe_description' => 'required',
            'facebook_link' => 'required',
            'subscriber_link' => 'required',
            'privacy_link' => 'required',
            'term_link' => 'required',
            'pinterest_link' => 'required',
            'yahoo_link' => 'required',
        ];
    }
}
