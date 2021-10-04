<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managing site for applying for jobs</title>
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
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>    
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    </body>
</html>