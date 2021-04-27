@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
    <section class="">
        <h1 class="title">
            {{ $user->name }}
        </h1>
        <div class="content">
            <div class="content__user">
                <h2 class="sub_title">マイページ</h2>
                 <ul class="stylist_lsit">
                    <li class="stylist_item">{{ $user->age }}</li>
                    <li class="stylist_item">{{ $user->shop }}</li>
                    <li class="stylist_item">{{ $user->location }}</li>
                    <li class="stylist_item">{{ $user->style }}</li>
                </ul>
                <h2 class="sub_title">コメント</h2>
                <p class="stylist_comment">{{ $user->comment }}</p>
                <img src="{{ asset('storage/stylist/' . $user->image) }}"> 
            </div>
        </div>
        <p class="edit">[<a href="/users/{{ $user->id }}/edit">内容を編集する</a>]</p>
    </section>
    
    <section class="">
        <h1>コース一覧</h1>
        @foreach($menus as $menu)
            <ul class="menu_lsit">
                <li class="menu_item"><a href="/users/{{ $user->id }}/{{ $menu->id }}">{{ $menu->course }}</a></li>
                <li class="menu_item">{{ $menu->tag }}</li>
                <li class="menu_item">¥{{ $menu->price }}</li>
                <li class="menu_item">¥{{ $menu->description }}</li>
            </ul>
        @endforeach
        <div class="To_menus">
            <a href="/create/{{ $user->id }}">コースを登録する</a>
        </div>
    </section>
    <section class="">
        <h1>口コミ一覧</h1>
        <ul class="comments_list">
            <li class="comments_item"><a href="">口コミ</a></li>
        </ul>
        
    </section>
    
    
    <footer>
        <a href="/">戻る</a>
    </footer>

    @endsection
    
    @include('footer')