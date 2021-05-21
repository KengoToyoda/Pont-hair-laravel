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
         <p class="edit">[<a href="{{ route('user.catalog.edit', $catalog->id) }}">内容を編集する</a>]</p>
        </div>
        <form action="{{ route('user.catalog.delete', $catalog->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" onClick="alertFunction(event);return false;" class="btn">カタログを削除する</button>
        </form>
        <div class="Back">
            <a href="/account">マイページに戻る</a>
        </div>
    </section>
@endsection
    
@include('layouts.footer')
    

        