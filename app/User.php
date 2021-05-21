<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'age',
        'shop',
        'location',
        'style',
        'comment',
        'image',
        'tel',
        'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
        /**
     * 以下ページネーション追加ー
     */
    //  public function getPaginateByLimit(int $limit_count = 4)
    // {
    //     // updated_atで降順に並べたあと、limitで件数制限をかける
    //     return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    // }
    
    /**
     * Eloquent：リレーション
     * 一対多
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
    
    /**
     * Eloquent：リレーション
     * 一対多
     * UserモデルとReserveモデル
     */
     public function reserves()
    {
        return $this->hasMany('App\Reserve');
    }
    
    /**
     * Eloquent：リレーション
     * 多対多
     * UserモデルとCategoryモデル
     */
     public function category()
    {
        return $this->belongsToMany('App\Category');
    }
    
    
    /**
     * 現在のユーザー、または引数で渡されたIDが管理者かどうかを返す
     *
     * @param  number  $id  User ID
     * @return boolean
     * 
     * A ? B : C
     * Aがtrueの場合はBを実行する
     *  Aがfalseの場合はCを実行する
     */
     
    public function isAdmin($id = null) {
        //idが存在するならidを代入し、存在しないならidを引っ張ってこい
        $id = ($id) ? $id : $this->id;
        return $id == config('admin_id');
    }
    
    public function getArticleRanking(Array $results)
    {
        $user_ids = array_keys($results);
        $ids_order = implode(',', $user_ids);
        $user_ranking = $this->whereIn('id', $user_ids)
                                ->orderByRaw(DB::raw("FIELD(id, $ids_order)"));
                                // ->paginate(10);
        return $user_ranking;
    }
    
    
}
