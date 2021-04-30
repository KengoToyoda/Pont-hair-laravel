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
            メニュー登録ページ
        </h1>
        <form action="{{ route('user.menu.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>コース名</h2>
                    <input type="text" name="menu[course]" placeholder="ワンカラー＋保湿トリートメント" value="{{ old('menu.course') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('menu.course') }}</p>
                </li>
                <li class="form_item">
                    <h2>タグ</h2>
                    <input type="text" name="menu[tag]" placeholder="カラー" value="{{ old('menu.tag') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('menu.tag') }}</p>
                </li>
                <li class="form_item">
                    <h2>料金</h2>
                    <input type="text" name="menu[price]" placeholder="¥4,400" value="{{ old('menu.price') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('menu.price') }}</p>
                </li>
                <li class="form_item">
                    <h2>詳細</h2>
                    <textarea name="menu[description]" placeholder="ブリーチは別料金となります" value="{{ old('menu.description') }}"></textarea>
                    <p class="title__error" style="color:red">{{ $errors->first('menu.description') }}</p>
                </li>
            </ul>
            <input type="submit" value="登録"/>
        </form>
        
    </section>

@endsection
    
@include('footer')
    

        