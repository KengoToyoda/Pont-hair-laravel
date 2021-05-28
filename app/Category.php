<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category',
    ];
    
    /**
     * Eloquent：リレーション
     * 多対多
     * UserモデルとCategoryモデル
     * カテゴリを所有するユーザーを取得
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
