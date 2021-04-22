<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Post;
use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Facades\Storage;//画像操作

class StylistController extends Controller
{
     /**
     * 美容師用管理画面を表示
     */
    public function transStylistPage()
    {
        return view('stylist/homeStylist');
    }
    
    /**
     * ------------------------美容師情報関連(posts)------------------------
     */
    
    
   /**
     * 美容師情報を新規登録
     * 
     */
     public function create()
     {

         
        return view('stylist/info/create');
     }
     
    /**
     * 新規作成した投稿をDBに反映
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
        
        return redirect('/account/' . $post->id);
    }
    
    /**
     * 美容師情報を表示
     */
    
      public function showAccount(Post $post, Menu $menu, Catalog $catalog)
    {
        //メニュー情報取得
        $menus=$post->menus()->get();
        //カタログ情報取得
        $catalogs=$post->find(1)->catalogs()->get();
        
        return view('stylist/showAccount')->with([
            'post' => $post,
            'menus' => $menus,
            'catalogs' => $catalogs,
            ]);
    }
    
    /**
     * 美容師情報を編集
     * 
     */
        public function edit(Post $post)
    {
        return view('stylist/info/edit')->with(['post' => $post]);
    }
    
    /**
     * 美容師情報を更新
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
        
        return redirect('/account/' . $post->id);
    }
    
    /**
     * 美容師情報を削除
     * 
     */
        public function delete(Post $post)
    {
        $post->delete();
        return redirect('/account');
    }
    
    /**
     * ------------------------メニュー情報関連(menus)------------------------
     */
    
    /**
     * メニュー情報を新規登録
     * 
     */
        public function createMenu(Post $post, Menu $menu)
    {
        return view('stylist/menu/CreateMenu')->with(['post' => $post]);
    }
    
    /**
     * メニュー情報をDBに反映
     */
    public function storeMenu(Menu $menu, Request $request, Post $post)
    {
        $input_menu = $request['menu'];
        $input_menu['post_id']=$post->id;
        $menu->fill($input_menu)->save();
        return redirect('/account/' . $post->id . '/' . 'menu=' . $menu->id);
        
    }
    
    /**
     * メニュー情報を表示
     */
    public function showMenu(Post $post, Menu $menu)
    {
        return view('stylist/menu/ShowMenu')->with([
                'menu' => $menu,
                ]);
    }
     
    
         /**
     * メニュー情報編集ページに飛ぶ
     */
    public function editMenu(Post $post, Menu $menu)
    {
        return view('stylist/menu/EditMenu')->with([
                'menu' => $menu,
                ]);
    }
    
     /**
     * メニュー情報を更新する
     */
    public function updateMenu(Request $request, Post $post, Menu $menu)
    {
        $input_menu_update = $request['menu'];
        $input_menu_update['post_id']=$post->id;
        $menu->fill($input_menu_update)->save();
        return redirect('/account/' . $post->id . '/' . 'menu=' . $menu->id);
    }
    
    /**
     * メニュー情報を削除
     * 
     */
        public function deleteMenu(Post $post, Menu $menu)
    {
        $menu->delete();
        return redirect('/account/' . $post->id);
    }
    
    
     /**
     * ------------------------カタログ情報関連(catalogs)------------------------
     */
    
    /**
     * カタログ情報を新規登録
     */
    public function createCatelog(Post $post, Catalog $catalog)
    {   
        return view('stylist/catalog/createCatalog')->with(['post' => $post]);
    }
    
    /**
     * カタログ情報をDBに反映
     */
    public function storeCatalog(Post $post, Request $request, Catalog $catalog)
    {
        //formのnameが'post[**]'の入力を$articleに格納
        $input = $request['catalog'];
        //親テーブルのidを取得
        $input['post_id']=$post->id;
        //画像ファイルは$request-+>fileで受け取る
        $photo = $request->file('catalogImg');
        $photo_name = $photo->getClientOriginalName();
        //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
        Storage::disk('public')->putFileAs('catalog',$photo,$photo_name);
        $input['catalogImg'] = $photo_name;
        
        $catalog->fill($input)->save();
        
        return redirect('/account/' . $post->id . '/' . 'catalog=' . $catalog->id);
    }
    
        /**
     * メニュー情報を表示
     */
    public function showCatalog(Post $post, Catalog $catalog)
    {
        return view('stylist/catalog/showCatalog')->with([
                'catalog' => $catalog,
                ]);
    }
    
}
