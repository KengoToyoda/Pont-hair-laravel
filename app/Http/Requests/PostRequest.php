<?php

namespace App\Http\Requests;

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
            'post.name' => 'required|string|max:100',
            'post.age' => 'required|integer',
            'post.shop' => 'required|string|max:100',
            'post.location' => 'required|string|max:100',
            'post.style' => 'required|string|max:100',
            'post.comment' => 'required|string|max:200',
            'post.image' => 'image'
        ];
    }
    
    public function messages()
    {
        return[
            'post.image.image' => '画像ファイルを選択してください'    
        ];
    }
}
