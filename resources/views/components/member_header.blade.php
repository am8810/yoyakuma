<nav class="navbar navbar-expand-md navbar-light bg-white bottom-orange fixed-top">
    <div class="header-container">
        <a class="navbar-brand" href="{{ url('home') }}">
            <img src="{{ asset('img/logo-admin.jpg')}}" class="header-logo">
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
                            <img src="{{ asset('img/logo-admin.svg')}}" alt="予約管理ならヨヤクマ（管理画面）">
                        </a>
                    </li>
                    <li class="header-menu"><a href="{{ url('home') }}">ホーム</a></li>
                    <li class="header-menu"><a href="{{ route('mypage') }}">基本情報</a></li>
                    <li class="header-menu nav-item dropdown">
                        <a href="#" class="nav-link r-drop" data-toggle="dropdown">予約ページ <i class="fas fa-sort-down g-down"></i></a>
                        <div class="dropdown-menu d-reserve">
                            <a href="{{ url('reservepages/step1') }}" class="dropdown-page">予約ページを作成</a>
                            <a href="{{ url('reservepages') }}" class="dropdown-page">予約ページを編集</a>
                        </div>
                    </li>
                    <li class="header-menu"><a href="{{ url('customerlist') }}">顧客一覧</a></li>
                    <li class="header-menu"><a href="{{ url('question_admin') }}">よくある質問</a></li>
                    <li class="support-menu"><a href="{{ url('support') }}">zoomサポート</a></li>
                    
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
                        <a id="navbarDropdown" class="link-mypage nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user mr-1"></i>マイページ <i class="fas fa-sort-down g-down"></i>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right close-link" aria-labelledby="navbarDropdown">
                            <a href="/reserve/{{ $user->page_address }}" class="reservepage-link" target="_blank">予約ページ表示 <i class="icon-another-window_w"></i></a>
                            
                            <a class="dropdown-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                            <a href="{{ url('/') }}" class="mainsite-link">本サイト</a>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        
    </div>
</nav>