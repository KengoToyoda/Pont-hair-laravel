@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
        <h1>美容師登録ページ</h1>
        <form action="/account" method="POST" enctype='multipart/form-data'>
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>名前</h2>
                    <input type="text" name="user[name]" value="{{ Auth::user()->name }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.name') }}</p>
                </li>
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
                    <h2>ショップ郵便番号</h2>
                    <input type="text" name="user[postal_code]" placeholder="2520000" value="{{ old('user.postal_code') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.postal_code') }}</p>
                </li>
                <li class="form_item">
                    <h2>ショップ住所</h2>
                    <input type="text" name="user[address]" placeholder="原宿3-2-1" value="{{ old('user.address') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.address') }}</p>
                </li>
                <!--<li class="form_item">-->
                <!--    <h2>得意な施術</h2>-->
                <!--    <textarea name="user[style]" placeholder="韓国カラー">{{ old('user.style') }}</textarea>-->
                <!--    <p class="body__error" style="color:red">{{ $errors->first('user.style') }}</p>-->
                <!--</li>-->
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
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    <input type="text" name="user[emal]" value="{{ Auth::user()->email }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('user.emal') }}</p>
                </li>
            </ul>
            <input type="submit" value="登録"/>
        </form>
    
        <div class="back">[<a href="/">back</a>]</div>
    @endsection
    
    @include('layouts.footer')