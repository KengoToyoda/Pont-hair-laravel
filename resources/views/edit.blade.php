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
                <li class="nav_list">[<a href="/">Topページへ</a>]</li>
            </ul>
        </header>
        <h1>投稿編集画面</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <ul class="edit_list">
                <li class="edit_item">
                    <h2>名前</h2>
                    <input type="text" name="post[name]"  value="{{ $post->name }}" />
                </li>
                <li class="edit_item">
                    <h2>年齢</h2>
                    <input type="text" name="post[age]"  value="{{ $post->age }}" />
                </li>
                <li class="edit_item">
                    <h2>ショップ</h2>
                    <input type="text" name="post[shop]"  value="{{ $post->shop }}" />
                </li>
                <li class="edit_item">
                    <h2>アクセス</h2>
                    <input type="text" name="post[location]"  value="{{ $post->location }}" />
                </li>
                <li class="edit_item">
                    <h2>得意な施術</h2>
                    <textarea name="post[style]">{{ $post->style }}</textarea>
                </li>
                <li class="edit_item">
                    <h2>コメント</h2>
                    <textarea name="post[comment]">{{ $post->comment }}</textarea>
                </li>
            </ul>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/posts/{{  $post->id }}">back</a>]</div>
    </body>
</html>