<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    /**
     * Eloquent：リレーション
     * 一対多
     * UserモデルとLikeモデル
     * いいねしているユーザー
     */
     public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Eloquent：リレーション
     * 一対多
     * MenuモデルとLikeモデル
     * いいねしている投稿
     */
     public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    
    /**
     * メソッド：いいねが既にされているかを確認
     */
    public function like_exist($id, $menu_id){
        
        //Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Like::where('user_id', '=', $id)->where('menu_id', '=', $menu_id)->get();
        
        if(!$exist->isEmpty()){
            //レコード($exist)が存在するなら
            return true;
        } else {
            //レコードが存在しないなら
        }   return false;
        
    }
    
    
}
