@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
    <section>
        <h1 class="title">
            メニュー
        </h1>
        <div class="content">
            @foreach ($menus as $menu)
                <div class="content__menu">
                    <h2 class="menu_title"><a href="/users/menus/{{ $menu->id }}">{{ $menu->course }}</a></h2>
                     <ul class="menu_lsit">
                        <li class="menu_item">{{ $menu->tag }}</li>
                        <li class="menu_item">{{ $menu->price }}</li>
                        <li class="menu_item">{{ $menu->description }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
        
        <form class="reserve">
            <button>予約する</button>
        </form>
    </section>
@endsection
    
@include('footer')
    

        