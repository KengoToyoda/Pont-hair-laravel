@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@include('header')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!       
                <section>
                       <p><a href="account/create">美容師情報登録</a></p>
                </section>
                
                <section class="">
                    <!--美容師の個別ページ（お客様用）に飛ばす-->
                    <p class=""><a href="" class="">お客様向けページに飛ぶ</a></p>
                </section>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('footer')