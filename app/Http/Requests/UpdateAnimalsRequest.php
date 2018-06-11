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
            'name' => 'max:100',
            'breed' => 'max:100',
            'age' => 'max:100',
            'contacts' => 'max:100',
            'main_foto' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'files_.*' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ];
    }
}
