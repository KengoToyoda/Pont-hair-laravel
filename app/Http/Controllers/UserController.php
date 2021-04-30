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
    public function index(User $user)
    {
        return view('posts/index')->with(['users' => $user->getPaginateByLimit()]);
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
    

}
