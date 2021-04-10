<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
        /**
     * Menu一覧を表示する
     * 
     */
    public function index_menu(Menu $menu)
    {
        return view('menu')->with(['menus' => $menu->get()]);
    }
    
    
}
