@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
        <h1>Dresser Lists</h1>
        <div class='users'>
            @foreach ($users as $user)
                <div class='user'>
                    <h2 class='name'><a href="/stylists/{{ $user->id }}">{{ $user->name }}</a></h2>
                    <ul class="stylist_info">
                        <li class="stylist_item">{{ $user->age }}</li>
                        <li class="stylist_item">{{ $user->shop }}</li>
                        <li class="stylist_item">{{ $user->location }}</li>
                        <li class="stylist_item">{{ $user->style }}</li>
                    </ul>
                    <p class="stylist_comment">{{ $user->comment }}</p>
                    <img src="/storage/stylist/{{ $user->image }}" alt="images" width="300" height="300">
                </div>
            @endforeach
        </div>
        <div class="pagnate">
            {{ $users->links() }}
        </div>
        
        <div class="To_menyu">
            <a class="" href="/menus">メニュ一覧をみる</a>    
        </div>
    @endsection
    
    @include('footer')
        
        
