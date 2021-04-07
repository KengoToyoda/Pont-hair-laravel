@extends('template')

@section('title', 'pont')
@section('keywords', '美容師', '美容師アシスタント')
@section('description', '美容師アシスタント紹介サービスです')

@section('indexCss')
<link href="static/css/index.css" rel="stylesheet">
@endsection
    @include('header')
    
    @section('content')
        <h1>Dresser Lists</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='name'><a href="/posts/{{ $post->id }}">{{ $post->name }}</a></h2>
                    <ul class="stylist_info">
                        <li class="stylist_item">{{ $post->age }}</li>
                        <li class="stylist_item">{{ $post->shop }}</li>
                        <li class="stylist_item">{{ $post->location }}</li>
                        <li class="stylist_item">{{ $post->style }}</li>
                    </ul>
                    <p class="stylist_comment">{{ $post->comment }}</p>
                    <img src="/storage/images/{{ $post->image }}" alt="images" width="300" height="300">
                </div>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="alertFunction()" class="btn">[DELETE]</button> 
                </form>
            @endforeach
        </div>
        <div class="pagnate">
            {{ $posts->links() }}
        </div>
    @endsection
    
    @include('footer')
        
        
