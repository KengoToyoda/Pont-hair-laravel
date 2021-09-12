<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * fill関数が扱い可能なプロパティーを指定
     * 
     */
     protected $fillable =[
        'course',
        'tag',
        'price',
        'description',
        'user_id',
    ];
    
     /**
     * Eloquent：逆リレーション
     * 多対一
     * PostモデルとMenuモデル
     */
    
    public function user()
    {
        return $this->belongTo('App\User');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    
    
}
