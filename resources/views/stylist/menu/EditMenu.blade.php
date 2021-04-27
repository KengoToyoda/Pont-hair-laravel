@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
        <h1>メニューを編集</h1>
        <form action="/account/{{ $menu->user_id }}/menu={{ $menu->id }}" method="POST">
            @csrf
            @method('PUT')
            <ul class="edit_list">
                <li class="edit_item">
                    <h2>コース名</h2>
                    <input type="text" name="menu[course]"  value="{{ $menu->course }}" />
                </li>
                <li class="edit_item">
                    <h2>タグ</h2>
                    <input type="text" name="menu[tag]"  value="{{ $menu->tag }}" />
                </li>
                <li class="edit_item">
                    <h2>料金</h2>
                    <input type="text" name="menu[price]"  value="{{ $menu->price }}" />
                </li>
                <li class="edit_item">
                    <h2>詳細</h2>
                    <input type="text" name="menu[description]"  value="{{ $menu->description }}" />
                </li>
            </ul>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/account/{{ $menu->user_id }}/menu={{ $menu->id }}">back</a>]</div>
    @endsection
    
@include('footer')