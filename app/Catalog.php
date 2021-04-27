<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    /**
     * fill関数が扱い可能なプロパティーを指定
     * 
     */
     protected $fillable =[
        'catalogImg',
        'catalogCmt',
        'user_id',
    ];
    
    /**
     * Eloquent：逆リレーション
     * 多対一
     * userモデルとCatalogモデル
     */
    
    public function catalog()
    {
        return $this->belongTo('App\User');
    }
}
