<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Managing site for applying for jobs</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
    <body>
    <div class="login-wrapper">
        <nav>
            <div class="login">
                <div class="login-item">
                    <h2>
                        <span class="uppercase-initial">M</span><span class="lowercase-initial">anaging</span>
                        <span class="uppercase-initial">S</span><span class="lowercase-initial">ite</span>
                        <span class="uppercase-initial">F</span><span class="lowercase-initial">or</span>
                        <span class="uppercase-initial">A</span><span class="lowercase-initial">pplying</span>
                        <span class="uppercase-initial">F</span><span class="lowercase-initial">or</span>
                        <span class="uppercase-initial">J</span><span class="lowercase-initial">obs</span>
                    </h2>
                </div>
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
                                    {{ Auth::user()->name }}
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
        </nav>
    </div>
    @yield('content')
    </body>
</html>