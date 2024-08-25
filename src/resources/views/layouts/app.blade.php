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
            @if(Auth::check()&& Auth::user()->hasVerifiedEmail())
            <ul class="header-nav">
                <li class="header-nav__list"><a class="nav__link" href="/">ホーム</a></li>
                <li class="header-nav__list"><a class="nav__link" href="/attendance">日付一覧</a></li>
                <li class="header-nav__list"><a class="nav__link" href="/userList">ユーザー一覧</a></li>
                <form action="/logout" method="post">
                    @csrf
                    <li class="header-nav__list">
                        <input class="logout__button" type="submit" value="ログアウト">
                    </li>
                </form>
            </ul>
            @endif
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