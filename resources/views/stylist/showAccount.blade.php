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
            {{ $post->name }}のマイページ
        </h1>
        <div class="content">
            <div class="content__post">
                 <ul class="stylist_lsit">
                    <li class="stylist_item">{{ $post->age }}</li>
                    <li class="stylist_item">{{ $post->shop }}</li>
                    <li class="stylist_item">{{ $post->location }}</li>
                    <li class="stylist_item">{{ $post->style }}</li>
                    <li class="stylist_item">{{ $post->email }}</li>
                    <li class="stylist_item">{{ $post->tel }}</li>
                </ul>
                <h2 class="sub_title">コメント</h2>
                <p class="stylist_comment">{{ $post->comment }}</p>
                <img src="{{ asset('storage/stylist/' . $post->image) }}"> 
            </div>
        </div>
        <p class="edit">[<a href="/account/{{ $post->id }}/edit">内容を編集する</a>]</p>
        <form action="/account/{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="alertFunction()" class="btn">[DELETE]</button> 
        </form>
        
    </section>
    
    <section class="">
        <div class="To_menus">
            <div><a href="/account/{{ $post->id }}/menu">コース情報登録</a></div>
        </div>
        
        <h1>コース一覧</h1>
        @foreach($menus as $menu)
            <ul class="menu_lsit">
                <li class="menu_item"><a href="/account/{{ $post->id }}/menu={{ $menu->id }}">{{ $menu->course }}</a></li>
                <li class="menu_item">{{ $menu->tag }}</li>
                <li class="menu_item">{{ $menu->price }}</li>
                <li class="menu_item">{{ $menu->description }}</li>
            </ul>
        @endforeach

    </section>
    <section class="">
        <div class="To_catalog">
            <div><a href="/account/{{ $post->id }}/catalog">カタログ情報登録</a></div>
        </div>
        
        <h1>カタログ一覧</h1>
        @foreach($catalogs as $catalog)
            <ul class="catalog_lsit">
                <a href="/account/{{ $post->id }}/catalog={{ $catalog->id }}">
                    <li class="catalog_item"><img src="/storage/catalog/{{ $catalog->catalogImg }}"></li>
                    <li class="catalog_item">{{ $catalog->catalogCmt }}</li>
                </a>
            </ul>
        @endforeach
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