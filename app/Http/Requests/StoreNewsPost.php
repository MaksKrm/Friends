<?php

namespace App\Http\Requests;

use App\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsPost extends FormRequest
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
     //   dd($this->route('news.update')->id);
    //    dd($this);
        return [
            'title' => 'required|string|min:10|max:255',
            'article' => 'required|string|min:10|max:255',
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:8048'
        ];

        /*dd($this->request);
       switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'title' => 'required|string|min:10|max:255',
                        'article' => 'required|string|min:10|max:255',
                        'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|string|min:10|max:255',
                        'article' => 'required|string|min:10|max:255' . $this->request->id,
                        'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048' . $this->request->id,
                    ];
                }
            default:
                break;
        }*/
    }

}
