<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">
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