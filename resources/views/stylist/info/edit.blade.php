@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
        <h1>美容師情報編集画面</h1>
        <form action="/account/{{ $post->id }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <ul class="edit_list">
                <li class="edit_item">
                    <h2>名前</h2>
                    <input type="text" name="post[name]"  value="{{ $post->name }}" />
                </li>
                <li class="edit_item">
                    <h2>年齢</h2>
                    <input type="text" name="post[age]"  value="{{ $post->age }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ</h2>
                    <input type="text" name="post[shop]"  value="{{ $post->shop }}" />
                </li>
                <li class="edit_item">
                    <h2>アクセス</h2>
                    <input type="text" name="post[location]"  value="{{ $post->location }}" />
                </li>
                <li class="edit_item">
                    <h2>得意な施術</h2>
                    <textarea name="post[style]">{{ $post->style }}</textarea>
                </li>
                <li class="edit_item">
                    <h2>コメント</h2>
                    <textarea name="post[comment]">{{ $post->comment }}</textarea>
                </li>
                <li class="edit_item">
                    <h2>画像</h2>
                    <input type="file" name="image" value="{{ $post->image }}">
                </li>
                <li class="edit_item">
                    <h2>ショップ</h2>
                    <input type="text" name="post[email]"  value="{{ $post->email }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ</h2>
                    <input type="text" name="post[tel]"  value="{{ $post->tel }}" />
                </li>
            </ul>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/account/{{ $post->id }}">back</a>]</div>
    @endsection
    
@include('footer')