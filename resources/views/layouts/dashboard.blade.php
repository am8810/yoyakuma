<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="ヨヤクマのダッシュボード" />
    <meta name="keywords" content="ヨヤクマ,予約管理システム,インターネット予約,予約システム,予約,予約管理,予約システム" />

    <title>ダッシュボード【予約管理ならヨヤクマ】</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- favicon -->	
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/samazon.css')}}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/3723f06c66.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
    
        @component('components.dashboard.header')
        @endcomponent

        <div class="row">
            @if(Auth::guard('admins')->check())
            <div class="col-3 mt-3">
                @component('components.dashboard.sidebar')
                @endcomponent
            </div>
            @endauth
            <div class="col">
                <main class="py-4 mb-5">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
