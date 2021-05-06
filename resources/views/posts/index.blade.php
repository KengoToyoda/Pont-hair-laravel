@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
        <!-- pc left lock start-->
        <div class="top_title_bg">
           <h1><a href="/" class="top_title fm">Pont hair</a></h1>
        </div>
        <div class="pc_flex">
            <div class="pc_left_block">
                <!--検索フォーム -->
                <section class="service_wrap">
                  <div class="top_model_reserve pont">
                    <div class="top_model_reserve_inner">
                      <h2 class="hg title">施術別で美容師を探す</h2>
                      <form method="get" action="/" class="search_container">
                        <input type="text" name="s" value=""  placeholder="キーワード検索">
                        <i type="submit" class="fas fa-search search_icon"></i>
                      </form>
                      <ul class="fg">
                        <li class="cut"><a href="">カット</a></li>
                        <li class="color"><a href="">カラー</a></li>
                        <li class="treatment"><a href="">トリートメント</a></li>
                        <li class="hairarenge"><a href="<">ヘアアレンジ</a></li>
                      </ul>
                    </div>
                  </div>
                </section>
                <section class="container">
                    <h2 class="hg title">Dresser Lists</h2>
                    <div class='slider'>
                        @foreach ($users as $user)
                            <div class=slider_item>
                                <a href="/stylists/{{ $user->id }}" class="stylist_info1" style="background:url('/storage/stylist/{{ $user->image }}') center no-repeat; height:300px; display:block; background-size:cover;">
                                    <h2 class='stylist_name'>{{ $user->name }}</h2>
                                </a>
                                <ul class="stylist_info2">
                                    <li class="stylist_item">{{ $user->age }}</li>
                                    <li class="stylist_item">{{ $user->shop }}</li>
                                    <li class="stylist_item">{{ $user->location }}</li>
                                    <li class="stylist_item">{{ $user->style }}</li>
                                    <li><p class="stylist_comment">{{ $user->comment }}</p></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </section>
                
            </div>
        
            <!-- pc right lock start-->
            <div class="pc_right_block">
                <p>
                    ああああああああああああああああああああああああああああああああ
                    <br>
                    ああああああああああああああああああああああああああああああああ
                </p>
            </div>
        </div>
    @endsection
    
    @include('footer')
        
        
