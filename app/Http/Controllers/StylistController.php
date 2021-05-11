<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = Auth::user();
        $input_menu = $request['menu'];
        $input_menu['user_id']=$user->id;
        $menu->fill($input_menu)->save();
        return redirect('/account/' . 'menu=' . $menu->id);
        
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
        // update, destroyでも同様に
        $this->authorize('edit', $menu);
        
        return view('stylist/menu/EditMenu')->with([
                'menu' => $menu,
                
                ]);
    }
    
    /**
     * メニュー情報を更新する
     */
    public function updateMenu(Request $request, User $user, Menu $menu)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $menu);
        
        $user = Auth::user();
        $input_menu_update = $request['menu'];
        $input_menu_update['user_id']=$user->id;
        $menu->fill($input_menu_update)->save();
        return redirect('/account/' . 'menu=' . $menu->id);
    }
    
    /**
     * メニュー情報を削除
     * 
     */
        public function deleteMenu(User $user, Menu $menu)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $menu);
        
        $user = Auth::user();
        $menu->delete();
        return redirect('/account/');
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
        $user = Auth::user();
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
        
        return redirect('/account/' . 'catalog=' . $catalog->id);
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
        $user = Auth::user();
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
        }else{
            
            //画像ファイルを変更しない時
            $catalog->fill($input)->save(); //image以外を保存☆☆
        }
        
      
        
        return redirect('/account/' . 'catalog=' . $catalog->id);
        
    }
    
    /**
     * カタログ情報を削除
     * 
     */
        public function deleteCatalog(User $user, Catalog $catalog)
    {
        $catalog->delete();
        return redirect('/account/');
    }
    
}
