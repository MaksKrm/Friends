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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'title' => 'bail|required|string|min:3|max:100',
                        'description' => 'bail|required|string|min:10',
                        'photo' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:8048'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'bail|required|string|min:3|max:100',
                        'description' => 'bail|required|string|min:10',
                        'photo' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048'
                    ];
                }
            default:
                break;
        }
    }
}
