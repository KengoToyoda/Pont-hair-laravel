@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
    <section>
        <h1>{{ $receiver->name }}へのDM</h1>
        <div id="app">
            <message-component
                :sender-Id="@json(Auth::id())"
                :receiver-Id="@json($receiver->id)"
                endpoint ="/chats/{{ $receiver->id }}"
            >
                
            </message-component>
        </div>
    </section>

@endsection
    
@include('layouts.footer')
    

        