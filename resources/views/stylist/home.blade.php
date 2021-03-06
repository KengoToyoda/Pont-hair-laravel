@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@include('layouts.header')
@section('content')

<div class="container">
    <div class="pc_flex mypage_flex">
        <div class="sidebar">
            <ul class="sidebar_list">
                <li><a href="{{ route('user.edit', auth()->user()->id)}}" class="sidebar_item">
                    @auth
                        @can('edit', $user)
                            アカウント情報を編集する
                         @endcan
                    @endauth
                </a></li>
                <li><a href="{{ route('user.menu.create')}}" class="sidebar_item">コースを作成する</a></li>
                <li><a href="{{ route('user.catalog.create')}}" class="sidebar_item">カタログを作成する</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="sidebar_item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li>
                    <form action="{{ route('user.delete')}}" method="post" id="delete-form" class="sidebar_item">
                        @csrf
                        @method('DELETE')
                        <button type="submit">アカウントを削除する</button>
                    </form>    
                </li>
            </ul>
        </div>
        <div class="mypage_content">
            <section class="mp_intro">
                <div class="mp-user-info">
                    <div class="mp_stylist_img"  style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $user->image }}') center no-repeat; display:block; background-size:cover;"></div>
                    <h1 class="mp-user-name bold">
                        {{ $user->name }}さん
                    </h1>
                </div>
            </section>

            <section class="profile">
                <ul class="stylist_lsit">
                    <li class="stylist_item">年齢：{{ $user->age }}</li>
                    <li class="stylist_item">メールアドレス：{{ $user->email }}</li>
                    <li class="stylist_item">電話番号：{{ $user->tel }}</li>
                    <li class="stylist_item">ショップ：{{ $user->shop }}</li>
                    <li class="stylist_item">ショップ郵便番号：{{ $user->postal_code }}</li>
                    <li class="stylist_item">ショップ住所：{{ $user->address }}</li>
                </ul>
                <p class="sub_title bold">コメント</p>
                <p class="stylist_comment">{{ $user->comment }}</p>
                <div class="">
                    <h1 class="bold">コース一覧</h1>
                    @foreach($menus as $menu)
                        <ul class="menu_lsit">
                            <li class="menu_item"><a href="/account/menu={{ $menu->id }}">{{ $menu->course }}</a></li>
                            <li class="menu_item">{{ $menu->tag }}</li>
                            <li class="menu_item">{{ $menu->price }}</li>
                            <li class="menu_item">{{ $menu->description }}</li>
                        </ul>
                    @endforeach
            
                </div>
                <div class="">
                    <h1 class="bold">カタログ一覧</h1>
                    @foreach($catalogs as $catalog)
                        <ul class="catalog_lsit">
                            <a href="/account/catalog={{ $catalog->id }}">
                                <li class="catalog_item"><img src="{{ asset('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/catalog/' . $catalog->catalogImg) }}"></li>
                                <li class="catalog_item">{{ $catalog->catalogCmt }}</li>
                            </a>
                        </ul>
                    @endforeach
                </div>
                
                <div class="">
                    <h1 class="bold">スタイル</h1>
                    @foreach($categories as $category)
                        <ul class="catalog_lsit">
                                <li class="catalog_item">{{ $category->category }}</li>
                        </ul>
                    @endforeach
                </div>
                <div class="">
                    <h1 class="bold">いいねした投稿</h1>
                    @foreach($likedMenus as $likedMenu)
                        <ul class="catalog_lsit">
                                <li class="catalog_item">{{ $likedMenu->course }}</li>
                                <li class="catalog_item">{{ $likedMenu->tag }}</li>
                                <li class="catalog_item">{{ $likedMenu->price }}</li>
                                <li class="catalog_item">{{ $likedMenu->description }}</li>
                        </ul>
                    @endforeach
                </div>
                <div class="">
                    <h1 class="bold">相互フォロワー</h1>
                    @foreach ($users as $user)
                    <ul class="follow_user">
                        @if(in_array($user->id,Auth::user()->follow_each()))
                        　  <li>{{ $user->name }}</li>
                        @endif
                    </ul>
                    @endforeach
                </div>
                <div class="">
                    <h1 class="bold">フォロー中</h1>
                    @foreach ($users as $user)
                    <ul class="follow_user">
                        @if(in_array($user->id,Auth::user()->following_user()))
                        　  <li>{{ $user->name }}</li>
                        @endif
                    </ul>
                    @endforeach
                </div>
                <div class="">
                    <h1 class="bold">フォロワー</h1>
                    @foreach ($users as $user)
                    <ul class="follow_user">
                        @if(in_array($user->id,Auth::user()->followed_user()))
                        　  <li>{{ $user->name }}</li>
                        @endif
                    </ul>
                    @endforeach
                </div>
            </section>
            
        </div>
    </div>
</div>
@endsection

@include('layouts.footer')