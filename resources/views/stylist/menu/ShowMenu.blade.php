@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
    <section>
        <h1 class="title">
            新規作成メニュー
        </h1>
        <div class="content">
            <div class="content__menu">
                <h2 class="menu_title">{{ $menu->course }}</h2>
                 <ul class="menu_lsit">
                    <li class="menu_item">{{ $menu->tag }}</li>
                    <li class="menu_item">{{ $menu->price }}</li>
                    <li class="menu_item">{{ $menu->description }}</li>
                </ul>
            </div>
        </div>
         <p class="edit">[<a href="{{ route('user.menu.edit', $menu->id)}}">内容を編集する</a>]</p>
        </div>
        <form action="{{ route('user.menu.delete', $menu->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" onClick="alertFunction(event);return false;" class="btn">メニューを削除する</button> 
        </form>
        <div class="Back">
            <a href="/account">マイページに戻る</a>
        </div>
    </section>
@endsection
    
@include('footer')
    

        