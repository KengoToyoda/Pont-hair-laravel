@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <form action="/reserve/confirm/stylists/{{ $user->id }}/menu={{ $menu->id }}" method="POST">
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    <input type="text" name="reserve[email]" placeholder="origin@gmail.com" value="{{ old('reserve.email') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('reserve.email') }}</p>
                </li>
                <li class="form_item">
                    <h2>名前</h2>
                    <input type="text" name="reserve[name]" placeholder="山田太郎" value="{{ old('reserve.name') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('reserve.name') }}</p>
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                    <input type="text" name="reserve[tel]" placeholder="08012340000" value="{{ old('reserve.tel') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('reserve.tel') }}</p>
                </li>
                <li class="form_item">
                    <h2>希望日時</h2>
                    <input type="datetime-local" name="reserve[dateTime]" placeholder="2021-06-01T18:00" value="{{ old('reserve.dateTime') }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('reserve.dateTime') }}</p>
                </li>
                <li class="form_item">
                        <h2>予約メニュー</h2>
                        <input type="text" name="reserve[menu]" value="{{ $menu->course }}" />
                        <p class="title__error" style="color:red">{{ $errors->first('reserve.tel') }}</p>
                </li>
            </ul>
            <button type="submit">
                入力内容確認
            </button>
        </form>
    </section>
@endsection
    
@include('layouts.footer')
    

        