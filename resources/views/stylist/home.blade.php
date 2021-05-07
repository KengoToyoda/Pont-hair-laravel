@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@include('header')
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
            </ul>
        </div>
        <div class="mypage_content">
            <section class="mp_intro">
                <div class="mp-user-info">
                    <div class="mp_stylist_img"  style="background:url('storage/stylist/{{ $user->image }}') center no-repeat; display:block; background-size:cover;"></div>
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
                    <li class="stylist_item">所属店舗：{{ $user->shop }}</li>
                    <li class="stylist_item">所属店舗の最寄り駅：{{ $user->location }}</li>
                    <li class="stylist_item">得意な施術{{ $user->style }}</li>
                </ul>
                <p class="sub_title">コメント</p>
                <p class="stylist_comment">{{ $user->comment }}</p>
                <div class="">
                    <h1>コース一覧</h1>
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
                    <h1>カタログ一覧</h1>
                    @foreach($catalogs as $catalog)
                        <ul class="catalog_lsit">
                            <a href="/account/catalog={{ $catalog->id }}">
                                <li class="catalog_item"><img src="/storage/catalog/{{ $catalog->catalogImg }}"></li>
                                <li class="catalog_item">{{ $catalog->catalogCmt }}</li>
                            </a>
                        </ul>
                    @endforeach
                </div>
                
                <div class="">
                    <h1>口コミ一覧</h1>
                    <ul class="comments_list">
                        <li class="comments_item"><a href="">口コミ</a></li>
                    </ul>
                    
                </div>
            </section>
            
        </div>
    </div>
    
   
    

                <div class="card-body">
                    
                </div>

</div>
@endsection

@include('footer')