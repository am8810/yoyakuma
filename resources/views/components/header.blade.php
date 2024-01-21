<nav class="navbar navbar-expand-md navbar-light bg-white bottom-orange fixed-top">
    <div class="header-container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.jpg')}}" class="header-logo">
        </a>
        
        <button class="navbar-toggler openbtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span></span><span></span><span></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv-->
            
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <li>
                        <a class="navbar-brand-s logo-xs" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.svg')}}" alt="予約管理はヨヤクマ">
                        </a>
                    </li>
                    <li class="header-menu"><a href="{{ url('/') }}">ホーム</a></li>
                    <li class="header-menu"><a href="{{ url('about') }}">ヨヤクマについて</a></li>
                    <li class="header-menu nav-item dropdown">
                        <a href="#" class="nav-link r-drop" data-toggle="dropdown">機能 <i class="fas fa-sort-down g-down"></i></a>
                        <div class="dropdown-menu d-reserve">
                            <a href="{{ url('performance') }}" class="dropdown-page">機能について</a>
                            <a href="{{ url('performance/create') }}" class="dropdown-page function-page">予約ページの作成</a>
                            <a href="{{ url('performance/edit') }}" class="dropdown-page function-page">予約ページの編集</a>
                            <a href="{{ url('performance/createpage') }}" class="dropdown-page function-page">作成される予約ページ</a>
                            <a href="{{ url('performance/operation') }}" class="dropdown-page function-page">予約ページの運用</a>
                        </div>
                    </li>
                    <li class="header-menu"><a href="{{ url('price') }}">料金</a></li>
                    <li class="header-menu"><a href="{{ url('question') }}">よくある質問</a></li>
                    <li class="header-menu"><a href="{{ url('contact') }}">お問い合わせ</a></li>
    
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item new-member-btn">
                        <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                    </li>
                    <li class="nav-item login-btn">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    @else
                    <li class="nav-item dropdown mypage-link">
                        <a id="navbarDropdown" class="link-mypage" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user mr-1"></i>マイページ <i class="fas fa-sort-down g-down"></i>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right close-link" aria-labelledby="navbarDropdown">
                            <a class="admin-link" href="{{ route('home') }}">
                                予約管理ページ
                            </a>
    
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>