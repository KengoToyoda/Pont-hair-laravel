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
                            <ul>
                                <li>カテゴリ</li>
                                <li>
                                    <select name="categoryId" class="form-control" value="{{ $categoryId }}" >
                                        <option value="">未選択</option>
                                      
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"> 
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                            <button type="submit" class="fas fa-search search_icon" >検索</button>
                      </form>
                    </div>
                  </div>
                </section>
                <section class="container">
                    <h2 class="hg title">検索結果</h2>
                    <div class='slider'>
                        <p>全{{ $searchedUsers->count() }}件</p>
                        @foreach ($searchedUsers as $searchedUser)
                            <div class=slider_item>
                                 <a href="/stylists/{{ $searchedUser->id }}" class="stylist_info1" style="background:url('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/stylist/{{ $searchedUser->image }}') center no-repeat; height:300px; display:block; background-size:cover;">
                                    <h2 class='stylist_name'>{{ $searchedUser->name }}</h2>
                                </a>
                                <ul class="stylist_info2">
                                    <li class="stylist_item">{{ $searchedUser->name }}</li>
                                    <li class="stylist_item">{{ $searchedUser->shop }}</li>
                                    <li class="stylist_item">{{ $searchedUser->location }}</li>
                                    <li class="stylist_item">{{ $searchedUser->style }}</li>
                                    <li><p class="stylist_comment">{{ $searchedUser->comment }}</p></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        
            <!-- pc right lock start-->
            <!--<div class="pc_right_block">-->
            <!--   
            <!--</div>-->

            
        </div>
        


        
    @endsection
    
    @include('layouts.footer')
        
        
