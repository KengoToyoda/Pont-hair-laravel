@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <form action="/reserve/thanks/stylists/{{$user->id}}/menu={{$menu->id}}" method="POST">
            @csrf
            <ul class="form_list">
                <li class="form_item">
                    <h2>メールアドレス</h2>
                    {{ $inputs['email'] }}
                    <input type="hidden" name="reserve[email]" value="{{ $inputs['email']}}" />
                </li>
                <li class="form_item">
                    <h2>名前</h2>
                     {{ $inputs['name'] }}
                    <input type="hidden" name="reserve[name]" value="{{ $inputs['name']}}" />
                </li>
                <li class="form_item">
                    <h2>電話番号</h2>
                     {{ $inputs['tel'] }}
                    <input type="hidden" name="reserve[tel]" value="{{ $inputs['tel']}}" />
                </li>
                <li class="form_item">
                    <h2>希望日時</h2>
                     {{ $inputs['dateTime'] }}
                    <input type="hidden" name="reserve[dateTime]" value="{{ $inputs['dateTime']}}" />
                </li>
                <li class="form_item">
                    <h2>予約メニュー</h2>
                     {{ $inputs['menu'] }}
                    <input type="hidden" name="reserve[menu]" value="{{ $inputs['menu']}}" />
                </li>
            </ul>
            <button type="submit" name="reserve[action]" value="back">
                入力内容修正
            </button>
            <button type="submit" name="reserve[action]" value="submit">
                送信する
            </button>
        </form>
    </section>
@endsection
    
@include('layouts.footer')
    

        