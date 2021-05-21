@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <h1 class="title">
            新規作成カタログ
        </h1>
        <div class="content">
            <div class="content_catalog">
                <img src="{{ asset('https://pont-storage-heroku.s3-ap-northeast-1.amazonaws.com/catalog/' . $catalog->catalogImg) }}" class="catalog_item">
                <p class="catalog_item">{{ $catalog->catalogCmt  }}</p>
            </div>
        </div>
        <div class="Back">
            <a href="/stylists/{{ $catalog->user_id }}">戻る</a>
        </div>
    </section>
@endsection
    
@include('layouts.footer')
    

        