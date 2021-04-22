@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
     <section>
        <h1 class=title>
            カタログ登録ページ
        </h1>
        <form action="/account/{{ $post->id }}/storeCatalog" method="POST" enctype='multipart/form-data'>
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>カタログ画像</h2>
                    <input type="file" name="catalogImg" value="{{ old('catalogImg') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('catalogImg') }}</p>
                </li>
                <li class="form_item">
                    <h2>コメント</h2>
                    <textarea  name="catalog[catalogCmt]" placeholder="グレージュカラーです。" >{{ old('catalog.catalogCmt') }}</textarea>
                    <p class="title__error" style="color:red">{{ $errors->first('catalog.catalogCmt') }}</p>
                </li>
            </ul>
            <input type="submit" value="登録"/>
        </form>
        
    </section>

@endsection
    
@include('footer')
    

        