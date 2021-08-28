<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="@yield('keywords')">
        
        <!-- Styles -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <!--style.scssのコンパイル先-->
        <link href="{{ asset('scss/style.css') }}" rel="stylesheet" >
        
        <!--jQuery読み込み-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <!--Material UI-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        
        <!-- Js -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/sample.js') }}" type="text/javascript"></script>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgJa1MRBSDZT4VGZuGyDqywoHMR1-OlAE&callback=initMap">
        </script>
    </head>
    <body>
        <div class="wrap">
            @yield('header')
            <section class="contents">
                    <!-- コンテンツ -->
                    @yield('content')
            </section>
            @yield('footer')
        </div>
    </body>
</html>


