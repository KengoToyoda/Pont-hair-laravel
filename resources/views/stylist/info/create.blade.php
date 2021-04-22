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
                    <h2>名前</h2>
                    <input type="text" name="post[name]" placeholder="名前" value="{{ old('post.name') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.name') }}</p>
                </li>
                <li class="form_item">
                    <h2>年齢</h2>
                    <input type="text" name="post[age]" placeholder="22" value="{{ old('post.age') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.age') }}</p>
                </li>
                <li class="form_item">
                    <h2>ショップ</h2>
                    <input type="text" name="post[shop]" placeholder="OCEAN TOKYO HARAJUKU" value="{{ old('post.shop') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.shop') }}</p>
                </li>
                <li class="form_item">
                    <h2>アクセス</h2>
                    <input type="text" name="post[location]" placeholder="原宿駅徒歩5分" value="{{ old('post.location') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.location') }}</p>
                </li>
                <li class="form_item">
                    <h2>得意な施術</h2>
                    <textarea name="post[style]" placeholder="韓国カラー">{{ old('post.style') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.style') }}</p>
                </li>
                <li class="form_item">
                    <h2>コメント</h2>
                    <textarea name="post[comment]" placeholder="カラー・トリートメントモデル募集しています。夜21時以降可能です。">{{ old('post.comment') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.comment') }}</p>
                </li>
                <li class="form_item">
                    <h2>写真</h2>
                    <input name="image" type="file" value="{{ old('image') }}">
                    <p class="body__error" style="color:red">{{ $errors->first('image') }}</p>
                </li>
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    <input type="text" name="post[email]" placeholder="xxxxxxxx@gmail.com" value="{{ old('post.email') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.email') }}</p>
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                    <input type="text" name="post[tel]" placeholder="080xxxxxxxx" value="{{ old('post.tel') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.tel') }}</p>
                </li>
            </ul>
            <input type="submit" value="登録"/>
        </form>
    
        <div class="back">[<a href="/">back</a>]</div>
    @endsection
    
    @include('footer')