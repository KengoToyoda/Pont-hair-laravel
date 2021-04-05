<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Pont</title>
    </head>
    <body>
        <header>
            <ul class="nav">
                <li class="nav_list">[<a href="/posts/create" class="create">美容師登録</a>]</li>
            </ul>
        </header>
        
        <h1>美容師登録ページ</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="post[name]" placeholder="名前" value="{{ old('post.name') }}" />
                <p class="title__error" style="color:red">{{ $errors->first('post.name') }}</p>
            </div>
            <div class="body">
                <h2>詳細</h2>
                <textarea name="post[body]" placeholder="渋谷美容師">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="style">
                <h2>得意なスタイル</h2>
                <textarea name="post[style]" placeholder="韓国カラー">{{ old('post.style') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.style') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>