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
            'main_foto' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048|dimensions:min_width=280,min_height=280',
            'files_.*' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048|dimensions:min_width=280,min_height=280',
        ];
    }
    public function messages()
    {
        return [
            'main_foto.dimensions' => 'Загружаемый файл слишком маленького разрешения , минимально (280х280)',
            'files_.*.image' => 'Загружаемые файлы должны быть фотографией',
            'files_.*.mimes' => 'Загружаемые файлы не допустимого формата',
            'files_.*.dimensions' => 'Загружаемые файлы слишком маленького разрешения , минимально (280х280)',
        ];
    }
}
