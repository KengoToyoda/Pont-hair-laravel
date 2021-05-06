@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@include('header')
@section('content')

<div class="container">
    <div class="pc_flex">
        <div class="sidebar">
            <ul class="sidebar_list">
                <li><a href="" class="sidebar_item">ああああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">あああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああああ</a></li>
                <li><a href="" class="sidebar_item">ああああああああああああああ</a></li>
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
                    <li class="stylist_item">{{ $user->age }}</li>
                    <li class="stylist_item">{{ $user->shop }}</li>
                    <li class="stylist_item">{{ $user->location }}</li>
                    <li class="stylist_item">{{ $user->style }}</li>
                    <li class="stylist_item">{{ $user->email }}</li>
                    <li class="stylist_item">{{ $user->tel }}</li>
                </ul>
                <p class="sub_title">コメント</p>
                <p class="stylist_comment">{{ $user->comment }}</p>
                @auth
                    @can('edit', $user)
                        <p class="edit">[<a href="{{ route('user.edit', auth()->user()->id)}}">内容を編集する</a>]</p>
                        
                        <!--<form action="{{ route('user.delete') }}}" method="post" style="display:inline">-->
                        <!--    @csrf-->
                        <!--    @method('DELETE')-->
                        <!--    <button type="submit" name="delete" onClick="alertFunction(event);return false;" class="btn">美容師情報を削除する</button>-->
                        <!--</form>-->
                     @endcan
                @endauth
                        
                <div class="">
                    <div class="To_menus">
                        <div><a href="{{ route('user.menu.create')}}">コース情報登録</a></div>
                    </div>
                    
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
                    <div class="To_catalog">
                        <div><a href="{{ route('user.catalog.create')}}">カタログ情報登録</a></div>
                    </div>
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