@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('layouts.header')
    
    @section('content')
        <h1>美容師情報編集画面</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <ul class="edit_list">
                <li class="edit_item">
                    <h2>名前</h2>
                    <input type="text" name="user[name]"  value="{{ $user->name }}" />
                </li>
                <li class="edit_item">
                    <h2>年齢</h2>
                    <input type="text" name="user[age]"  value="{{ $user->age }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ</h2>
                    <input type="text" name="user[shop]"  value="{{ $user->shop }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ郵便番号</h2>
                    <input type="text" name="user[postal_code]"  value="{{ $user->postal_code }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ住所</h2>
                    <input type="text" name="user[address]"  value="{{ $user->address }}" />
                </li>
                <!--<li class="edit_item">-->
                <!--    <h2>得意な施術</h2>-->
                <!--    <textarea name="user[style]">{{ $user->style }}</textarea>-->
                <!--</li>-->
                <li class="edit_item">
                    <h2>コメント</h2>
                    <textarea name="user[comment]">{{ $user->comment }}</textarea>
                </li>
                <li class="edit_item">
                    <h2>画像</h2>
                    <input type="file" name="image" value="{{ $user->image }}">
                </li>
                <li class="edit_item">
                    <h2>Email</h2>
                    <input type="text" name="user[email]"  value="{{ $user->email }}" />
                </li>
                <li class="edit_item">
                    <h2>電話番号</h2>
                    <input type="text" name="user[tel]"  value="{{ $user->tel }}" />
                </li>
                <li class="edit_item">
                    <h2>得意なスタイル</h2>
                    <input type="checkbox" name="category[]" value="" />変更しない
                    <!--ラジオボタンで変更するorしないの前処理が必要-->
                    <!--する→jsで選択肢表示-->
                    @foreach($categories as $category)
                        <input type="checkbox" name="category[]" value="{{ $category->id }}"/>{{ $category->category }}
                    @endforeach
                </li>
            </ul>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/account/{{ $user->id }}">back</a>]</div>
    @endsection
    
@include('layouts.footer')