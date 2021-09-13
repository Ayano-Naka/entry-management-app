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
    <!-- header -->
    <header id="header">
        <div class="image">
        <img class="logo" src="/images/logo.png" alt="">
        <a href=""><img class="icon" src="/images/profile_icon.png" alt=""></a>
        </div>
    </header>
    <div class="container">
        <!-- menu -->
        <aside>
            <ul class="side-bar">
                <li><a href=""><span class="nomal">List</span><span class="hover">一覧</span></a></li>
                <li><a href=""><span class="nomal">Schedule</span><span class="hover">予定表</span></a></li>
                <li><a href=""><span class="nomal">To-Do List</span><span class="hover">することリスト</span></a></li>
                <li><a href=""><span class="nomal">Settings</span><span class="hover">設定</span></a></li>
            </ul>
        </aside>
        <!-- main -->
        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>