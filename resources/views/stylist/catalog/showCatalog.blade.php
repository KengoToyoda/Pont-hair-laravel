@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
    <section>
        <h1 class="title">
            新規作成カタログ
        </h1>
        <div class="content">
            <div class="content_catalog">
                <img src="{{ asset('storage/catalog/' . $catalog->catalogImg) }}" class="catalog_item">
                <p class="catalog_item">{{ $catalog->catalogCmt  }}</p>
            </div>
        </div>
         <p class="edit">[<a href="/account/{{ $catalog->post_id }}/{{ $catalog->id }}/edit">内容を編集する</a>]</p>
        </div>
        <form action="/account/{{ $catalog->post_id }}/{{ $catalog->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="alertFunction()" class="btn">メニューを削除する</button> 
        </form>
        <div class="Back">
            <a href="/account/{{ $catalog->post_id }}">マイページに戻る</a>
        </div>
    </section>
@endsection
    
@include('footer')
    

        