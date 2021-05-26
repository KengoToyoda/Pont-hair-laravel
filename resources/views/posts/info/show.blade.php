@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('layouts.header')
    
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
                    <li class="stylist_item" id="address">{{ $user->address }}</li>
                    <li class="stylist_item">{{ $user->postal_code }}</li>
                </ul>
                <h2 class="sub_title">コメント</h2>
                <p class="stylist_comment">{{ $user->comment }}</p>
                <img src="{{ asset('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/' . $user->image) }}"> 
            </div>
        </div>
    </section>
    
    <section class="">
        <h1>コース一覧</h1>
        @foreach($menus as $menu)
            <ul class="menu_lsit">
                <li class="menu_item"><a href="/stylists/{{ $menu->user_id }}/menu={{ $menu->id }}"><h2>{{ $menu->course }}</h2></a></li>
                <li class="menu_item">{{ $menu->tag }}</li>
                <li class="menu_item">¥{{ $menu->price }}</li>
                <li class="menu_item">¥{{ $menu->description }}</li>
            </ul>
        @endforeach
    </section>
    
    <section class="">
        <h1>カタログ一覧</h1>
        @foreach($catalogs as $catalog)
            <ul class="menu_lsit">
                <a href="/stylists/{{ $catalog->user_id }}/catalog={{ $catalog->id }}">
                    <li class="catalog_item"><img src="{{ asset('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/catalog/' . $catalog->catalogImg) }}"></li>
                    <li class="catalog_item">{{ $catalog->catalogCmt }}</li>
                </a>
            </ul>
        @endforeach
    </section>

<div id="gmap"></div><!-- 地図を表示する div 要素（id="map"）-->

<script type="text/​javascript">

</script> 
      


    @endsection
    
    @include('layouts.footer')