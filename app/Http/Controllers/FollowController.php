<?php

namespace App\Http\Controllers;

use App\User;
use App\FollowUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user, FollowUser $follow_user){
        //フォローした際のid登録
        $follow = FollowUser::create([
            //フォローした人のid = ログイン中のユーザーid
            'following_user_id' => Auth::user()->id,
            //フォローされた人のid = 閲覧中のユーザーid
            'followed_user_id' => $user->id, 
        ]);
        
        //フォロワー数をカウント
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        
        return response()->json(['followCount', $followCount]);
    }
    
    public function unfollow(User $user){
        $follow = FollowUser::where('following_user_id', Auth::user()->id)
                            ->where('followed_user_id', $user->id)
                            ->first();
        
        if ($follow) {
            $follow->delete();
            return false;
        }
        
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }
}
