<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailFormValidation extends FormRequest
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
            'sender_name' => 'required',
            'subject' => 'required',
            'from_email' => 'required',
            'to_email' => 'required',
            'body' => 'required',
        ];
    }
}
