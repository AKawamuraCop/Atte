<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href= "{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">Atte</h1>
            <ul class="header-nav">
                <li class="header-nav__list"><a class="nav__link" href="">ホーム</a></li>
                <li class="header-nav__list"><a class="nav__link" href="">日付一覧</a></li>
                <li class="header-nav__list"><a class="nav__link" href="">ログアウト</a></li>
            </ul>
        </header>
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">
            <small class="copyright">Atte,inc</small>
        </footer>
    </div>
</body>
</html>