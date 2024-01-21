<div id="re-top">
  <a href="#" class="re-topB">
      <img src="{{ asset('img/smoothscroll.svg')}}" alt="スムーススクロール">
  </a>
</div>

<footer>

    <section class="topSection-08">
        <div class="s-container">
            <div class="to-register">
                <img src="{{ asset('img/footer-register-icon.svg')}}" alt="新規会員登録">
                <h4>Member Registration</h4>
                
                <div class="f-register">
                    <h2>新規会員登録</h2>
                </div>
                
    		    <div id="to-register" class="center-block block-md mb-0">
    			  <a class="form-btn bgleft" href="{{ route('register') }}" role="button"><span><i class="fas fa-user"></i> 新規会員登録フォームへ</span></a>
    		    </div>
    		    
    		    <div class="freeMember">
    		        <h3 class="heading04">会員登録は無料です！</h3>
    		        <p>まずは会員登録をしていただき、ヨヤクマがどの様な予約管理システムか実際に画面をご覧ください。<br>
    		        <strong>無料会員のままでも、予約ページを作成・編集することが可能です。</strong></p>
    		        
    		        <div class="free-note">
                        <table>
                            <tbody>
                                <tr>
                                    <td>※</td>
                                    <td>無料会員のまま作成する予約ページは「非公開状態」となり、ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。</td>
                                </tr>
                                <tr>
                                    <td>※</td>
                                    <td>予約ページを「公開状態」にして予約管理システムを運用される場合は、会員登録を行っていただき、管理画面の基本情報から有料会員登録を行ってください。</td>
                                </tr>
            
                            </tbody>
                        </table>
                    </div>
    
    		    </div>
    
            </div>
        </div>
    </section>

    <section class="n-container f-pa">
        <div class="footer-logo">
            <img src="{{asset('img/logo.svg')}}" alt="予約管理ならヨヤクマ">
        </div>  
        
        <div class="sitemap">
            <h3><span>SITE MAP</span></h3>
            
            <div class="boxContainer sitemap-width">
                <ul class="box sitemap-u">
                    <li><a href="{{ url('/') }}"><i class="fas fa-caret-right"></i> ホーム</a></li>
                    <li><a href="{{ url('about') }}"><i class="fas fa-caret-right"></i> ヨヤクマについて</a></li>
                </ul>
                
                <ul class="box sitemap-u">
                    <li class="sitemap-l"><a href="{{ url('performance') }}"><i class="fas fa-caret-right"></i> 機能について</a></li>
                    <li><a href="{{ url('performance/create') }}"><i class="fas fa-caret-right"></i> 予約ページの作成</a></li>
                    <li><a href="{{ url('performance/edit') }}"><i class="fas fa-caret-right"></i> 予約ページの編集</a></li>
                    <li><a href="{{ url('performance/createpage') }}"><i class="fas fa-caret-right"></i> 作成される予約ページ</a></li>
                    <li><a href="{{ url('performance/operation') }}"><i class="fas fa-caret-right"></i> 予約ページの運用</a></li>
                </ul>
                
                <ul class="box sitemap-u">
                    <li><a href="{{ url('price') }}"><i class="fas fa-caret-right"></i> 料金</a></li>
                    <li><a href="{{ url('question') }}"><i class="fas fa-caret-right"></i> よくある質問</a></li>
                    <li><a href="{{ url('contact') }}"><i class="fas fa-caret-right"></i> お問い合わせ</a></li>
                </ul>
                
                <ul class="box sitemap-u">
                    <li class="sitemap-l"><a href="{{ route('register') }}"><i class="fas fa-caret-right"></i> 新規会員登録</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-caret-right"></i> ログイン</a></li>
                    <li><a href="{{ route('home') }}"><i class="fas fa-caret-right"></i> 予約管理ページ</a></li>
                </ul>
                
                <ul class="box sitemap-u f-privacy">
                    <li><a href="{{ url('privacy') }}"><i class="fas fa-caret-right"></i> プライバシーポリシー</a></li>
                    <li><a href="{{ url('terms') }}"><i class="fas fa-caret-right"></i> 利用規約</a></li>
                    <li><a href="{{ url('legal_notice') }}"><i class="fas fa-caret-right"></i> 特定商取引法に基づく表記</a></li>
                </ul>

            </div>
        </div>
        
        <div class="starting-design">
            <h3>運営元</h3>
            <a href="https://starting-design.com/" target="_blank">
                <img src="{{ asset('img/starting-design.svg')}}" alt="スターティングデザイン">
            </a>
        </div>
        
        
    </section>
    
    <div id="copyright">
		<p>Copyright &copy; <?php echo date('Y'); ?> YOYAKUMA All Rights Reserved.</p>
	</div>
	
</footer>


<!-- smoothscroll -->
<script src="{{ secure_asset('js/smoothscroll.js') }}" defer></script>



