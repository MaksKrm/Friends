<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalsRequest extends FormRequest
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
            'name' => 'bail|max:100',
            'breed' => 'bail|max:100',
            'age' => 'bail|max:100',
            'contacts' => 'bail|max:100',
            'main_foto' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'files_.*' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ];
    }
}
