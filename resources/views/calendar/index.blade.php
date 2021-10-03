@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <div id="app">
          <calendar-component></calendar-component>
        </div>
    </section>
    
@endsection
    
@include('layouts.footer')
    

        