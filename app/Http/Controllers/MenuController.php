<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Facades\Storage;//画像操作

class MenuController extends Controller
{

     /**
     * Menu一覧を表示する
     */
    public function index_menu(Menu $menu, Post $post)
    {
        return view('menu/menu')->with(['menus' => $menu->get()]);
    }
    
     /**
     * 特定IDのmenuにに飛ぶ
     */
    public function show_menu(Post $post, Menu $menu)
    {
        return view('menu/ShowMenu')->with([
                'menu' => $menu,
                ]);
    }
    
}
