<?php

namespace App\Http\Controllers;

use App\Post;
// use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 

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
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのpostを表示する
     * 
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
   public function show(Post $post, Menu $menu)
    {
        return view('show')->with(['post' => $post], ['menu' => $menu]);
    }
    
    /**
     * 特定IDのpostを作成する
     * 
     */
     public function create()
     {
        // if(isset($request->image)) {
        //     $path = $request->file('image')->store('images', 'public');
        //     $image = basename($path);
        // }else {
        //     $image = '';
        // } 
         
        return view('create');
     }
     
    /**
     * 新規作成した投稿をDBに反映
     * 
     * @param Request $request
     * @return Response
     */
        public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        $path = $request->file('image')->store('public/stylist');
        $post->image = basename($path);
        $post->save();
        
        return redirect('/posts/' . $post->id);
    }
    /**
     * 特定IDのpostを編集
     * 
     */
        public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    
    /**
     * 特定IDのpostを更新
     * 
     */
        public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    /**
     * 特定IDのpostを削除
     * 
     */
        public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

}
