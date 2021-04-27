@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
        <h1>美容師登録ページ</h1>
        <form action="/account" method="POST" enctype='multipart/form-data'>
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>年齢</h2>
                    <input type="text" name="user[age]" placeholder="22" value="{{ old('user.age') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.age') }}</p>
                </li>
                <li class="form_item">
                    <h2>ショップ</h2>
                    <input type="text" name="user[shop]" placeholder="OCEAN TOKYO HARAJUKU" value="{{ old('user.shop') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.shop') }}</p>
                </li>
                <li class="form_item">
                    <h2>アクセス</h2>
                    <input type="text" name="user[location]" placeholder="原宿駅徒歩5分" value="{{ old('user.location') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.location') }}</p>
                </li>
                <li class="form_item">
                    <h2>得意な施術</h2>
                    <textarea name="user[style]" placeholder="韓国カラー">{{ old('user.style') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('user.style') }}</p>
                </li>
                <li class="form_item">
                    <h2>コメント</h2>
                    <textarea name="user[comment]" placeholder="カラー・トリートメントモデル募集しています。夜21時以降可能です。">{{ old('user.comment') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('user.comment') }}</p>
                </li>
                <li class="form_item">
                    <h2>写真</h2>
                    <input name="image" type="file" value="{{ old('image') }}">
                    <p class="body__error" style="color:red">{{ $errors->first('image') }}</p>
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                    <input type="text" name="user[tel]" placeholder="080xxxxxxxx" value="{{ old('user.tel') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.tel') }}</p>
                </li>
            </ul>
            <input type="submit" value="登録"/>
        </form>
    
        <div class="back">[<a href="/">back</a>]</div>
    @endsection
    
    @include('footer')