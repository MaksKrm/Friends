<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GoodsRequest extends FormRequest
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
    public function rules(Request $request)
    {
       // dd($request->all());
        return [
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:10|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048'
        ];
    }
}
