<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminSettingsRequest extends FormRequest
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
        if ($request['phone']) {
            return [
                'phone' => "required|max:13|regex:'^[0-9\-\+]{9,15}$'",
            ];
        } else {
            return [
                'name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            ];
        }
    }
}
