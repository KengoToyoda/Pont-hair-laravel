<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Pont</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <header>
            <ul class="nav">
                <li class="nav_list">[<a href="/posts/create" class="create">美容師登録</a>]</li>
                <li class="nav_list">[<a href="/">Topページへ</a>]</li>
            </ul>
            
        </header>
        <h1>Dresser Lists</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='name'><a href="/posts/{{ $post->id }}">{{ $post->name }}</a></h2>
                    <p class='body'>{{ $post->shop }}</p>
                    <p class="style">{{ $post->style }}</p>
                    <img src=""> 
                </div>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="alertFunction()" class="btn">[DELETE]</button> 
                </form>
            @endforeach
        </div>
        <div class="pagnate">
            {{ $posts->links() }}
        </div>
    </body>
    
     <script>
        function alertFunction() {
            confirm("Are you sure to delete?");
        }
    </script>
    
    <style>
    .btn:hover{
        opacity: .4;
        transition: all ease .8s;
    }
        
    </style>
</html>