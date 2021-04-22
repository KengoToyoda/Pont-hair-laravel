@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('header')
    
    @section('content')
        <h1 class="title">美容師用マイページ</h1>
        <section>
           <ul class="">
               <li><a href="account/create">美容師情報登録</a></li>
           </ul>
        </section>
        <section class="">
            <!--美容師の個別ページ（お客様用）に飛ばす-->
            <p class=""><a href="" class="">お客様向けページに飛ぶ</a></p>
        </section>
       
    @endsection
    
    @include('footer')
        
        
