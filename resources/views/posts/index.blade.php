@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
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
                      <form method="get" action="{{ route('searchUser') }}" >
                            <div class="search_container">
                                <input type="text" name="searchWord" value="{{ $searchWord }}"  placeholder="キーワード検索">
                            </div>
                            <select name="categoryId" class="search_container" value="{{ $categoryId }}" >
                                <option value="">カテゴリを選ぶ</option>
                              
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> 
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="fas fa-search search_icon" >検索</button>
                      </form>
                    </div>
                  </div>
                </section>
                <section class="container">
                    <h2 class="hg title">Dresser Lists</h2>
                    <div class='slider'>
                        @foreach ($users as $user)
                            <div class=slider_item>
                                <a href="/stylists/{{ $user->id }}" class="stylist_info1" style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $user->image }}') center no-repeat; height:300px; display:block; background-size:cover;">
                                    <h2 class='stylist_name'>{{ $user->name }}</h2>
                                </a>
                                <ul class="stylist_info2">
                                    <li class="stylist_item">{{ $user->age }}</li>
                                    <li class="stylist_item">{{ $user->shop }}</li>
                                    <li class="stylist_item">{{ $user->location }}</li>
                                    <li class="stylist_item">{{ $user->style }}</li>
                                    <li><p class="stylist_comment">{!! nl2br(e(Str::limit($user->comment, 50))) !!}</p></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        
            <!-- pc right lock start-->
            <div class="pc_right_block">
                <div class="ranking">
                    <h2 class="title ranking-ttl">Dresser Ranking</h2>
                    @foreach ($results as $key => $result)
                        <div class="ranking_content">
                            <a href="/stylists/{{ $users[array_search($key, array_column(($users->toArray()),'id'))]->id }}" class="stylist_info1 ranking_item" 
                            style="background:url(https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $users[array_search($key, array_column(($users->toArray()),'id'))]->image }}) center no-repeat; 
                                    height:250px;
                                    display:block;
                                background-size:cover;">
                                <h2 class='stylist_name'>{{ $users[array_search($key, array_column(($users->toArray()),'id'))]->name  }}</h2>
                            </a>
                            <p class="count_number">閲覧数：{{ $result }}</p>
                        </div>
                    @endforeach
                </di>
            </div>

            
        </div>
        


        
    @endsection
    
    @include('layouts.footer')
        
        
