<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'name' => 'bail|required|max:150',
            'sex' => 'bail|required',
            'age' => 'bail|max:100',
            'message' => 'bail|max:1500',
            'phone' => 'bail|required|min:8|digits_between: 8,15',
            'email' => 'bail|required|email',
        ];
    }
}
