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
        // $posts = hoge();
        $menus=$post->menus()->get();
        return view('post/show')->with([
            'post' => $post,
            'menus' => $menus,
            ]);
    }
    
    /**
     * 特定IDのpostを作成する
     * 
     */
     public function create()
     {

         
        return view('post/create');
     }
     
    /**
     * 新規作成した投稿をDBに反映
     * 
     * @param Request $request
     * @return Response
     */
        public function store(Post $post, PostRequest $request)
    {
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
        return view('post/edit')->with(['post' => $post]);
    }
    
    /**
     * 特定IDのpostを更新
     * 
     */
        public function update(PostRequest $request, Post $post)
    {
       //formのnameが'post[**]'の入力を$inputに格納
        $input_post = $request['post'];
        
        //画像ファイルを変更するとき
        if($request->hasFile('image')) {
            Storage::delete('public/stylist/' . $post->image); //元の画像を削除☆
            $photo = $request->file('image');
            $photo_name = $photo->getClientOriginalName();
            //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
            Storage::disk('public')->putFileAs('stylist',$photo,$photo_name);
            $input_post['image'] = $photo_name;
            $post->fill($input_post)->save();
        }
        
        //画像ファイルを変更しない時
        $post->fill($input_post)->save(); //image以外を保存☆☆
        
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
