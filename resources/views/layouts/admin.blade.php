<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Admin panel</title>
        <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="main-block">
            <div class="left-bar">
                <ul>
                    <li><a href="{{ route('admin') }}">Home</a></li>
                    <li><a href="{{ route('get-notes') }}">Заметки</a></li>
                    <li><a href="/admin/articles">Статьи</a></li>
                    <li><a href="/admin/settings">Настройки</a></li>
                </ul>
            </div>

            <div class="user-info">
                <p>{{ Auth::guard('admin')->user()->name }}</p>
                <a href="{{ route('admin-logout') }}">Выйти</a>
                <br>
                <a href="{{ route('home') }}">Main</a>
            </div>
    
            <div class="right-block">@yield('content')</div>
        </div>

        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
