@extends('layouts.member_app')

@section('title', 'よくある質問 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '管理画面の設定や操作について、よくある質問を「予約ページの作成・編集について」「予約ページの運用について」「パスワード変更や、その他変更について」ごとにまとめました。設定や操作に困った場合は、一度ご覧になっていただければと思います。')

@section('content')
<div class="member-body">
    <section class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item active">よくある質問</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">
        <div class="member-top-body">
            <h1 class="mypage-title">よくある質問</h1>
            
            <div class="question">
                <img src="{{ asset('img/question.svg')}}" alt="よくある質問">
                <p>管理画面の設定や操作について、よくある質問を以下にまとめました。設定や操作に困った場合は、一度ご覧になっていただければと思います。</p>
            </div>
            
            <div class="menu">
              
              <h2>1.予約ページの作成・編集について</h2>
              
              <input type="checkbox" id="menu_bar01" />
              <label for="menu_bar01">Ｑ1. 予約ページはどうやって作成しますか？</label>
              <ul id="links01">
                <li><span class="answer">Ａ</span>　予約ページ作成は管理画面トップページの「＋ 予約ページを作成」をクリックするか、上部メニューの「予約ページ」をクリックすると「予約ページを作成」が表示されますので、そちらをクリックしてください。<br>
                予約ページ作成画面となり基本情報として、公開設定、予約のタイトル、説明文、イメージ画像、ロゴマーク画像、予約価格、予約に関しての注意事項、予約受信メールアドレス、カレンダーの色といった項目があり、入力・設定が完了しましたら「日程・定員数の設定へ」をクリックしてください。<br>
                次に「日時・定員数」の設定画面になりますので、カレンダーを直接クリックして予約を受ける日時・定員数を設定し、毎日や毎週の繰り返し設定が必要な場合チェックを入れます。設定ができたら「登録」をクリックするとカレンダーに反映されます。（繰り返し設定は新規で登録を行う際にしか表示されず、既存のカレンダーの設定画面には表示されません。）<br>
                「登録」をクリックして作成したカレンダーは、個別で編集・削除することができ、「全て削除」で一括で削除することもできます。<br>
                「日時・定員数」の設定が完了したら「ページ作成」をクリックすると予約ページ作成完了ページになり、「予約ページの確認」をクリックすると作成した予約ページを確認することができます。<br>
                予約ページ作成についての詳細は<a href="{{ url('performance/create') }}" target="_blank">コチラ</a>をご覧ください。</li>
              </ul>
        
              <input type="checkbox" id="menu_bar02" />
              <label for="menu_bar02">Ｑ2. 作成した予約ページの内容を変更したい場合は、どうすればいいですか？</label>
              <ul id="links02">
                <li><span class="answer">Ａ</span>　 作成した予約ページの内容を変更したい場合は、管理画面トップページの「予約ページを編集」をクリックするか、上部メニューの「予約ページ」をクリックすると「予約ページを編集」が表示されますので、そちらをクリックしてください。<br>
                変更をしたい予約ページの「基本情報」もしくは「日程・定員数」をクリックしてください。<br>
                「基本情報」は、公開設定、予約のタイトル、説明文、イメージ画像、ロゴマーク画像、予約価格、予約に関しての注意事項、予約受信メールアドレス、カレンダーの色といった項目があり、変更を行ったら「更新」をクリックすると反映されます。<br>
                「日時・定員数」は、現在設定されている予約の「日時・定員数」がカレンダーに表示されており、設定されているカレンダーをクリックすると、日にち、時間、定員数を変更することができ、変更したら「登録」をクリックした時点で設定が反映されます。<br>
                新たに「日時・定員数」を追加したい場合は、カレンダーを直接クリックすると設定画面が表示されます。日にち、時間、定員数を設定し、必要であれば繰り返し設定をしたら「登録」をクリックしてください。<br>
                （繰り返し設定を行いたい場合は、新規で「日時・定員数」を作成する必要があり、既存の「日時・定員数」からは行えません。）<br>
                予約ページ編集についての詳細は<a href="{{ url('performance/edit') }}" target="_blank">コチラ</a>をご覧ください。</li>
              </ul>
        
              <input type="checkbox" id="menu_bar03" />
              <label for="menu_bar03">Ｑ3. 作成した予約ページは、どうやって確認すればいいですか？</label>
              <ul id="links03">
                <li><span class="answer">Ａ</span>　 作成した予約ページは「予約ページを編集」をクリックし、確認したい予約ページの「表示 <i class="icon-another-window_w"></i>」をクリックすると確認することができます。<br>
                また、上部メニューの「マイページ」をクリックすると「予約ページ表示 <i class="icon-another-window_w"></i>」がありますので、そちらをクリックすると作成した全ての予約ページを一覧で確認することができます。</li>
              </ul>
        
              <input type="checkbox" id="menu_bar04" />
              <label for="menu_bar04">Ｑ4. 予約設定を、毎日や毎週の繰り返しで行いたいです。</label>
              <ul id="links04">
                <li><span class="answer">Ａ</span>　 繰り返し設定の方法は、予約ページ作成の「日時・定員数」画面、もしくは予約ページ編集の「日時・定員数」編集画面にて、カレンダーを新規作成する際に「毎日」「毎週」のいずれかにチェックを入れて設定することができます。<br>
                既にあるカレンダーの設定画面には繰り返し設定の表示はされないのでご注意ください。繰り返し期間は1年先までとなり、1年先以降の設定は先の日にちのカレンダーを別途作成して行ってください。</li>
              </ul>
        
              <input type="checkbox" id="menu_bar05" />
              <label for="menu_bar05">Ｑ5. 予約設定の繰り返し可能な期間はどれくらいですか？</label>
              <ul id="links05">
                <li><span class="answer">Ａ</span>　 予約設定の繰り返し可能な期間は、予約設定を行なった日付から1年先までです。<br>
                2年先、3年先、それ以降と繰り返し設定を行いたい場合は、1年先以降のカレンダーを表示し、新たに「日時・定員数」の設定を行い、繰り返しのチェックを入れて設定をしてください。<br>
                <strong>どの期間まで繰り返し設定がされているか、編集画面にて定期的にご確認をお願いいたします。</strong></li>
              </ul>
              
              <input type="checkbox" id="menu_bar06" />
              <label for="menu_bar06">Ｑ6. 祝日や臨時休業日など、特定の日付を予約不可能にすることはできますか？</label>
              <ul id="links06">
                <li><span class="answer">Ａ</span>　 特定の日付を予約不可能にすることは可能です。<br>
                予約ページの「日時・定員数」を繰り返し設定で作成した際に、祝日や臨時休業日は予約不可能にしたい場合は、繰り返し設定で作成された日付のカレンダーを個別で削除してください。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar07" />
              <label for="menu_bar07">Ｑ7. 日付をまたいだ予約設定は行えますか？</label>
              <ul id="links07">
                <li><span class="answer">Ａ</span>　 申し訳ありません。ヨヤクマの予約管理システムは日付をまたいだ設定は行えません。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar08" />
              <label for="menu_bar08">Ｑ8. 営業時間と定休日が決まっている予約ページは作れますか？</label>
              <ul id="links08">
                <li><span class="answer">Ａ</span>　 はい、そういった予約ページの作成も可能です。<br>
                「日時・定員数」の設定カレンダーにて、営業開始から終了までの時間内で、例えば1時間ごとに設定を行います。（何分ごとに設定を行うかは15分単位で自由に選択できます）お昼休憩等がある場合は、その時間だけ設定を入れないでください。<br>
                この作業を営業される曜日ごとに行なっていただけば、設定がない曜日は定休日とすることができます。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar09" />
              <label for="menu_bar09">Ｑ9. 予約通知メールを複数アドレスで受信することはできますか？</label>
              <ul id="links09">
                <li><span class="answer">Ａ</span>　 予約が入った際に管理者に送られる予約通知メールは、複数のメールアドレスで受信が可能です。予約を把握したい方のメールアドレスを複数設定しておくことで、予約を複数人ですぐに把握することができます。<br>
                複数の受信メールアドレスの設定方法は<a href="{{ url('performance/create#reception') }}" target="_blank">コチラ</a>をご覧ください。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar10" />
              <label for="menu_bar10">Ｑ10. 予約ページの公開・非公開の違いは何ですか？</label>
              <ul id="links10">
                <li><span class="answer">Ａ</span>　 予約ページは公開か非公開の状態か選ぶことができます。<br>
                公開の場合は誰でも予約ページを閲覧することができ、非公開の場合はログイン状態の管理者しか予約ページを閲覧することができません。非公開の予約ページをログイン状態の管理者以外の方が閲覧すると、「※ページが存在しません。」という表示になり、予約が行えない様になります<br>
                <img src="{{ asset('img/notfound.jpg')}}" alt="※ページが存在しません。"><br>
                一時的に予約受付を停止したい場合は、非公開状態にしてください。<br>
                公開か非公開を切り替えるには、予約ページ編集の「基本情報」をクリックし、「公開設定」を公開か非公開どちらかを選択して「更新」をクリックしてください。<br>
                非公開の予約ページを確認したい場合は、予約ページ編集の画面で「公開」のタブを「非公開」にすると確認することができます。
                </li>
              </ul>

              <input type="checkbox" id="menu_bar11" />
              <label for="menu_bar11">Ｑ11. 「公開設定」の項目が見当たりません。</label>
              <ul id="links11">
                <li><span class="answer">Ａ</span>　 「公開設定」の項目は、有料会員登録をしていただくことで設定が可能となります。無料会員の場合ですと、「公開設定」の項目は表示されず全ての予約ページが非公開状態となります。<br>
                有料会員登録は以下のボタンから行えます。<br>
                <span class="paid-btn"><a href="{{route('mypage.membership')}}" role="button">有料会員登録 <i class="fas fa-angle-right"></i></a></span>
                是非、有料会員登録をご検討ください。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar12" />
              <label for="menu_bar12">Ｑ12. 予約カレンダーの色はどうやって変更しますか？</label>
              <ul id="links12">
                <li><span class="answer">Ａ</span>　 予約カレンダーの色は、予約ページ編集の「基本情報」をクリックし、「予約カレンダーの色」の四角い色をクリックし、色を変更した後に「色を決定」をクリックしてください。「色を決定」をクリックすると「現在選択している色は#000000です。」の部分も変更されます。色が変更されたら「更新」をクリックしてください。（新規で予約ページを作成する時も同様の作業になります。）</li>
              </ul>
              
              <input type="checkbox" id="menu_bar13" />
              <label for="menu_bar13">Ｑ13. 予約時に価格は決まっていない、または無料の予約の場合はどうすればいいですか？</label>
              <ul id="links13">
                <li><span class="answer">Ａ</span>　 予約ページ作成の基本情報に「予約価格」の項目があります。予約時に価格が決まっておらず、現地で算定される場合は、「予約時に価格は算定されません」にチェックを入れてください。チェックを入れることで、予約ページの価格の部分にも「予約時に価格は算定されません」と表示がされます。<br>
                また、予約価格が無料の場合は、予約価格に0を入力してください。0を入力すると、予約ページの価格の部分は「無料」と表示されます。<br>
                （予約ページ編集も同様の作業になります。）</li>
              </ul>
              
              <input type="checkbox" id="menu_bar14" />
              <label for="menu_bar14">Ｑ14. 予約ページのイメージ画像やロゴマーク画像はどうやって設定しますか？</label>
              <ul id="links14">
                <li><span class="answer">Ａ</span>　 予約ページ編集の「基本情報」をクリックすると、イメージ画像とロゴマーク画像の項目があります。「画像を選択」をクリックすると、お好きな画像を設定することができます。<br>
                （画像データはjpeg、png、svgのいずれかの形式のものを使用してください。新規で予約ページを作成する時も同様の作業になります。）</li>
              </ul>
              
              <input type="checkbox" id="menu_bar15" />
              <label for="menu_bar15">Ｑ15. 予約ページを削除、または設定されている特定の日時を削除するにはどうすればいいですか？</label>
              <ul id="links15">
                <li><span class="answer">Ａ</span>　 予約ページを削除したい場合は、「予約ページを編集」画面で削除したい予約ページの「削除」をクリックしてください。「削除しますか」という表示がされるので「OK」をクリックすると、予約ページが削除されます。<br>
                予約ページに設定されている特定の日時を削除したい場合は、「予約ページを編集」画面で「日時・定員数」をクリックし、削除したい日時のカレンダーをクリックして「削除」をクリックすると削除されます。全ての日時を削除したい場合は「全て削除」をクリックし、「本当に全て削除しますか？」と表示れさるので再度「全て削除」をクリックすると全ての日時が削除されます。</li>
              </ul>

            </div>
            
            
            <div class="menu">
              
              <h2>2.予約ページの運用について</h2>
              
              <input type="checkbox" id="menu_bar-2_01" />
              <label for="menu_bar-2_01">Ｑ1. 有料会員と無料会員の違いは何ですか？</label>
              <ul id="links-2_01">
                <li><span class="answer">Ａ</span>　 有料会員と無料会員の違いは、予約ページを公開状態にできるかどうかという部分になります。<br>
                無料会員でも予約ページを作成・編集といった操作を行うことはできますが、作成した予約ページは全て非公開状態となり、ログイン状態の管理者のみが予約ページを閲覧することができ、一般ユーザーには予約ページを閲覧してもらうことはできません。<br>
                実際に予約ページから予約をしてもらうには、有料会員登録を行っていただく必要があります。有料会員のヨヤクマの利用料は月額2,980円（税抜）となっており、以下のボタンから登録が可能となっております。<br>
                <span class="paid-btn"><a href="{{route('mypage.membership')}}" role="button">有料会員登録 <i class="fas fa-angle-right"></i></a></span>
                是非、有料会員登録をご検討ください。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar-2_02" />
              <label for="menu_bar-2_02">Ｑ2. 作成した予約ページは、どの様に運用すべきですか？</label>
              <ul id="links-2_02">
                <li><span class="answer">Ａ</span>　 作成した予約ページは、そのままでは人に見れもらえません。予約ページのURLをコピーして、ホームページやSNS等から予約ページへリンクをさせて運用をしてください。また、URLからQRコードを作成してチラシ等に入れる運用方法もあります。<br>
                予約ページのURLは、画面上部にある赤枠の部分に表示されています。<br>
                <img src="{{ asset('img/operation-image-01.jpg')}}" alt="URLについて"></li>
              </ul>
              
              <input type="checkbox" id="menu_bar-2_03" />
              <label for="menu_bar-2_03">Ｑ3. 予約がされたら、どうやって伝わりますか？</label>
              <ul id="links-2_03">
                <li><span class="answer">Ａ</span>　 予約が入ったら、管理者と予約をされた方に自動通知メールが送信されます。<br>
                管理者には「予約が入りました」メールが、予約をされた方には「予約完了のお知らせ」メールが送られ、メール本文に予約内容と予約をされた方の顧客情報が記載されます。管理者への自動通知メールは複数アドレスで受信可能です。<br>
                また、予約がされたら管理画面トップページのカレンダーに予約が反映され、顧客一覧にも顧客情報が反映されます。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_04" />
              <label for="menu_bar-2_04">Ｑ4. 予約状況はどうやって確認しますか？</label>
              <ul id="links-2_04">
                <li><span class="answer">Ａ</span>　 予約ページから予約が行われると、管理画面トップページのカレンダーに色が付き反映されます。反映されたカレンダーをクリックすると、予約内容が表示されます。<br>
                どの予約がどの日時に、どなたが何名で予約し、合計金額がいくらなのかが表示され、残りの予約可能人数も表示されます。予約人数の変更とキャンセルのボタンも設置されます。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_05" />
              <label for="menu_bar-2_05">Ｑ5. 電話で予約があった場合はどうすればいいですか？</label>
              <ul id="links-2_05">
                <li><span class="answer">Ａ</span>　 電話で予約があった場合は、予約をされる方の「予約対象と日時（何の予約を、何日何時からか）」「お名前」「予約人数」「電話番号」を確認していただき、管理者ご自身で予約ページから予約を行なって、お客様情報を入力していただければと思います。<br>
                もしくは、お電話からの予約は受け付けず、ネット予約のみの運用をしていただく等、ご対応をお願いいたします。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_06" />
              <label for="menu_bar-2_06">Ｑ6. 予約がキャンセルされた時はどうすればいいですか？</label>
              <ul id="links-2_06">
                <li><span class="answer">Ａ</span>　 予約がキャンセルされた時は、管理画面トップページのカレンダーをクリックし、キャンセルされる方の行の右側にある「予約キャンセル」をクリックしてください。<br>
                「本当に予約をキャンセルしますか？」と表示されますので、キャンセルされる方にお間違いがないかご確認いただき、再度「予約キャンセル」をクリックすると予約がキャンセルされます。<br>
                詳しくは<a href="{{ url('performance/operation#cancel') }}" target="_blank">コチラ</a>をご覧ください。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_07" />
              <label for="menu_bar-2_07">Ｑ7. 予約キャンセル料が発生する場合はどうすればいいですか？</label>
              <ul id="links-2_07">
                <li><span class="answer">Ａ</span>　 予約キャンセル料が発生する場合は、キャンセル料のお支払いについて、予約をされた方との<strong>直接のやり取り</strong>をお願いいたします。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_08" />
              <label for="menu_bar-2_08">Ｑ8. 予約人数が変更になった場合はどうすればいいですか？</label>
              <ul id="links-2_08">
                <li><span class="answer">Ａ</span>　 予約人数の変更が必要な場合は、管理画面トップページのカレンダーをクリックし、人数変更される方の行の右側にある「予約人数の変更」をクリックしてください。<br>
                「変更する予約人数を選択してください」という表示がされるので、変更したい人数を選択し「登録」をクリックすると、予約人数が変更されます。<br>
                詳しくは<a href="{{ url('performance/operation#change') }}" target="_blank">コチラ</a>をご覧ください。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_09" />
              <label for="menu_bar-2_09">Ｑ9. 予約がされる際に、予約に対しての決済はされますか？</label>
              <ul id="links-2_09">
                <li><span class="answer">Ａ</span>　 ヨヤクマの予約ページから予約が行われた時点では、予約に対しての決済は行われません。予約に対しての決済は、予約日時になりましたら直接現地にて、予約をされた方からお支払いいただく形となります。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_10" />
              <label for="menu_bar-2_10">Ｑ10. 予約をしていただいた顧客情報はどうやって確認しますか？</label>
              <ul id="links-2_10">
                <li><span class="answer">Ａ</span>　 顧客情報はメニューの「顧客一覧」をクリックするとご確認することができます。<br>
                <img src="{{ asset('img/operation-image-09.jpg')}}" alt="顧客一覧画面"><br>
                「予約予定日」「予約対象」「お名前」「フリガナ」「電話番号」「メールアドレス」が表示されます。<br>
                ページを最初に開いた際に表示される顧客情報は、予約予定日が現在の日にち以降のものになります。現在の日にちより過去の顧客を確認したい場合は、「過去の顧客」にチェックを入れた状態で「検索」をクリックしてください。<br>
                キーワード検索に、お名前や予約名を入力して「検索」をクリックすると、顧客を検索することができます。（過去の顧客を検索する場合は、「過去の顧客」にチェックを入れた状態で行なってください）<br>
                ※フリガナとメールアドレスは、予約をする際の必須項目ではない為、空欄な場合があります。</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_11" />
              <label for="menu_bar-2_11">Ｑ11. 予約が定員数に達した場合、どうなりますか？</label>
              <ul id="links-2_11">
                <li><span class="answer">Ａ</span>　 予約が定員に達した場合、予約ページの「予約する」ボタンが非表示となり、代わりに「※コチラの予約は定員に達しました。」という文言が表示され、予約が行われないようになります。<br>
                <img src="{{ asset('img/operation-image-12.jpg')}}" alt="予約が定員に達した場合"></li>
              </ul>


              <input type="checkbox" id="menu_bar-2_12" />
              <label for="menu_bar-2_12">Ｑ12. 予約可能人数の制限はありますか？</label>
              <ul id="links-2_12">
                <li><span class="answer">Ａ</span>　 予約可能人数の制限はありません。予約ページを作成・編集する際に、予約枠に対して何人でも予約可能人数を設定することができます。<br>
                ただし、予約を行う側の予約人数の選択には制限があり、1回の予約で予約可能な人数は最大20人までとなります。20人を超える予約は、複数回に分けて予約を行っていただく必要があります。<br>（例えば予約可能な定員数を100人と設定していても、1回の予約で選択できる予約人数は1人〜20人までとなります）</li>
              </ul>


              <input type="checkbox" id="menu_bar-2_13" />
              <label for="menu_bar-2_13">Ｑ13. 一時的に予約を停止したい場合はどうすればいいですか？</label>
              <ul id="links-2_13">
                <li><span class="answer">Ａ</span>　 一時的に予約を停止したい場合は、「予約ページ編集」の「基本情報」をクリックし、「公開設定」を「非公開」にチェックを入れて「更新」をクリックしてください。<br>
                <img src="{{ asset('img/operation-image-13.jpg')}}" alt="一時的に予約を停止したい場合"><br>
                予約ページは非公開状態となり、ログイン状態の管理者のみが閲覧可能で、一般ユーザーには閲覧されないようになります。非公開状態の予約ページは、「予約ページ編集」ページで「非公開」のタブをクリックすると確認できます。<br>
                予約を再開する場合は、「公開設定」を「公開」にチェックを入れて「更新」をクリックしてください。</li>
              </ul>

              <input type="checkbox" id="menu_bar-2_14" />
              <label for="menu_bar-2_14">Ｑ14. 操作が初めてで、予約ページの作成・編集の仕方や、どう運用するのかが分かりません。</label>
              <ul id="links-2_14">
                <li><span class="answer">Ａ</span>　 「予約ページをどうやって作成・編集すればいいか分からない」「予約状況や顧客情報の確認方法が分からない」「メールアドレスやパスワードの変更方法が分からない」といったお困りごとがありましたら、zoomによって画面共有をしていただき操作サポートをいたします。zoomサポートは<a href="{{ url('support') }}">コチラ</a>からご依頼ください。<br>
                <br>
                zoomサポートを行う上で、以下の注意事項がございますのでご確認ください。<br>
                <div class="zoom-note">
                  <table>
                      <tr>
                          <td>※</td>
                          <td>zoomサポートを行うには、ご使用のパソコンにzoomをインストールする必要があります。zoomのインストールは以下のボタンからデータをダウンロードして行ってください。<br>
                          <a href="{{ asset('uploads/zoomusInstallerFull.pkg')}}" role="button">zoomダウンロード <i class="fas fa-angle-right"></i></a></td>
                      </tr>
                      <tr>
                          <td>※</td>
                          <td>zoomサポートを行うには、以下のフォームから必要項目を入力していただき送信をしてください。<br>フォームからのメールを確認次第、1〜3日以内に返信をさせていただき、zoomサポートを行う日程候補日を送らせていただきます。</td>
                      </tr>
                      <tr>
                          <td>※</td>
                          <td>zoomサポートは原則、パソコンかノートパソコンで行わせていただきます。</td>
                      </tr>
                      <tr>
                          <td>※</td>
                          <td>「zoom（ズーム）」とは、オンライン上で画面・音声の共有が行えるコミュニケーションツールです。無料で仕様することが可能です。</td>
                      </tr>
                  </table>
                </div>
                
                </li>
              </ul>

              <input type="checkbox" id="menu_bar-2_15" />
              <label for="menu_bar-2_15">Ｑ15. 予約をたくさんしてもらうには、どんなことをすべきですか？</label>
              <ul id="links-2_15">
                <li><span class="answer">Ａ</span>　 予約をたくさんしてもらうには、様々な施策が必要になります。<br>
                まずは<strong>ホームページ、SNS、チラシ等で予約内容の魅力を知ってもらうこと</strong>が重要です。そこからヨヤクマの予約ページを利用して予約をしてもらいます。<br>
                ヨヤクマを運営しているスターティングデザインでは、ホームページ制作、SNS運用方法のレクチャー、チラシ制作等、予約内容の魅力を最大限に伝えるサポートをさせていただきます。<br>
                <br>
                スターティングデザイン<br>
                <a href="https://starting-design.com/" target="_blank">https://starting-design.com</a></li>
              </ul>
              
              <input type="checkbox" id="menu_bar-2_16" />
              <label for="menu_bar-2_16">Ｑ16. 有料会員をやめたい、もしくはアカウントを削除（退会）したい場合はどうすればいいですか？</label>
              <ul id="links-2_16">
                <li><span class="answer">Ａ</span>　 有料会員をやめたい場合は、基本情報の「有料会員登録」をクリックし「有料会員をやめる」をクリックすると、「本当に有料会員をやめますか？」と表示されますので、再度「有料会員をやめる」をクリックすると有料会員から無料会員になります。<br>
                アカウント自体を削除（退会）したい場合は、基本情報の「会員情報の編集」をクリックし「退会する」をクリックすると、「本当に退会しますか？」と表示されますので、再度「退会する」をクリックするとアカウントが削除されます。<br>
                ※一度退会するとデータは全て削除され、復旧することはできません。</li>
              </ul>

            </div>

            
            <div class="menu">
              
              <h2>3.パスワード変更や、その他変更について</h2>
              
              <input type="checkbox" id="menu_bar-3_01" />
              <label for="menu_bar-3_01">Ｑ1. ヨヤクマにログインする際の、パスワードとメールアドレスは変更できますか？</label>
              <ul id="links-3_01">
                <li><span class="answer">Ａ</span>　 ヨヤクマにログインする際の、パスワードは変更が可能です。<br>
                ログインパスワードを変更したい場合は、基本情報の「パスワード変更」をクリックし、新しいパスワードを8文字以上の半角英数字で入力し、「パスワード更新」をクリックするとログインパスワードが変更されます。<br>
                ログインメールアドレスの変更はできない仕様となっております。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar-3_02" />
              <label for="menu_bar-3_02">Ｑ2. 新規会員登録フォームで入力した、担当者や電話番号は変更できますか？</label>
              <ul id="links-3_02">
                <li><span class="answer">Ａ</span>　 新規会員登録フォームで入力した情報は、基本情報の「会員情報の編集」で変更することができます。<br>
                ※「メールアドレス」と「あなたのページアドレス」は、アカウント作成後に変更ができないのでご注意ください。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar-3_03" />
              <label for="menu_bar-3_03">Ｑ3. 予約ページの「提供者」の部分は変更できますか？</label>
              <ul id="links-3_03">
                <li><span class="answer">Ａ</span>　 予約ページに表示されている「提供者」は、「基本情報」の「会員情報の編集」にある「企業名・屋号名・団体名」の部分で変更することができます。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar-3_04" />
              <label for="menu_bar-3_04">Ｑ4. 予約完了ページと、予約完了のお知らせメールに記載されている、お問い合わせ先は変更できますか？</label>
              <ul id="links-3_04">
                <li><span class="answer">Ａ</span>　 予約完了ページと、予約完了のお知らせメールに記載されているお問い合わせ先は、会員情報の「企業名・屋号名・団体名」「電話番号」「メールアドレス」が表示されます。<br>
                「会員情報の編集」で「企業名・屋号名・団体名」と「電話番号」は変更が可能ですが、「メールアドレス」は変更ができない仕様となっております。</li>
              </ul>

              <input type="checkbox" id="menu_bar-3_05" />
              <label for="menu_bar-3_05">Ｑ5. 予約ページのページアドレス（URL）は変更できますか？</label>
              <ul id="links-3_05">
                <li><span class="answer">Ａ</span>　 予約ページのページアドレス（URL）は変更ができない仕様となっております。ご自身のページアドレスは、基本情報の「会員情報の編集」で確認することができます。</li>
              </ul>
              
              <input type="checkbox" id="menu_bar-3_06" />
              <label for="menu_bar-3_06">Ｑ6. 有料会員登録で設定しているクレジットカード情報は変更できますか？</label>
              <ul id="links-3_06">
                <li><span class="answer">Ａ</span>　 有料会員登録で設定しているクレジットカード情報は変更可能です。有料会員登録ページにある「カード情報の変更」をクリックし、変更したいクレジットカード情報をご入力いただき、「カード情報の変更」をクリックするとカード情報が変更されます。</li>
              </ul>

            </div>

            
            
            <div class="contact-link">
              <p>上記の内容でも解決しない場合は、<a href="{{ url('/') }}/contact" target="_blank">お問い合わせフォーム <i class="icon-another-window_w"></i></a> からご連絡いただくか、<a href="{{ url('/') }}/support">zoomサポート</a>をご依頼ください。</p>
            </div>

        </div>
    </section>
</div>
@endsection
