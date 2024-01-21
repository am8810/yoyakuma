<div id="re-top">
  <a href="#" class="re-topB">
      <img src="{{ asset('img/smoothscroll.svg')}}" alt="スムーススクロール">
  </a>
</div>

<footer>

    <section class="n-container f-pa">
        <div class="footer-logo">
            <img src="{{ asset('img/logo-admin.svg')}}" alt="予約管理ならヨヤクマ（管理画面）">
        </div>  
        
        <div class="sitemap">
            <h3><span>SITE MAP</span></h3>
            
            <div class="boxContainer sitemap-width">
                <ul class="box sitemap-u">
                    <li><a href="{{ url('home') }}"><i class="fas fa-caret-right"></i> ホーム</a></li>
                </ul>
                
                <ul class="box sitemap-u">
                    <li class="sitemap-l"><a href="{{ route('mypage') }}"><i class="fas fa-caret-right"></i> 基本情報</a></li>
                    <li><a href="{{route('mypage.edit')}}"><i class="fas fa-caret-right"></i> 会員情報の編集</a></li>
                    <li><a href="{{route('mypage.membership')}}"><i class="fas fa-caret-right"></i> 有料会員登録</a></li>
                    <li><a href="{{ route('mypage.edit_password') }}"><i class="fas fa-caret-right"></i> パスワード変更</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-caret-right"></i> ログアウト</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
                
                <ul class="box sitemap-u">
                    <li><a href="{{ url('reservepages/step1') }}"><i class="fas fa-caret-right"></i> 予約ページを作成</a></li>
                    <li><a href="{{ url('reservepages') }}"><i class="fas fa-caret-right"></i> 予約ページを編集</a></li>
                </ul>

                <ul class="box sitemap-u">
                    <li><a href="{{ url('customerlist') }}"><i class="fas fa-caret-right"></i> 顧客一覧</a></li>
                    <li><a href="{{ url('question_admin') }}"><i class="fas fa-caret-right"></i> よくある質問</a></li>
                    <li><a href="{{ url('contact') }}"><i class="fas fa-caret-right"></i> お問い合わせ</a></li>
                    <li><a href="{{ url('support') }}"><i class="fas fa-caret-right"></i> zoomサポート</a></li>
                </ul>
                
                <ul class="box sitemap-u f-mainsite">
                    <li class="sitemap-l"><a href="/reserve/{{ $user->page_address }}" target="_blank">予約ページ表示 <i class="icon-another-window_o"></i></a></li>
                    <li><a href="{{ url('/') }}"><i class="fas fa-caret-right"></i> 本サイト</a></li>
                </ul>
                
                <ul class="box sitemap-u f-privacy">
                    <li><a href="{{ url('privacy') }}"><i class="fas fa-caret-right"></i> プライバシーポリシー</a></li>
                    <li><a href="{{ url('terms') }}"><i class="fas fa-caret-right"></i> 利用規約</a></li>
                    <li><a href="{{ url('legal_notice') }}"><i class="fas fa-caret-right"></i> 特定商取引法に基づく表記</a></li>
                </ul>

            </div>
        </div>

    </section>

    
    
    
    
    
    <div id="copyright">
		<p>Copyright &copy; <?php echo date('Y'); ?> YOYAKUMA All Rights Reserved.</p>
	</div>
</footer>

<!-- fullcarendar JS -->
<script src="{{ secure_asset('js/fullcarendar.js') }}" defer></script>
<script src="{{ secure_asset('js/locales-all.js') }}" defer></script>

<!-- modal_1 -->
<script src="{{ secure_asset('js/modal_1.js') }}" defer></script>

<!-- checkbox_switch -->
<script src="{{ secure_asset('js/checkbox_switch.js') }}" defer></script>

<!-- pickadate -->
<script src="{{ secure_asset('js/pickadate/picker.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/picker.date.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/legacy.js') }}" defer></script>
<script src="{{ secure_asset('js/pickadate/lang-ja.js') }}" defer></script>

<!-- smoothscroll -->
<script src="{{ secure_asset('js/smoothscroll.js') }}" defer></script>



