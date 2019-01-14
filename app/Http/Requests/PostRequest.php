<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    const FILE_EXTENDS = [
        'png',
    ];

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
    public function rules() :array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'images' => 'file|max:1024|mimes:'.implode(',',self::FILE_EXTENDS)
        ];
    }
    public function messages() : array {
        return [

            'title.required' => 'Title Không để trống',
            'category_id.required' => 'Category Không để trống'
        ];
    }

}
