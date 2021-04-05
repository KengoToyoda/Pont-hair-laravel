<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Pont</title>
    </head>
    <body>
        <h1>投稿編集画面</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="post[name]"  value="{{ $post->name }}" />
            </div>
            <div class="body">
                <h2>詳細</h2>
                <textarea name="post[body]">{{ $post->body }}</textarea>
            </div>
            <div class="style">
                <h2>得意なスタイル</h2>
                <textarea name="post[style]">{{ $post->style }}</textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/posts/{{  $post->id }}">back</a>]</div>
    </body>
</html>