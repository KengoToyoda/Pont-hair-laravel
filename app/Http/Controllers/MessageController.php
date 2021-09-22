<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        //ログインユーザーのidと一致しないユーザを取得
        $users = User::where('id', '<>', Auth::id())->get();
        return view('message/index', compact('users'));
    }
    
    public function show(User $receiver){
        return view('message/show', compact('receiver'));
    }
    
    
    public function get(User $receiver) 
    {
        $query = Message::where('sender', Auth::id())->where('receiver', $receiver->id)->orWhere(function($query) use($receiver){
            $query->where('sender', $receiver->id)->where('receiver', Auth::id());
        });
        $messages = $query->get();
        return $messages;
    }
    
    public function create(Request $request){
        $message = Message::create($request->all());
        event(new MessageCreated($message));->toOthers();
        // broadcast(new MessageCreated($message))->toOthers();
        return $message;
    }
}
