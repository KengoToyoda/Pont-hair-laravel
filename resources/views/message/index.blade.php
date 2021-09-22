@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <div class="">
            <h1>チャット一覧</h1>
            @foreach($users as $user)
                <a href="/chats/{{ $user->id }}">{{ $user->name }}</a><br>
            @endforeach
        </div>
    </section>

@endsection
    
@include('layouts.footer')
    

        