<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- 電話番号の自動リンクを外す -->
    <meta name="format-detection" content="telephone=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Laravel Cashier -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    @hasSection('description')
        <meta name="description" itemprop="description" content="@yield('description')">
    @else
        <meta name="description" itemprop="description" content="ヨヤクマの管理画面です。予約ページの作成・編集が可能で、顧客一覧やよくある質問を確認することもできます。会員情報の確認・編集や有料会員登録も行え、zoomサポート依頼をすることもできます。">
    @endif

    <meta name="keywords" content="ヨヤクマ,予約管理システム,インターネット予約,予約システム,予約,予約管理,予約システム,管理画面" />
    
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>管理画面 【予約管理ならヨヤクマ】</title>
    @endif
    
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <!-- グローバルナビ -->
    <script src="{{ secure_asset('js/g-nav.js') }}" defer></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- fullcarendar CSS -->
    <link href="{{ secure_asset('css/fullcarendar.css') }}" rel="stylesheet">
    
    <!-- favicon -->	
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png')}}">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/member_style.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <!-- pickadate -->
    <link href="{{ secure_asset('css/pickadate/default.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/pickadate/default.date.css') }}" rel="stylesheet">

</head>
<body>
    <!-- ローディング画面 -->
    <div id="loading" class="loaded">
         <p class="loading-text">LOADING</p>
         <img class="spin" src="{{ asset('img/loading.png')}}" alt="spin">
    </div>
    <div id="app">
         @component('components.member_header', ['user' => $user])
         @endcomponent

        <main>
            @yield('content')
        </main>
        
        @component('components.member_footer', ['user' => $user])
         @endcomponent
         @stack('scripts')
    </div>
  

</body>
</html>
