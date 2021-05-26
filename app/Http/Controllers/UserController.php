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
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{

    /**
     * stylist一覧を表示する
     * 
     * @param user userモデル
     * @return array userモデルリスト
     */
    public function index(User $user, Menu  $menu, Catalog $catalog, Request $request)
    {
        $ranking = new RankingService;
        $results = $ranking->getRankingAll();
        $user_ranking = $user->getArticleRanking($results);
        
        $categories = Category::all();
        
        //フォームを機能させるために各情報を取得し、viewに返す
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        
        return view('posts/index')->with([
            'users' => $user->get(),
            'user_ranking' => $user_ranking,
            'results' => $results,
            'categories' =>$categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
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
        // dd($user);
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
     public function showMenuToCust(User $user, Menu $menu)
    {
        return view('posts/menu/showMenuToCust')->with([
                'menu' => $menu,
                'user' => $user,
                ]);
    }
    
    /**
     * 特定IDのcatalogを表示する
     * 
     */
     public function showCatalogToCust(User $user, Catalog $catalog)
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
        // dd($request);
        // update, destroyでも同様に
        $this->authorize('edit', $user);

        $user = Auth::user();
       
        //リレーション処理
        //場合開け
        if($request['category']){
            $user->category()->sync($request['category']);
        }
       
        // dd($user);
        
        //ユーザー処理
        //formのnameが'user[**]'の入力を$inputに格納
        $input_user = $request['user'];
        
        //画像ファイルを変更するとき
        if($request->hasFile('image')) {
            Storage::disk('s3')->delete('stylist/' . $user->image); //元の画像を削除☆
            $photo = $request->file('image');
            $photo_name = $photo->getClientOriginalName();
            //保存するディレクトリ(storage/app/public以下)、ファイル、ファイル名の順
            Storage::disk('s3')->putFileAs('stylist',$photo,$photo_name);
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
    
    
    /*==================================
    検索メソッド
    ==================================*/
    
    public function search(Request $request, User $user)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $categoryId = $request->input('categoryId'); //カテゴリの値
        
    }
    

}
