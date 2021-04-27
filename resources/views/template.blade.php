<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="@yield('keywords')">
        
        <!-- Styles -->
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- Js -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/sample.js') }}" type="text/javascript"></script>

    </head>
    <body>
        @yield('header')
        
        <section class="contents">
            <!-- コンテンツ -->
            <div class="wrap">
                    @yield('content')
            </div>
        </section>
        
        @yield('footer')
    </body>
    

    
</html>