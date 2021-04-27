<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作
use Illuminate\Support\Facades\Auth;

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
     * ------------------------美容師情報関連------------------------
     */
    
    
   /**
     * 美容師情報を新規登録
     * 
     */
     public function create(User $user)
     {
        $user = Auth::user();
        return view('stylist/info/create')->with(['user' => $user]);
        
     }
     
    /**
     * 新規作成した投稿をDBに反映
     * @param Request $request
     * @return Response
     */
        public function store(User $user, userRequest $request)
    {
        //formのnameが'user[**]'の入力を$articleに格納
        $input = $request['user'];
        //画像ファイルは$request-+>fileで受け取る
        $photo = $request->file('image');
        $photo_name = $photo->getClientOriginalName();
        //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
        Storage::disk('public')->putFileAs('stylist',$photo,$photo_name);
        $input['image'] = $photo_name;
        $user->fill($input)->save();
        
        return redirect('/account/' . $user->id);
    }
    
    /**
     * 美容師情報を表示
     */
    
      public function showAccount(User $user, Menu $menu, Catalog $catalog)
    {
        //メニュー情報取得
        $menus=$user->menus()->get();
        //カタログ情報取得
        $catalogs=$user->find(1)->catalogs()->get();
        
        return view('stylist/showAccount')->with([
            'user' => $user,
            'menus' => $menus,
            'catalogs' => $catalogs,
            ]);
    }
    
    /**
     * 美容師情報を編集
     * 
     */
        public function edit(User $user)
    {
        return view('stylist/info/edit')->with(['user' => $user]);
    }
    
    /**
     * 美容師情報を更新
     * 
     */
        public function update(UserRequest $request, User $user)
    {
       //formのnameが'user[**]'の入力を$inputに格納
        $input_user = $request['user'];
        
        //画像ファイルを変更するとき
        if($request->hasFile('image')) {
            Storage::delete('public/stylist/' . $user->image); //元の画像を削除☆
            $photo = $request->file('image');
            $photo_name = $photo->getClientOriginalName();
            //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
            Storage::disk('public')->putFileAs('stylist',$photo,$photo_name);
            $input_user['image'] = $photo_name;
            $user->fill($input_user)->save();
        }
        
        //画像ファイルを変更しない時
        $user->fill($input_user)->save(); //image以外を保存☆☆
        
        return redirect('/account/' . $user->id);
    }
    
    /**
     * 美容師情報を削除
     * 
     */
        public function delete(User $user)
    {
        $user->delete();
        return redirect('/account');
    }
    
    /**
     * ------------------------メニュー情報関連(menus)------------------------
     */
    
    /**
     * メニュー情報を新規登録
     * 
     */
        public function createMenu(User $user, Menu $menu)
    {
        return view('stylist/menu/CreateMenu')->with(['user' => $user]);
    }
    
    /**
     * メニュー情報をDBに反映
     */
    public function storeMenu(Menu $menu, Request $request, User $user)
    {
        $input_menu = $request['menu'];
        $input_menu['user_id']=$user->id;
        $menu->fill($input_menu)->save();
        return redirect('/account/' . $user->id . '/' . 'menu=' . $menu->id);
        
    }
    
    /**
     * メニュー情報を表示
     */
    public function showMenu(User $user, Menu $menu)
    {
        return view('stylist/menu/ShowMenu')->with([
                'menu' => $menu,
                ]);
    }
     
    
    /**
     * メニュー情報編集ページに飛ぶ
     */
    public function editMenu(User $user, Menu $menu)
    {
        return view('stylist/menu/EditMenu')->with([
                'menu' => $menu,
                ]);
    }
    
    /**
     * メニュー情報を更新する
     */
    public function updateMenu(Request $request, User $user, Menu $menu)
    {
        $input_menu_update = $request['menu'];
        $input_menu_update['user_id']=$user->id;
        $menu->fill($input_menu_update)->save();
        return redirect('/account/' . $user->id . '/' . 'menu=' . $menu->id);
    }
    
    /**
     * メニュー情報を削除
     * 
     */
        public function deleteMenu(User $user, Menu $menu)
    {
        $menu->delete();
        return redirect('/account/' . $user->id);
    }
    
    
     /**
     * ------------------------カタログ情報関連(catalogs)------------------------
     */
    
    /**
     * カタログ情報を新規登録
     */
    public function createCatelog(User $user, Catalog $catalog)
    {   
        return view('stylist/catalog/createCatalog')->with(['user' => $user]);
    }
    
    /**
     * カタログ情報をDBに反映
     */
    public function storeCatalog(User $user, Request $request, Catalog $catalog)
    {
        //formのnameが'user[**]'の入力を$articleに格納
        $input = $request['catalog'];
        //親テーブルのidを取得
        $input['user_id']=$user->id;
        //画像ファイルは$request-+>fileで受け取る
        $photo = $request->file('catalogImg');
        $photo_name = $photo->getClientOriginalName();
        //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
        Storage::disk('public')->putFileAs('catalog',$photo,$photo_name);
        $input['catalogImg'] = $photo_name;
        
        $catalog->fill($input)->save();
        
        return redirect('/account/' . $user->id . '/' . 'catalog=' . $catalog->id);
    }
    
    /**
     * カタログ情報を表示
     */
    public function showCatalog(User $user, Catalog $catalog)
    {
        return view('stylist/catalog/showCatalog')->with([
                'catalog' => $catalog,
                ]);
    }
    
    /**
     * カタログ情報を編集する
     */
    public function editCatalog(User $user, Catalog $catalog)
    {
        return view('stylist/catalog/editCatalog')->with([
                'catalog' => $catalog,
                ]);
    }
    
     /**
     * カタログ情報を更新する
     */
    public function updateCatalog(Request $request, User $user, Catalog $catalog)
    {
        //formのnameが'user[**]'の入力を$inputに格納
        $input = $request['catalog'];
        //親テーブルのidを取得
        $input['user_id']=$user->id;
        
        //画像ファイルを変更するとき
        if($request->hasFile('catalogImg')) {
            Storage::delete('public/catalog/' . $catalog->catalogImg); //元の画像を削除☆
            $photo = $request->file('catalogImg');
            $photo_name = $photo->getClientOriginalName();
            //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
            Storage::disk('public')->putFileAs('catalog',$photo,$photo_name);
            $input['catalogImg'] = $photo_name;
            
            $catalog->fill($input)->save();
        }
        
        //画像ファイルを変更しない時
        $catalog->fill($input)->save(); //image以外を保存☆☆
        
        return redirect('/account/' . $user->id . '/catalog=' . $catalog->id);
        
    }
    
    /**
     * カタログ情報を削除
     * 
     */
        public function deleteCatalog(User $user, Catalog $catalog)
    {
        $catalog->delete();
        return redirect('/account/' . $user->id);
    }
    
}
