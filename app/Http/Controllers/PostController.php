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
        return view('show')->with([
            'post' => $post,
            'menu' => $menu
            ]);
    }
    
    /**
     * 特定IDのpostを作成する
     * 
     */
     public function create()
     {

         
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
        // dd('a');
        //formのnameが'post[**]'の入力を$articleに格納
        $input = $request['post'];
        //画像ファイルは$request-+>fileで受け取る
        $photo = $request->file('image');
        $photo_name = $photo->getClientOriginalName();
        //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
        Storage::disk('public')->putFileAs('stylist',$photo,$photo_name);
        $input['image'] = $photo_name;
        $post->fill($input)->save();
        
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
        dd($request);
        $input_post = $request['post'];
        $post->fill($input_post);

        
        // if($request->hasFile('image')) {
        //     Storage::delete('public/stylist/' . $post->image); //元の画像を削除☆
        //     $path = $request->file('image')->store('public/stylist');
        //     $post->image = basename($path);
        //     // $post->save();
        // }

        $post->save(); 
        
        return redirect('/posts/' . $post->id);
        ;
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
