<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' =>'required|min:3',
            'subtitle' => 'required|min:3',
            'body'     => 'required|min:3|max:255',
            'image'    => 'required|image|mimes:jpg,jpeg,svg|max:2048',
            
        ];
    }
}
