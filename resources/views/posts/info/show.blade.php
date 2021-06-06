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
        <section class="box-basic box-block" style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/images/eye_catch/eye_catch2.jpg')
            bottom,no-repeat; display:block; background-size:cover;">
            <div class="box-basic-wrap">
                <div class="profile-photo"
                style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $user->image }}') 
                center no-repeat; display:block; background-size:cover;">
                </div>
                <div class="profile-content">
                   <h1 class="profile-name hg">{{ $user->name }}</h1>
                   <div class="profile-detail">
                       <div class="profile-shop">ショップ：{{ $user->shop }}</div>
                   </div>
                </div>
            </div>
        </section>
        <nav>
            <ul class="box_nav">
                <li class="tab active">トップ</li>
                <li class="tab">メニュー</li>
                <li class="tab">カタログ</li>
                <li class="tab">口コミ</li>
            </ul>
        </nav>
        <div class="content-area">
            <div class="content show">
                <section class="box-block box-comment">
                    <h2 class="box-title hg">{{ $user->shop }}所属　{{ $user->name }}さんのアピールポイント</h2>
                    <div class="comment-fav">
                        <h3 class="box-sub-title hg">得意な施術</h3>
                        <ul class="comment-fav-list">
                            @foreach($categories as $category)
                                <li class="comment-fav-item hg">{{ $category->category }}</li>
                            @endforeach
                         </ul>
                    </div>
                    <h3 class="box-sub-title hg">コメント</h3>
                    <p class="comment-desc">{!! nl2br($user->comment) !!}</p>
                </section>
                
                <section class="box-block box-shop">
                    <h2 class="box-title hg">{{ $user->shop }}の情報</h2>
                    <div class="box-shop-wrap">
                        <div id="gmap"></div>   
                        <div class="shop-map">
                            <dl>
                                <dt>ショップ名</dt>
                                <dd>{{ $user->shop }}</dd>
                            </dl>
                            <dl>
                                <dt>郵便番号</dt>
                                <dd>{{ $user->postal_code  }}</dd>
                            </dl>
                            <dl>
                                <dt>住所</dt>
                                <dd id="address">{{ $user->address }}</dd>
                            </dl>
                        </div>
                    </div>
        
                </section>
            </div>
            <div class="content">
                <section class="">
                    <h1>コース一覧</h1>
                    @foreach($menus as $menu)
                        <ul class="menu_lsit">
                            <li class="menu_item"><a href="/stylists/{{ $menu->user_id }}/menu={{ $menu->id }}"><h2>{{ $menu->course }}</h2></a></li>
                            <li class="menu_item">{{ $menu->tag }}</li>
                            <li class="menu_item">{{ $menu->price }}</li>
                            <li class="menu_item">{{ $menu->description }}</li>
                        </ul>
                    @endforeach
                </section>
            </div>
            <div class="content">
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
            </div>
            <div class="content">
                口コミ
            </div>
        </div>
    </div>

     
    @endsection
    
    @include('layouts.footer')