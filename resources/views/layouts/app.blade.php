<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TO-DO List | WEBSITE')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="d-flex h-screen justify-content-between flex-column">
        <header id="header">
            @include('nav.navbar')                       
        </header><!-- /header -->
        <main class="py-4">
            @include('message')
            @yield('content')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
            <a href="https://www.facebook.com/chechepech" target="_blank">Chech&eacute; Pech</a>&emsp;|&emsp;{{config('app.name')}}&emsp;|&emsp;Copyright @ {{date('Y')}}
        </footer>   
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
