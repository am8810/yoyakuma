<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- 電話番号の自動リンクを外す -->
    <meta name="format-detection" content="telephone=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @hasSection('description')
        <meta name="description" itemprop="description" content="@yield('description')">
    @else
        <meta name="description" itemprop="description" content="予約管理システム、ヨヤクマで作成した予約ページです。予約内容と予約に関しての注意事項をご覧になり、「予約する」ボタンをクリックすると予約フォームへと遷移します。">
    @endif

    <meta name="keywords" content="ヨヤクマ,予約管理システム,インターネット予約,予約システム,予約,予約管理,予約システム,予約ページ" />
    
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>予約ページ 【予約管理ならヨヤクマ】</title>
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- favicon -->	
    <link rel="shortcut icon" href="{{ asset('img/favicon_y.ico')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon_y.png')}}">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/member_style.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <!-- pickadate -->
    <link href="{{ secure_asset('css/pickadate/default.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/pickadate/default.date.css') }}" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Bootstrapのjsのcdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- 予約人数を選択してから日時を選択する様にする -->
    <script src="{{ secure_asset('js/selection_order.js') }}" defer></script>
    
    <!-- jQueryでのバリデーション設定 -->
    <script src="{{ secure_asset('js/input-check.js') }}" defer></script>
    
</head>
<body>
    <div id="app">
         @component('components.reserve_header', ['user' => $user, 'reservepage' => $reservepage])
         @endcomponent

        <main>
            @yield('content')
        </main>
        
        @component('components.reserve_footer')
         @endcomponent
    </div>
    
</body>
</html>
