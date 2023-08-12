<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель управления</title>
    @vite(['resources/scss/app.scss', 'resources/scss/dashboard.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="flex justify-between">
                <p class="text-white" style="font-size: 20px"><a href="{{route('dashboard')}}">Админ панель</a></p>
                <div class="text-white" style="font-size: 16px">
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button style="border-color: white" type="submit">Выйти</button>
                    </form>

                </div>
            </div>
        </div>
    </header>
    <main class="flex">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container">

        </div>
    </footer>
</div>

<x-loader></x-loader>

</body>
</html>
