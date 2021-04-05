<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 以下ページネーション追加
     */
        public function getPaginateByLimit(int $limit_count = 2)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
