<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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
        'address',
        'postal_code',
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
     * Eloquent：リレーション
     * 一対多
     * UserモデルとLikeモデル
     * ユーザーがいいねしている投稿を取得
     */
     public function likedMenus()
    {
        return $this->belongsToMany('App\Menu', 'likes');
    }
    
    /**
     * 自己多対多
     * フォロー機能
     * ユーザーがフォローされている人を取得（フォロワー）
     */
     public function followers()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'followed_user_id', 'following_user_id');
    }
    
    /**
     * 自己多対多
     * フォロー機能
     * ユーザーがフォローしている人を取得（フォロー）
     */
     public function followings()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'following_user_id', 'followed_user_id');
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
    
    /**
     * 相互フォローユーザーを取得
     */ 
    public function follow_each(){
        //ユーザがフォロー中のユーザを取得
        $userIds = $this->followings()->pluck('users.id')->toArray();
       //相互フォロー中のユーザを取得
        $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
       //相互フォロー中のユーザを返す
        return $follow_each;
    }
    
    /**
     * フォローしているユーザーを取得
     */ 
    public function following_user(){
        //ユーザがフォロー中のユーザを取得
        $following_user = $this->followings()->pluck('users.id')->toArray();
        return $following_user;
    }
    
    /**
     * フォローされているユーザーを取得
     */ 
    public function followed_user(){
        //ユーザがフォローされていのユーザを取得
        $followed_user = $this->followers()->pluck('users.id')->toArray();
        return $followed_user;
    }
    
    
}
