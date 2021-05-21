@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('layouts.header')
    
    @section('content')
        <h1>カタログ編集画面</h1>
        <form action="{{ route('user.catalog.update', $catalog->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <ul class="form_list">
                <li class="form_item">
                    <h2>カタログ画像</h2>
                    <input type="file" name="catalogImg" value="{{ $catalog->catalogImg }}" />
                </li>
                <li class="form_item">
                    <h2>コメント</h2>
                    <textarea  name="catalog[catalogCmt]">{{ $catalog->catalogCmt }}</textarea>
                </li>
            </ul>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/account/catalog={{ $catalog->id }}">back</a>]</div>
    @endsection
    
@include('layouts.footer')