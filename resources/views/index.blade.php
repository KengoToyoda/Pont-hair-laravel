<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Pont</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Dresser Lists</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='name'><a href="/posts/{{ $post->Id }}">{{ $post->name }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <p class="style">{{ $post->style }}</p>
                    <img src=""> 
                </div>
            @endforeach
        </div>
        <div class="pagnate">
            {{ $posts->links() }}
            
        </div>
    </body>
</html>