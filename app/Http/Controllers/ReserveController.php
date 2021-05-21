<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Menu;
use App\Catalog;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Storage;//画像操作
use App\Libraries\RankingService;//ランキング機能
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;

class ReserveController extends Controller
{
    /**
     * 予約フォーム表示
     * UserContoroller showMenuToCustからの続き
     **/ 
    public function showReserve(User $user, Menu $menu)
    {
        return view('reserve.form')->with([
            'user' => $user,
            'menu' => $menu,
            ]);
    }
    
    /**
     * 予約フォーム確認
     **/
     public function confirm(Request $request, User $user, Menu $menu){
         $inputs = $request['reserve'];
         
         return view('reserve.confirm')->with([
            'user' => $user,
            'menu' => $menu,
            'inputs' => $inputs,
             ]);

     }
     
    
    /**
     * メールの自動送信設定
     **/
    public function send(Request $request, User $user, Menu $menu) 
    {
        // $user->all();
        // dd($user);
        $first_request = $request['reserve'];
        //フォームから受け取ったactionの値を取得
        $action = $first_request['action'];
        //フォームから受け取ったactionを除いたinputの値を取得
        // $inputs = $request['reserve']->except('action');
        $reserves = Arr::except($first_request, ['action']);
        // dd($reserves);
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect('/reserve/stylists/'. $user->id . '/menu=' . $menu->id)
                ->withInput($reserves);
        } else {
            Mail::send('reserve.mail', [
                'reserves' => $reserves,
                'user' => $user,
                ], function($reserves,$user){
                    dd($user);
                    $reserves->to($user->email)
                            ->subject('予約確認メール');
            });
            
        //再送信を防ぐためにトークンを再発行
        $request->session()->regenerateToken();

        return view('reserve.thanks')->with([
            'user' => $user,
            'menu' => $menu,
            'reserves' => $reserves,
            ]);
            
        }
        
    }
}
