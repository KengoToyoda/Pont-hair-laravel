<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
