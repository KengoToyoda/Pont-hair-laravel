



@extends('layouts.template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

    @include('layouts.header')
    
    @section('content')
        <!-- pc left lock start-->
        <div class="pc_flex">
            <div class="pc_left_block">
                <section class="react_pre">
                    <div id="tryReact"></div>
                    <!--<script src="./bundle.js"></script>-->
                </section>
            <!-- pc right lock start-->
            <div class="pc_right_block"></div>
            </div>
        </div>
    @endsection
    
    @include('layouts.footer')
        
        
