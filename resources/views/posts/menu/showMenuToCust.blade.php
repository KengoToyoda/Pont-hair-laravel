@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <div class="content">
            <div class="content__menu">
                <h2 class="menu_title">{{ $menu->course }}</h2>
                 <ul class="menu_lsit">
                    <li class="menu_item">{{ $menu->tag }}</li>
                    <li class="menu_item">{{ $menu->price }}</li>
                    <li class="menu_item">{{ $menu->description }}</li>
                </ul>
            </div>
        </div>
        <div class="reserve">
            <a href="/reserve/stylists/{{ $user->id }}/menu={{ $menu->id }}">このメニューを予約する</a>
        </div>
        <div class="Back">
            <a href="/stylists/{{ $menu->user_id }}">戻る</a>
        </div>
    </section>
@endsection
    
@include('layouts.footer')
    

        