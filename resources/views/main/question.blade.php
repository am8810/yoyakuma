@extends('layouts.app')

@section('title', 'よくある質問 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマはどんなことができるか、どんなふうに予約が行われるか、料金等について、よくある質問をまとめました。ご不明点等がある場合は一度ご覧いただければと思います。')

@section('content')

    <div class="page-title">
        <h1>よくある質問</h1>
    </div>  

    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">よくある質問</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">

        <div class="question">
            <img src="{{ asset('img/question.svg')}}" alt="よくある質問">
            <p>ヨヤクマの機能や料金等について、よくある質問を以下にまとめました。ご不明点等がある場合は一度ご覧いただければと思います。</p>
        </div>
        
        <div class="menu question-a">
          <input type="checkbox" id="menu_bar01"/>
          <label for="menu_bar01">Ｑ1. ヨヤクマはどんなことができますか？</label>
          <ul id="links01">
            <li><span class="answer">Ａ</span>　ヨヤクマは、ご自身で予約ページの作成・編集をして、インターネット上で予約を受けることが可能になる予約管理システムです。管理画面上で予約状況の確認や、予約人数の変更・キャンセルの処理も行え、顧客情報の管理も行えます。</li>
          </ul>
    
          <input type="checkbox" id="menu_bar02"/>
          <label for="menu_bar02">Ｑ2. どんなふうに予約が行われますか？</label>
          <ul id="links02" class="question-btn">
            <li><span class="answer">Ａ</span>　 予約ページから「予約する」ボタンをクリックすると、予約したい「日にち」「時間」「予約人数」の選択画面となり、次にお客様情報として「お名前」「お名前（フリガナ）」「電話番号」「メールアドレス」を入力し、内容確認をしてから「予約する」ボタンをクリックすると予約完了となります。<br>
            実際に作成された予約サンプルページをご覧になっていただくのが分かりやすいかと思いますので、以下のサンプルページをご覧ください。<br>
            <a href="https://yoyakuma.com/reserve/sample/7" target="_blank" role=button>サンプルページ <i class="icon-another-window_w"></i></a>
            
            <div class="question-ta">
              <table>
                  <tbody>
                      <tr>
                          <td>※</td>
                          <td>予約が行われる流れを理解していただくため、サンプルページから予約を行っていただくことも可能です。<br>
                          サンプルページの予約は、実際に予約が行われる訳ではありません。</td>
                      </tr>
                  </tbody>
              </table>
            </div>
            
            </li>
          </ul>
    
          <input type="checkbox" id="menu_bar03"/>
          <label for="menu_bar03">Ｑ3. 予約が入ったらどうなりますか？</label>
          <ul id="links03">
            <li><span class="answer">Ａ</span>　 予約が入ったら、管理者と予約をされた方に自動通知メールが送信されます。<br>
            管理者には「予約が入りました」メールが、予約をされた方には「予約完了のお知らせ」メールが送られ、メール本文に予約内容と予約をされた方の顧客情報が記載されます。管理者への自動通知メールは複数アドレスで受信可能です。<br>
            また、管理画面にログインするとトップページにあるカレンダーに予約が反映され、顧客一覧にも顧客情報が反映されます。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar04"/>
          <label for="menu_bar04">Ｑ4. 予約が入った際に、複数人ですぐに確認できますか？</label>
          <ul id="links04">
            <li><span class="answer">Ａ</span>　 予約が入った際に管理者に送られる予約通知メールは、複数のメールアドレスで受信が可能です。予約を把握したい方のメールアドレスを複数設定しておくことで、予約を複数人ですぐに把握することができます。<br>
            複数の受信メールアドレスの設定方法は<a href="{{ url('performance/create#reception') }}">コチラ</a>をご覧ください。</li>
          </ul>
    
          <input type="checkbox" id="menu_bar05"/>
          <label for="menu_bar05">Ｑ5. 予約人数の変更やキャンセルの処理はできますか？</label>
          <ul id="links05">
            <li><span class="answer">Ａ</span>　 管理画面の予約状況のカレンダーから、予約人数の変更やキャンセルの処理も可能です。<br>
            予約人数の変更については<a href="{{ url('performance/operation#change') }}">コチラ</a>をご覧になっていただき、キャンセルについては<a href="{{ url('performance/operation#cancel') }}">コチラ</a>をご覧ください。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar06"/>
          <label for="menu_bar06">Ｑ6. 予約ページはどのように公開されますか？</label>
          <ul id="links06">
            <li><span class="answer">Ａ</span>　 予約ページはヨヤクマサイト（https://yoyakuma.com）内に含まれる形で公開されます。<br>
            新規会員登録を行う際の「あなたのページアドレス」に3文字以上の半角英数字で任意のアドレスを入力し、「https://yoyakuma.com/reserve/（任意のアドレス）」といった形で公開されます。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar07"/>
          <label for="menu_bar07">Ｑ7. 予約ページを見てもらうにはどうすればいいですか？</label>
          <ul id="links07">
            <li><span class="answer">Ａ</span>　 作成した予約ページは、そのままでは人に見れもらえません。予約ページのURLをコピーして、ホームページやSNS等から予約ページへリンクさせて運用をしてください。また、URLからQRコードを作成してチラシ等に入れる運用方法もあります。<br>
            予約ページのURLは、画面上部にある赤枠の部分に表示されています。<br>
            <img src="{{ asset('img/operation-image-01.jpg')}}" alt="URLについて"></li>
          </ul>
          
          <input type="checkbox" id="menu_bar08"/>
          <label for="menu_bar08">Ｑ8. 顧客情報も管理できますか？</label>
          <ul id="links08">
            <li><span class="answer">Ａ</span>　 管理画面にて顧客情報も管理することができます。<br>
            予約をされた方は、顧客情報として管理されます。顧客情報は、管理画面メニューの「顧客一覧」をクリックすると確認でき、「予約予定日」「予約対象」「お名前」「フリガナ」「電話番号」「メールアドレス」が表示されます。<br>
            検索機能によって、予約予定日や予約対象で顧客情報を絞って検索することもできます。<br>
            <img src="{{ asset('img/operation-image-09.jpg')}}" alt="顧客情報の画面"></li>
          </ul>

          <input type="checkbox" id="menu_bar09"/>
          <label for="menu_bar09">Ｑ9. どんな業種が対応していますか？</label>
          <ul id="links09" class="question-btn q-b-m">
            <li><span class="answer">Ａ</span>　 ヨヤクマの予約管理システムは、様々な業種の方にご利用いただける仕様となっております。<br>
            例えば、レッスン・スクール等の予約で「毎週決まった曜日の時間から予約ができるようにしたい」、お店・施設等の予約で「営業時間、定休日が決まっており、時間ごとに予約ができるようにしたい」、イベント等の予約で「決まった日にちの時間から予約ができるようにしたい」といった、あらゆる場面でご利用いただけます。<br>
            以下のリンク先にて、タイプごとにまとめた予約デモページをご用意しています。是非ご覧ください。<br>
            <a href="{{ url('about#reservetype') }}"role=button>予約タイプ <i class="fas fa-angle-right"></i></a>
            </li>
          </ul>
          
          <input type="checkbox" id="menu_bar10"/>
          <label for="menu_bar10">Ｑ10. 操作方法が分からない時は、どうサポートしてくれますか？</label>
          <ul id="links10">
            <li><span class="answer">Ａ</span>　 万が一、予約ページの作成・編集、その他運用方法が分からないという方もご安心ください。どなたにも必ずヨヤクマのサービスを使いこなしていただけるよう、zoomによる操作サポート、お問い合わせフォーム、お電話からのカスタマーサポートと、万全のサポート体制を整えております。何かご不明点やご相談がありましたら、お気軽にサポートをご利用ください。
              <div class="question-ta">
                <table>
                    <tbody>
                        <tr>
                            <td>※</td>
                            <td>zoomによる操作サポートは、<a href="{{ route('register') }}">会員登録</a>をしていただく必要があります。</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </li>
          </ul>
          
          <input type="checkbox" id="menu_bar11"/>
          <label for="menu_bar11">Ｑ11. ヨヤクマの利用料金はいくらですか？</label>
          <ul id="links11">
            <li><span class="answer">Ａ</span>　 有料会員としてのヨヤクマの料金プランは、月額2,980円（税抜）の1プランのみとなっております。月額2,980円で、予約ページを何ページでも作成することができ、予約可能人数の制限もなく、予約された際の手数料も一切かかりません。<br>
            また、予約ページに広告表示も一切されることはありません。他社の予約管理システムと比べても、非常に低コストで運用が可能です。<br>
            ヨヤクマをご利用いただくには、まず<a href="{{ route('register') }}">新規会員登録</a>をしていただき、管理画面の基本情報から有料会員登録を行ってください。詳しくは<a href="{{ url('/') }}/price#paid">コチラ</a>をご覧ください。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar12"/>
          <label for="menu_bar12">Ｑ12. 会員登録の仕方がわかりません。</label>
          <ul id="links12">
            <li><span class="answer">Ａ</span>　 会員登録は<a href="{{ route('register') }}">新規会員登録フォーム</a>から必要項目を入力して「会員登録」ボタンをクリックすると、まずは仮会員登録の状態となります。仮会員登録の状態では管理画面を表示することはできず、管理画面を表示するには本会員登録が必要となります。<br><br>
            <strong>本会員登録について</strong><br>
            仮会員登録が完了すると、会員登録でご入力いただいたメールアドレスにご本人確認用のメールが送られます。メール本文内の「メールアドレス確認」をクリックすると本会員登録が完了となり、管理画面が表示されます。
              <div class="question-ta">
                <table>
                    <tbody>
                        <tr>
                            <td>※</td>
                            <td>本会員登録は、仮会員登録が完了してから<strong>1時間以内</strong>に行ってください。（1時間を過ぎますと本会員登録が行えなくなります。）万が一、本会員登録が行えなくなってしまった場合は、<a href="{{ url('contact') }}">コチラ</a>からお問い合わせください。</td>
                        </tr>
                        <tr>
                            <td>※</td>
                            <td>本人確認のセキュリティの為、本会員登録を行う際は、<strong>仮ログイン（仮会員登録）しているブラウザと同一ブラウザ</strong>で、本人確認用メールの「メールアドレス確認」のリンクを開く必要があります。</td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <img class="browser" src="{{ asset('img/browser.png')}}" alt="各ブラウザ"><br>
              <strong>仮会員登録を行ったブラウザと同じブラウザで本会員登録を行ってください。</strong>
            </li>
          </ul>

          <input type="checkbox" id="menu_bar13"/>
          <label for="menu_bar13">Ｑ13. 有料会員登録をするにはどうすればいいですか？</label>
          <ul id="links13">
            <li><span class="answer">Ａ</span>　 有料会員登録するには、まず<a href="{{ route('register') }}">新規会員登録フォーム</a>からアカウント作成をしていただき、管理画面の「基本情報」から「有料会員登録」をクリックし、クレジットカード情報を入力して登録を行ってください。<br>
            詳しくは<a href="{{ url('/') }}/price#paid">コチラ</a>をご覧ください。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar14"/>
          <label for="menu_bar14">Ｑ14. 有料会員ではないと、どういった制限がありますか？</label>
          <ul id="links14">
            <li><span class="answer">Ａ</span>　 無料会員のままでも予約ページを作成・編集することは可能です。しかし、無料会員のまま作成する予約ページは「非公開状態」となり、ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。<br>
            無料会員としてヨヤクマの操作性を試すことはできますが、実際に予約が行えるようにするには有料会員登録が必要です。</li>
          </ul>

          <input type="checkbox" id="menu_bar15"/>
          <label for="menu_bar15">Ｑ15. 有料会員登録で設定しているクレジットカード情報を変更したい場合はどうすればいいですか？</label>
          <ul id="links15">
            <li><span class="answer">Ａ</span>　 有料会員登録で設定しているクレジットカード情報を変更したい場合は、管理画面の基本情報から有料会員登録ページを表示し、「カード情報の変更」をクリックしてください。<br>
            カード情報の変更画面になるので、変更したいクレジットカード情報を入力していただき、「カード情報の変更」をクリックするとクレジットカード情報が変更されます。</li>
          </ul>

          <input type="checkbox" id="menu_bar16"/>
          <label for="menu_bar16">Ｑ16. 有料会員登録をやめる場合はどうすればいいですか？</label>
          <ul id="links16">
            <li><span class="answer">Ａ</span>　 有料会員登録をやめる場合は、管理画面の基本情報から有料会員登録ページを表示し、「有料会員登録を解除する」をクリックしてください。「本当に有料会員登録を解除しますか？」と表記されますので、「有料会員登録を解除」をクリックすると有料会員登録が解除されます。</li>
          </ul>
          
          <input type="checkbox" id="menu_bar17"/>
          <label for="menu_bar17">Ｑ17. 予約がされる際に、手数料はかかりますか？</label>
          <ul id="links17">
            <li><span class="answer">Ａ</span>　 予約がされる際に手数料は一切かかりません。どれだけ予約を受けようが、ヨヤクマに対して発生する費用は有料会員登録の月額2,980円（税抜）のみとなります。</li>
          </ul>

          <input type="checkbox" id="menu_bar18"/>
          <label for="menu_bar18">Ｑ18. 予約がされる際に、予約に対しての決済はされますか？</label>
          <ul id="links18">
            <li><span class="answer">Ａ</span>　 ヨヤクマの予約ページから予約が行われた時点では、予約に対しての決済は行われません。予約に対しての決済は、予約日時になりましたら直接現地にて、予約をされた方からお支払いいただく形となります。</li>
          </ul>

          <input type="checkbox" id="menu_bar19"/>
          <label for="menu_bar19">Ｑ19. 広告表示はされますか？</label>
          <ul id="links19">
            <li><span class="answer">Ａ</span>　 ヨヤクマの予約ページは、広告表示は一切されません。予約ページに関係のない広告を表示させて、ユーザーに違和感を与えるようなことは一切ありません。</li>
          </ul>

          <input type="checkbox" id="menu_bar20"/>
          <label for="menu_bar20">Ｑ20. 予約可能人数の制限はありますか？</label>
          <ul id="links20">
            <li><span class="answer">Ａ</span>　 予約可能人数の制限はありません。予約ページを作成・編集する際に、予約枠に対して何人でも予約可能人数を設定することができます。<br>
            ただし、予約を行う側の予約人数の選択には制限があり、1回の予約で予約可能な人数は最大20人までとなります。20人を超える予約は、複数回に分けて予約を行っていただく必要があります。<br>
            （例えば予約可能な定員数を100人と設定していても、1回の予約で選択できる予約人数は1人〜20人までとなります）</li>
          </ul>

          <input type="checkbox" id="menu_bar21"/>
          <label for="menu_bar21">Ｑ21. 予約ページは、どれだけの数を作成できますか？</label>
          <ul id="links21">
            <li><span class="answer">Ａ</span>　 予約ページの作成数に制限はございません。1アカウントで複数の予約ページを作成することができます。<br>
            ただし、予約完了ページと、予約をされた方に自動送信される予約完了メールには「ご予約に関してのお問い合わせは、以下の連絡先までご連絡ください。」という表記があり、お問い合わせ先は会員登録で設定されている「企業名・屋号名・団体名」「電話番号」が統一して表記されます。<br>
            また、予約ページに表示される「提供者」も会員登録で設定されている「企業名・屋号名・団体名」が統一して表記されます。</li>
          </ul>

          <input type="checkbox" id="menu_bar22"/>
          <label for="menu_bar22">Ｑ22. ログインパスワードが分からなくなってしまいました。</label>
          <ul id="links22">
            <li><span class="answer">Ａ</span>　 万が一、ログインパスワードが分からなくなってしまった場合は、ログインページにある「パスワードをお忘れの場合」をクリックしてください。<br>
            会員登録メールアドレスを入力し「送信」をクリックすると、パスワードリセット用のメールが送信されます。メールにある「Reset password」をクリックすると、パスワードリセット画面が表示されるので、メールアドレスと新しいパスワードを入力し「パスワードリセット」をクリックするとパスワードがリセットされます。<br>
            再度、ログイン画面にてメールアドレスと新しいパスワードを入力することで、ログインが可能になります。</li>
          </ul>

    
        </div>

    </section>
    
@endsection
