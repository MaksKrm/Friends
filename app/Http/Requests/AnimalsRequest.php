<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalsRequest extends FormRequest
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
            'species' => 'bail|required',
            'breed' => 'bail|max:100',
            'sex' => 'bail|required',
            'age' => 'bail|max:100',
            'contacts' => 'bail|required|max:100',
            'main_foto' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'other_foto.*' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ];
    }
}
