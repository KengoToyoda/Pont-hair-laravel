<?php

namespace App\Http\Controllers;

use App\Post;
use App\Menu;
// use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Facades\Storage;//画像操作

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)
    {
        return view('post/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのpostを表示する
     * 
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
   public function show(Post $post, Menu $menu)
    {
        $menus=$post->menus()->get();
        return view('post/show')->with([
            'post' => $post,
            'menus' => $menus,
            ]);
    }
    

}
