<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Catalog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作
use App\Libraries\RankingService;//ランキング機能

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
        $ranking = new RankingService;
        $results = $ranking->getRankingAll();
        // $user_ranking = $user->getArticleRanking($results);
        
        
        return view('posts/index')->with([
            'users' => $user->get(),
            // 'user_ranking' => $user_ranking,
            'results' => $results,
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
        
        $ranking = new RankingService;
        $ranking->incrementViewRanking($user->id);  //インクリメント

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
     * 美容師情報を編集
     * 
     */
        public function edit(User $user)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $user);
        
        $user = Auth::user();
        // $user = User::find($id);
        $categories = Category::all();
        
        return view('stylist/info/edit')->with([
            'user' => $user,
            'categories' => $categories,
            ]);
    }
    
    /**
     * 美容師情報を更新
     * 
     */
        public function update(UserRequest $request, User $user)
    {
        // update, destroyでも同様に
        $this->authorize('edit', $user);
    
        
        //リレーション処理
        $user->category()->attach($request['caetgory']);
        
        
        
        //ユーザー処理
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
