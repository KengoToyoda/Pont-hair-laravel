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
        'body',
        'style',
    ];
    
    /**
     * 以下ページネーション追加
     */
    public function getPaginateByLimit(int $limit_count = 2)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
