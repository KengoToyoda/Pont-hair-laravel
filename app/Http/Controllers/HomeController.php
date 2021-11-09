<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Catalog;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Like $likes)
    {
        //ログイン中のユーザー情報取得  
        $user = Auth::user();
        //全てのユーザー取得
        $users = User::all();
        //メニュー情報取得
        // $menus = $user->menus()->get();
        $menus = User::find($user->id)->menus;
        //カタログ情報取得
        $catalogs = $user->catalogs()->get();
        
        $categories = $user->category()->get();
        
        //ユーザーいいねした全投稿を取得
        $user_id = $user->id;
        //いいねしたメニューをとってくる
        $likedMenus = $user->likedMenus()->get();
        
        return view('stylist/home')->with([
            'user' => $user,
            'users' => $users,
            'menus' => $menus,
            'catalogs' => $catalogs,
            'categories' => $categories,
            'likedMenus' => $likedMenus,
            ]);
    }
}
