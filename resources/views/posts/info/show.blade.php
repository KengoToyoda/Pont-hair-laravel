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
                <section class="box-menu box-block">
                    <h2 class="box-title hg">{{ $user->name }}のメニュー</h2>
                        <ul class="menu-list">
                            @foreach($menus as $menu)
                                <li class="menu-item">
                                    <a class="menu-info" href="/stylists/{{ $menu->user_id }}/menu={{ $menu->id }}">
                                        <div class="menu-photo" style="background:green; color:#fff; ">写真</div>
                                        <div class="menu-summary">
                                            <div class="menu-tag ">{{ $menu->tag }}</div>
                                            <div class="menu-cource">{{ $menu->course }}</div>
                                            <div class="menu-price"><span class="">料金</span>{{ $menu->price }}</div>
                                            <div class="menu-desc">{{ $menu->description }}</div>
                                        </div>
                                    </a>
                                    <div class="menu-reserve">
                                        <a href="/reserve/stylists/{{ $user->id }}/menu={{ $menu->id }}">予約</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                </section>
            </div>
            <div class="content">
                <section class="box-block ">
                    <h2 class="box-title hg">カタログ一覧</h2>
                    <ul class="catalog-list">
                        @foreach($catalogs as $catalog)
                            <li class="catalog-item">
                                <a href="/stylists/{{ $catalog->user_id }}/catalog={{ $catalog->id }}">
                                    <div class="catalog-photo" style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/catalog/{{ $catalog->catalogImg }}')
                                    center,no-repeat; display:block; background-size:cover;"></div>
                                    <div class="catalog-desc">{!! nl2br($catalog->catalogCmt) !!}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
            <div class="content">
                口コミ
            </div>
        </div>
    </div>

     
    @endsection
    
    @include('layouts.footer')