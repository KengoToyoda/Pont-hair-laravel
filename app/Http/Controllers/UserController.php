<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作

class UserController extends Controller
{
    /**
     * stylist一覧を表示する
     * 
     * @param user userモデル
     * @return array userモデルリスト
     */
    public function index(User $user, Menu  $menu, Catalog $catalog)
    {
        return view('posts/index')->with([
            'users' => $user->get(),
            ]);
    }
    
    /**
     * 特定IDのstylistを表示する
     * 
     * @params Object user // 引数の$userはid=1のuserインスタンス
     * @return Reposnse user view
     */
   public function show(User $user, Menu $menu, Catalog $catalog)
    {
        $menus = $user->menus()->get();
        $catalogs =  $user->catalogs()->get();
        return view('posts/info/show')->with([
            'user' => $user,
            'menus' => $menus,
            'catalogs' => $catalogs,
            ]);
    }
    
    /**
     * 特定IDのmenuを表示する
     * 
     */
     public function showMenuToCust(User $user, Menu $menu, Catalog $catalog)
    {
        return view('posts/menu/showMenuToCust')->with([
                'menu' => $menu,
                ]);
    }
    
    /**
     * 特定IDのcatalogを表示する
     * 
     */
     public function showCatalogToCust(User $user, Menu $menu, Catalog $catalog)
    {
        return view('posts/catalog/showCatalogToCust')->with([
                'catalog' => $catalog,
                ]);
    }
    
       /**
     * ------------------------美容師情報関連------------------------
     */
    
    
   /**
     * 美容師情報を新規登録
     * 
     */
    //  public function create(User $user)
    //  {
    //     $user = Auth::user();
    //     return view('stylist/info/create')->with(['user' => $user]);
        
    //  }
     
    /**
     * 新規作成した投稿をDBに反映
     * @param Request $request
     * @return Response
     */
    //     public function store(User $user, UserRequest $request)
    // {
    //     //formのnameが'user[**]'の入力を$articleに格納
    //     $input = $request['user'];
    //     //formにpasswordを挿入
    //     $input['password'] = Hash::make($request['password']);
        
    //     //画像ファイルは$request-+>fileで受け取る
    //     $photo = $request->file('image');
    //     $photo_name = $photo->getClientOriginalName();
    //     //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
    //     Storage::disk('public')->putFileAs('stylist',$photo,$photo_name);
    //     $input['image'] = $photo_name;
    //     $user->fill($input)->save();
        
    //     return redirect('/account/' . $user->id);
    // }
    
    /**
     * 美容師情報を表示
     */
    
    //   public function showAccount(User $user, Menu $menu, Catalog $catalog)
    // {
    //     //メニュー情報取得
    //     $menus=$user->menus()->get();
    //     //カタログ情報取得
    //     $catalogs=$user->catalogs()->get();
    //     //ユーザー情報取得
    //     $user = Auth::user();
        
    //     return view('stylist/showAccount')->with([
    //         'user' => $user,
    //         'menus' => $menus,
    //         'catalogs' => $catalogs,
    //         ]);
    // }
    
    /**
     * 美容師情報を編集
     * 
     */
        public function edit(User $user)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $user);
        
        // $user = Auth::user();
        return view('stylist/info/edit')->with(['user' => $user]);
    }
    
    /**
     * 美容師情報を更新
     * 
     */
        public function update(UserRequest $request, User $user)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $user);
        
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
        }else{
             //画像ファイルを変更しない時
            $user->fill($input_user)->save(); //image以外を保存☆☆
        }
        
        return redirect('/account');
    }
    
    /**
     * 美容師情報を削除
     * 
     */
        public function delete(User $user)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $user);
        
        $user->delete();
        return redirect('/account');
    }
    

}
