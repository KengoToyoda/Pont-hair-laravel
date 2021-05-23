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
                    <li class="stylist_item">{{ $user->address }}</li>
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


    <div id="gmap" style=""></div> <!-- 地図を表示する領域 -->
    <p id="address">350 Fifth Ave New York</p> <!-- 住所 -->
      
    <script>
    function initMap() {
      //地図を表示する領域の div 要素のオブジェクトを変数に代入
      var target = document.getElementById('gmap');  
      //HTMLに記載されている住所の取得
      var address = document.getElementById('address').textContent; 
      //ジオコーディングのインスタンスの生成
      var geocoder = new google.maps.Geocoder();  
      
      //geocoder.geocode() にアドレスを渡して、コールバック関数を記述して処理
      geocoder.geocode({ address: address }, function(results, status){
      //ステータスが OK で results[0] が存在すれば、地図を生成
         if (status === 'OK' && results[0]){  
            new google.maps.Map(target, {
            //results[0].geometry.location に緯度・経度のオブジェクトが入っている
              center: results[0].geometry.location,
              zoom: 14
            });
         }else{ 
         //ステータスが OK 以外の場合や results[0] が存在しなければ、アラートを表示して処理を中断
           alert('失敗しました。理由: ' + status);
           return;
         }
      });
    }
    </script> 
    
    <!--<section class="">-->
    <!--    <h1>口コミ一覧</h1>-->
    <!--    <ul class="comments_list">-->
    <!--        <li class="comments_item"><a href="">口コミ</a></li>-->
    <!--    </ul>-->
        
    <!--</section>-->
    
    
    <footer>
        <a href="/">戻る</a>
    </footer>

    @endsection
    
    @include('layouts.footer')