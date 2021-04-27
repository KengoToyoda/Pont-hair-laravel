<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Catalog;
// use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作

class UserController extends Controller
{
    /**
     * user一覧を表示する
     * 
     * @param user userモデル
     * @return array userモデルリスト
     */
    public function index(User $user)
    {
        return view('user/index')->with(['users' => $user->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのuserを表示する
     * 
     * @params Object user // 引数の$userはid=1のuserインスタンス
     * @return Reposnse user view
     */
   public function show(User $user, Menu $menu)
    {
        $menus=$user->menus()->get();
        return view('user/show')->with([
            'user' => $user,
            'menus' => $menus,
            ]);
    }
    

}
