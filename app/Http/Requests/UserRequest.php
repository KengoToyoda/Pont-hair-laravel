<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'user.name' => '|string|max:100',
            'user.age' => 'required|integer',
            'user.shop' => 'required|string|max:100',
            'user.location' => 'required|string|max:100',
            'user.style' => 'required|string|max:100',
            'user.comment' => '|required|string|max:200',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
            'user.email' => 'string|max:100',
            'user.tel' => 'string|max:100',
        ];
    }
    
    public function messages()
    {
        return[
            // 'user.image.image' => '画像ファイルを選択してください' ,
            // 'user.image.required' => '画像ファイルを選択してください' ,
            // 'user.image.mimes' => '指定された拡張子（PNG/JPG/JPEG/GIF）ではありません。' ,
            
        ];
    }
}
