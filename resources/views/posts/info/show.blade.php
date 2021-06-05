@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('layouts.header')
    
    @section('content')
    <div class="wrapper indi_page">
        <!--<section class="">-->
        <!--    <h1 class="title">-->
        <!--        -->
        <!--    </h1>-->
        <!--    <div class="content">-->
        <!--        <div class="content__user">-->
        <!--             <ul class="stylist_lsit">-->
        <!--                <li class="stylist_item"></li>-->
        <!--                <li class="stylist_item"></li>-->
        <!--                <li class="stylist_item" id="address">{{ $user->address }}</li>-->
        <!--                <li class="stylist_item">{{ $user->postal_code }}</li>-->
        <!--            </ul>-->
        <!--            <h2 class="sub_title">コメント</h2>-->
        <!--            <p class="stylist_comment">{{ $user->comment }}</p>-->
        <!--            <img src="{{ asset('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/' . $user->image) }}"> -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <section class="box-basic box-block" style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/images/eye_catch/eye_catch2.jpg')
            bottom,no-repeat; display:block; background-size:cover;">
            <div class="box-basic-wrap">
                <div class="profile-photo"
                style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $user->image }}') 
                center no-repeat; display:block; background-size:cover;">
                </div>
                <div class="profile-content">
                   <div class="profile-name fg">{{ $user->name }}</div>
                   <div class="profile-detail">
                       <div class="profile-shop">ショップ：{{ $user->shop }}</div>
                   </div>
                </div>
            </div>
        </section>
        <nav class="box_nav">
            <ul>
                <li><a href="profile">トップ</a></li>
                <li><a href="photo_garary">メニュー</a></li>
                <li><a href="">カタログ</a></li>
                <li><a href="">口コミ</a></li>
            </ul>
        </nav>
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
      
    </div>

     
    @endsection
    
    @include('layouts.footer')