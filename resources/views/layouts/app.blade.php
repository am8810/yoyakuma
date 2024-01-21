<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @hasSection('description')
        <meta name="description" itemprop="description" content="@yield('description')">
    @else
        <meta name="description" itemprop="description" content="ヨヤクマは、誰でも簡単に使える予約管理システムです！インターネット上で予約が可能になり、ペーパーレスで予約管理が行えます。料金プランは月額2,980円（税抜）のみで、広告表示は一切ありません！">
    @endif

    <meta name="keywords" content="ヨヤクマ,予約管理システム,インターネット予約,予約システム,予約,予約管理,予約システム" />

    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>【ヨヤクマ】インターネット上で予約が行える、予約管理システム</title>
    @endif

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    
    <!-- グローバルナビ -->
    <script src="{{ secure_asset('js/g-nav.js') }}" defer></script>
    
    <!-- Form Scripts -->
    <script src="{{ secure_asset('js/form-click.js') }}" defer></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- favicon -->	
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png')}}">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        @yield('content')

        @component('components.footer')
        @endcomponent
    </div>
</body>
</html>
