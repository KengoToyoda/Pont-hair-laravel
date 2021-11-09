@section('header')
    <header>
        <ul class="heaer_nav circleBehind">
            <!-- Left Side Of Navbar --->
            <li class="nav_item"><a href="/" class="nav-link">Topページへ</a></li>
            <li class="nav_item"><a href="/chats" class="nav-link">chat</a></li>
            <li class="nav_item"><a href="/calendar" class="nav-link">calendar</a></li>
            <!-- Right Side Of Navbar -->
            <li class="navbar-nav nav_item">
                <!-- Authentication Links -->
                @guest
                    <a href="/account" class=nav-link>美容師の方はこちら</a>
                @else
                    <a href="/account" class="nav-link">マイページはこちら</a>
                @endguest
            </li>
        </ul>
    </header>
@endsection
