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
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="{{ route('login') }}">{{ __('美容師ログイン') }}</a>-->
                    <!--</li>-->
                    <a href="/account" class=nav-link>美容師の方はこちら</a>
                    @if (Route::has('register'))
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{ route('register') }}">{{ __('美容師新規登録') }}</a>-->
                        <!--</li>-->
                    @endif
                @else
                    <a href="/account" class="nav-link">マイページはこちら</a>
                    
                    <!--<div class="nav-item dropdown">-->
                    <!--    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
                    <!--        {{ Auth::user()->name }} <span class="caret"></span>-->
                    <!--    </a>-->

                    <!--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
                    <!--        <a class="dropdown-item" href="{{ route('logout') }}"-->
                    <!--           onclick="event.preventDefault();-->
                    <!--                         document.getElementById('logout-form').submit();">-->
                    <!--            {{ __('Logout') }}-->
                    <!--        </a>-->

                    <!--        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                    <!--            @csrf-->
                    <!--        </form>-->
                    <!--    </div>-->
                    <!--</div>-->
                @endguest
            </li>
        </ul>
    </header>
@endsection
