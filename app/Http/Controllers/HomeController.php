<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Catalog;
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
    public function index(User $user)
    {
        //ユーザー情報取得
        $user = Auth::user();
        //メニュー情報取得
        $menus=$user->menus()->get();
        //カタログ情報取得
        $catalogs=$user->catalogs()->get();

        
        return view('stylist/home')->with([
            'user' => $user,
            'menus' => $menus,
            'catalogs' => $catalogs,
            ]);
    }
}
