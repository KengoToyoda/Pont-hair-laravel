<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pont</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <header>
            <ul class="nav">
                <li class="nav_list">[<a href="/posts/create" class="create">美容師登録</a>]</li>
            </ul>
        </header>
        
        <h1 class="name">
            {{ $post->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>美容師詳細</h3>
                <p>{{ $post->body }}</p>   
                <p>{{ $post->style }}</p>
                <img>
            </div>
        </div>
        
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">内容を編集する</a>]</p>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>