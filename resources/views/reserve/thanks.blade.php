@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')         
        <h1>{{ __('ご予約を受けたまりました') }}</h1>
    @endsection
    
@include('layouts.footer')