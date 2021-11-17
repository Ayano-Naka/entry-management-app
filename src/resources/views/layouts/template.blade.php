<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managing site for applying for jobs</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header id="header">
            <div class="image">
                <img class="logo" src="/images/logo.png" alt="">
                <div class="login-item">
                    <ul class="navbar-nav ml-auto" style="display:flex;">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->profile_image == null)
                                <img class="icon" src="/storage/default.png">
                                @else
                                <img class="icon" src="/storage/{{Auth::user()->profile_image}}">
                                @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> 
                </div>
            </div>
        </header>
    <div class="container">
        <!-- menu -->
        <aside>
            <ul class="side-bar">
                <li><a href="/"><span class="nomal">List</span><span class="hover">一覧</span></a></li>
                <li><a href="/calendar"><span class="nomal">Schedule</span><span class="hover">予定表</span></a></li>
                <li><a href="/task"><span class="nomal">To-Do List</span><span class="hover">することリスト</span></a></li>
                <li><a href="user/setting"><span class="nomal">Settings</span><span class="hover">設定</span></a></li>
            </ul>
        </aside>
        <!-- main -->
        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>