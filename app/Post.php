<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use SoftDeletes;
    
    /**
     * fill関数が扱い可能なプロパティーを指定
     * 
     */
     protected $fillable =[
        'name',
        'age',
        'shop',
        'location',
        'style',
        'comment',
        'image',
        'email',
        'tel',
    ];
    
    /**
     * 以下ページネーション追加ー
     */
     public function getPaginateByLimit(int $limit_count = 4)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
    
    
        /**
     * Eloquent：リレーション
     * PostモデルとCatalogモデル
     */
     public function catalogs()
    {
        return $this->hasMany('App\Catalog');
    }
    
    /**
     * Eloquent：リレーション
     * 一対多
     * PostモデルとMenuモデル
     */
     public function menus()
    {
        return $this->hasMany('App\Menu');
    }
    

}
