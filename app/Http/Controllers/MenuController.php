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
        return view('menu')->with(['menus' => $menu->get()]);
    }
    
     /**
     * 特定IDのmenutを作成する
     */
    public function create_menu(Post $post)
    {
        return view('create_menu')->with(['post' => $post]);

    }
    
     /**
     * 新規作成したmenuをDBに反映
     */
    public function store_menu(Menu $menu, Request $request, Post $post)
    {
        $input_menu = $request['menu'];
        $input_menu['post_id']=$post->id;
        $menu->fill($input_menu)->save();
        return redirect('/posts/' . $post->id . '/' . $menu->id);
        
    }
    
     /**
     * 個別ページに飛ぶ
     */
    public function show_menu(Post $post, Menu $menu)
    {
        return view('show_menu')->with(['menu' => $menu]);
    }
    
    
}
