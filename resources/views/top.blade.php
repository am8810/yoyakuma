@extends('layouts.app')

@section('content')

<main class="main-back">
    <div class="main-text">
        <img class="d-none d-sm-block" src="{{ asset('img/main-text.svg')}}" alt="予約管理システムが月額2,980円（税抜）で使い放題！">
        <img class="d-block d-sm-none" src="{{ asset('img/main-text-s.svg')}}" alt="予約管理システムが月額2,980円（税抜）で使い放題！">
    </div>
</main>

<section class="topSection-01">
    <div class="n-container">
        <img class="img-fluid d-none d-xl-block" src="{{ asset('img/topSection-01.svg')}}" alt="予約イメージイラスト">
        <div class="d-none d-lg-block"><img class="img-fluid d-block d-xl-none" src="{{ asset('img/topSection-01-l.svg')}}" alt="予約イメージイラスト"></div>
        <img class="img-fluid d-block d-lg-none" src="{{ asset('img/topSection-01-s.svg')}}" alt="予約イメージイラスト">

        <h2>ヨヤクマはインターネット上で予約が行える、<br class="display-xs"><strong class="under-2">予約管理システム</strong>です！</h2>
        <p>ヨヤクマは誰でも簡単に予約ページを作成することができ、<br class="display-s">作成した予約ページから予約を受けることで、予約管理をペーパーレスで行うことができます。</p>
        <div class="o-center">
            <a href="{{ url('/') }}/about" role="button">ヨヤクマについて <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</section>

<section class="topSection-02">
    <div class="n-container">
        <h2>こんな事に<strong class="under-2">お困り</strong>じゃありませんか？</h2>
        
        <div class="row pad-45-m">
            <article class="col-md-4">
                <div class="pad-45">
                    <div class="box-b">
                        <div class="problem-back-w">
                            <img class="problem" src="{{ asset('img/problem-01.svg')}}" alt="PROBLEM 1">
                            <h3>ホームページやSNS等を運用して、インターネットからも予約を受けたい</h3>
                            <img class="img-fluid p-01-illust" src="{{ asset('img/problem-01-illust.svg')}}" alt="ホームページやSNS等を運用して、インターネットからも予約を受けたい">
                        </div>
                        <div class="problem-back-b">
                            <p class="problem-p">お電話や口頭でのみ予約を受けているが、今後はインターネット上でも予約を受けたい</p>
                        </div>
                    </div>
                </div>
            </article>
            
            <article class="col-md-4">
                <div class="pad-45">
                    <div class="box-b">
                        <div class="problem-back-w">
                            <img class="problem" src="{{ asset('img/problem-02.svg')}}" alt="PROBLEM 2">
                            <h3>予約が入った際に、複数人ですぐに確認できるようにしたい</h3>
                            <img class="img-fluid p-02-illust" src="{{ asset('img/problem-02-illust.svg')}}" alt="予約が入った際に、複数人ですぐに確認できるようにしたい">
                        </div>
                        <div class="problem-back-b">
                            <p>予約状況の把握を、リアルタイムで複数人で共有できるようにしたい</p>
                        </div>
                    </div>
                </div>
            </article>
            
            <article class="col-md-4">
                <div class="pad-45">
                    <div class="box-b">
                        <div class="problem-back-w">
                            <img class="problem" src="{{ asset('img/problem-03.svg')}}" alt="PROBLEM 3">
                            <h3>予約管理システムといっても、操作が難しそうで使いこなせるか不安</h3>
                            <img class="img-fluid p-03-illust" src="{{ asset('img/problem-03-illust.svg')}}" alt="予約管理システムといっても、操作が難しそうで使いこなせるか不安">
                        </div>
                        <div class="problem-back-b">
                            <p>予約管理システムは難しいイメージがあり、何をどう操作すればいいか分からない</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="entrust">
            <img class="s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
            
            <h2 class="omakase">ヨヤクマの予約管理システムに<strong class="under-2">お任せください！</strong></h2>
            
            <img class="entrust-img" src="{{ asset('img/entrust.png')}}" alt="ヨヤクマ イメージ">

            <p>ヨヤクマの予約管理システムなら、上記の様なお困り事を全て解決いたします。<br>
            インターネットからの予約受付を可能にすることで、より多くの方に貴社のサービスをご提供しましょう！</p>
        </div>
    </div>
</section>

<section class="topSection-03">
    <div class="n-container">
        <img class="what-kind-title" src="{{ asset('img/what-kind-top.svg')}}" alt="どんな業種が対応しているのか？">
        
        <p>ヨヤクマの予約管理システムは、様々な業種の方にご利用いただける仕様となっております。<br>
        例えば、レッスン・スクール等の予約で<strong class="under red">「毎週決まった曜日の時間から予約ができるようにしたい」</strong>、お店・施設等の予約で<strong class="under red">「営業時間、定休日が決まっており、時間ごとに予約ができるようにしたい」</strong>、イベント等の予約で<strong class="under red">「決まった日にちの時間から予約ができるようにしたい」</strong>といった、あらゆる場面でご利用いただけます。</p>
        <div class="row pad-45-m kind-3">
            <div class="col-md-4 what-kind-1">
                <div class="pad-45">
                    <img src="{{ asset('img/what-kind-1.svg')}}" alt="レッスン・スクール">
                    <h3>レッスン・スクール</h3>
                </div>
            </div>
            <div class="col-md-4 what-kind-2">
                <div class="pad-45">
                    <img src="{{ asset('img/what-kind-2.svg')}}" alt="お店・施設">
                    <h3>お店・施設</h3>
                </div>
            </div>
            <div class="col-md-4 what-kind-3">
                <div class="pad-45">
                    <img src="{{ asset('img/what-kind-3.svg')}}" alt="イベント">
                    <h3>イベント</h3>
                </div>
            </div>
        </div>
        
        <div class="MenuCourse_type_2 purpose">
            <h3>予約管理システムがご利用いただける業種や用途</h3>
            <ul class="suitable_box">
                <li class="suitable">ヨガスタジオ</li>
                <li class="suitable">パーソナルトレーニング</li>
                <li class="suitable">英会話スクール</li>
                <li class="suitable">プログラミング教室</li>
                <li class="suitable">料理教室</li>
                <li class="suitable">サッカー教室</li>
                <li class="suitable">テニス教室</li>
                <li class="suitable">レストラン</li>
                <li class="suitable">飲食店・レストラン</li>
                <li class="suitable">レンタルスタジオ</li>
                <li class="suitable">スポーツ施設</li>
                <li class="suitable">クリニック</li>
                <li class="suitable">バーベキュー場</li>
                <li class="suitable">施設見学</li>
                <li class="suitable">サウナ</li>
                <li class="suitable">弁護士</li>
                <li class="suitable">イベント開催</li>
                <li class="suitable">ブライダルフェア</li>
                <li class="suitable">展示会</li>
                <li class="suitable">研修セミナー</li>
                <li class="suitable">住宅展示場</li>
                <li class="suitable">バーベキュー場</li>
                <li class="suitable">観光</li>
                <li class="suitable-nb">…etc</li>
            </ul>
        </div>    
        
        <div class="MenuCourse_type_demo">
            <div class="top-demo demo-c">
                <h2 class="under-2">ヨヤクマの予約ページ</h2>
                <h4 class="demopage">（サンプル）</h4>
                <p class="demopage-p">実際にどの様な予約ページが利用可能か、<strong class="red">サンプルページ</strong>を見てご確認ください。</p>
                
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
            
            <div class="row pad-45-m">
                <div class="col-md-4 top-demo-b">
                    <div class="pad-45">
                        <img class="arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/LessonSchool_type-02.jpg')}}" alt="英会話スクールのサンプルページ">
                        <h4><span class="under">英会話スクール</span></h4>
                        <a href="https://yoyakuma.com/reserve/sample/4" target="_blank" role="button">サンプルページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/MenuCourse_type-01.jpg')}}" alt="飲食店のサンプルページ">
                        <h4><span class="under">飲食店</span></h4>
                        <a href="https://yoyakuma.com/reserve/sample/7" target="_blank" role="button">サンプルページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4 top-demo-g">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/Event_type-02.jpg')}}" alt="研修セミナーのサンプルページ">
                        <h4><span class="under">研修セミナー</span></h4>
                        <a href="https://yoyakuma.com/reserve/sample/11" target="_blank" role="button">サンプルページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>


<section class="topSection-04">
    <div class="n-container">
        <div class="yoyakuma-point">
            <img src="{{ asset('img/logomark.svg')}}" class="membertop-logo" alt="予約管理ならヨヤクマ">
            <h2 class="heading-title">ヨヤクマができること</h2>
        </div>
        
        <div class="row pad-45-m cando">
            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-1.svg')}}" class="cando-img" alt="インターネット予約可能">
                    <h4>01</h4>
                    <h3 class="cando-1">インターネット予約可能</h3>
                    <p>ヨヤクマの予約ページのURLをホームページやブログにリンク、またはQRコードでチラシ等に載せることで、インターネット上で予約が可能になります。</p>
                </div>
            </article>
            
            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-2.svg')}}" class="cando-img" alt="ご自身で予約ページを作成・編集">
                    <h4>02</h4>
                    <h3 class="cando-2">ご自身で予約ページを<br class="display-m">作成・編集</h3>
                    <p>ご自身で予約ページの作成・編集が可能で、カレンダーを直接クリックして日程や定員数の設定が行えるようになっています。</p>
                </div>
            </article>

            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-3.svg')}}" class="cando-img" alt="管理画面で予約状況を確認">
                    <h4>03</h4>
                    <h3 class="cando-3">管理画面で予約状況を確認</h3>
                    <p>予約がされたら管理画面のカレンダーに予約が反映され、日時、顧客名、予約人数等をすぐに確認することができます。予約人数の変更と予約キャンセルも管理画面で行えます。</p>
                </div>
            </article>
        </div>
        
        <div class="row pad-45-m cando">
            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-4.svg')}}" class="cando-img" alt="複数人で予約通知メールを受信">
                    <h4>04</h4>
                    <h3 class="cando-4">複数人で<br class="display-m">予約通知メールを受信</h3>
                    <p>予約通知メールは複数のメールアドレスで受信が可能なため、予約の把握を複数人ですぐに共有することができます。</p>
                </div>
            </article>
            
            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-5.svg')}}" class="cando-img" alt="顧客情報の管理">
                    <h4>05</h4>
                    <h3 class="cando-5">顧客情報の管理</h3>
                    <p>顧客一覧ページも設けられており、顧客のお名前、電話番号、メールアドレス等も管理されています。キーワード検索により顧客を検索することもできます。</p>
                </div>
            </article>

            <article class="col-md-4">
                <div class="pad-45">
                    <img src="{{ asset('img/cando-6.svg')}}" class="cando-img" alt="安心のサポート体制">
                    <h4>06</h4>
                    <h3 class="cando-6">安心のサポート体制</h3>
                    <p>操作方法等が分からない方のために、zoomによる操作サポート、お問い合わせフォーム、お電話からのカスタマーサポートと、万全のサポート体制を整えております。</p>
                </div>
            </article>
        </div>

    </div>
</section>


<section class="topSection-05">
    <div class="n-container">
        <div class="yoyakuma-point">
            <img src="{{ asset('img/logomark.svg')}}" class="membertop-logo" alt="予約管理ならヨヤクマ">
            <h2 class="heading-title">ヨヤクマの機能</h2>
        </div>
        
        <p class="top-per-p">ヨヤクマの予約管理システムは、主に以下の4つの機能で運用をしていきます。</p>
        
        <div class="row pad-60-m">
            <article class="col-md-6">
                <div class="pad-60">
                    <div class="top-performance">
                        <img class="img-fluid top-per-img" src="{{ asset('img/performance-01.png')}}" alt="予約ページの作成">
                        <div class="boxContainer top-per-o">
                            <img class="img-fluid box none-box" src="{{ asset('img/performance-o.svg')}}" alt="歯車（オレンジ）">
                            <h3 class="box none-box">予約ページの作成</h3>
                        </div>
                        <p>予約ページ作成は、どなたでも簡単に設定が行えるよう項目を見やすくし、カレンダーを直接クリックして行う仕様となっております。</p>
                        
                        <div class="o-center">
                            <a href="{{ url('performance/create') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
            
            <article class="col-md-6">
                <div class="pad-60">
                    <div class="top-performance">
                        <img class="img-fluid top-per-img" src="{{ asset('img/performance-02.png')}}" alt="予約ページの編集">
                        <div class="boxContainer top-per-o">
                            <img class="img-fluid box none-box" src="{{ asset('img/performance-o.svg')}}" alt="歯車（オレンジ）">
                            <h3 class="box none-box">予約ページの編集</h3>
                        </div>
                        <p>作成された予約ページは、後から設定を変更することが可能です。設定方法は「予約ページの作成」と同様で、編集画面から変更を行うと設定が反映されます。</p>
                        
                        <div class="o-center">
                            <a href="{{ url('performance/edit') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="row pad-60-m">
            <article class="col-md-6">
                <div class="pad-60">
                    <div class="top-performance">
                        <img class="img-fluid top-per-img" src="{{ asset('img/performance-03.png')}}" alt="作成される予約ページ">
                        <div class="boxContainer top-per-b top-per-b-2">
                            <img class="img-fluid box none-box" src="{{ asset('img/performance-b.svg')}}" alt="歯車（ブルー）">
                            <h3 class="box none-box">作成される予約ページ</h3>
                        </div>
                        <p>作成される予約ページが、どのようなデザインで、設定した内容がどのように反映されるかをご説明します。どのように予約が行われるかの流れも、ご理解いただければと思います。</p>
                        
                        <div class="b-center">
                            <a href="{{ url('performance/createpage') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
            
            <article class="col-md-6">
                <div class="pad-60">
                    <div class="top-performance">
                        <img class="img-fluid top-per-img" src="{{ asset('img/performance-04.png')}}" alt="予約ページの運用">
                        <div class="boxContainer top-per-b">
                            <img class="img-fluid box none-box" src="{{ asset('img/performance-b.svg')}}" alt="歯車（ブルー）">
                            <h3 class="box none-box">予約ページの運用</h3>
                        </div>
                        <p>予約がされたらどうお知らせするのか、予約状況はどう確認するのか、予約人数の変更やキャンセルの対応はどう行うのかといった具体的な運用方法になります。</p>
                        
                        <div class="b-center">
                            <a href="{{ url('performance/operation') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    
    <article class="s-container try">
        <img class="try-free" src="{{ asset('img/try-free.svg')}}" alt="まずは無料で操作性を試してみてください！">
        <img class="happy-yoyakuma" src="{{ asset('img/happy-yoyakuma.svg')}}" alt="ヨヤクマ イラスト">
        <p>無料会員のままでも、予約ページを作成・編集することが可能です。<br>
        「運用をしてみたら、思ってた予約機能と違った」ということが無いよう、まずは無料会員の状態で予約ページを作成・編集して操作性を試してみてください。<br>
        その後、実際に運用しようと思っていただけましたら、有料会員登録をお願いいたします。</p>
        <a href="{{ route('register') }}" role="button"><i class="fas fa-user"></i> 新規会員登録</a>
        <div class="free-note">
            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>会員登録を行った時点で料金の発生は一切なく、無料会員としてご利用いただけます。</td>
                    </tr>
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
    </article>
    
</section>


<section class="topSection-06">
    <div class="n-container">
        <div class="yoyakuma-point">
            <img src="{{ asset('img/logomark.svg')}}" alt="予約管理ならヨヤクマ">
            <h2 class="heading-title">ヨヤクマの料金</h2>
        </div>
        
        <div class="price-box">
            <img class="price-parts-01" src="{{ asset('img/price-parts-01.svg')}}" alt="1プラン">
            <img class="price-parts-02" src="{{ asset('img/price-parts-02.svg')}}" alt="月額2,980円（税抜）">
        </div>
        
        <div class="row pad-45-m top-price">
            <div class="col-lg-5">
                <div class="pad-45">
                    <img class="img-fluid" src="{{ asset('img/price-parts-03.svg')}}" alt="予約ページ作成無制限、予約可能人数無制限、広告表示一切なし">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="pad-45">
                    <h3>料金プランは月額2,980円<small>（税抜）</small>のみで、<br class="display-xs">広告表示は一切ありません！</h3>
                    <p>有料会員としてのヨヤクマの料金プランは、月額2,980円（税抜）の1プランのみとなっております。月額2,980円で予約ページを何ページでも作成することができ、予約可能人数の制限もなく、予約された際の手数料も一切かかりません。<br>
                    また、予約ページに広告表示も一切されることはありません。他社の予約管理システムと比べても、非常に低コストで運用が可能です。</p>
                    <h4>有料会員登録の方法</h4>
                    <p>ヨヤクマをご利用いただくには、まず<a href="{{ route('register') }}">新規会員登録</a>をしていただき、管理画面の基本情報から有料会員登録を行ってください。詳しくは<a href="{{ url('/') }}/price#paid">コチラ</a>をご覧ください。</p>
                </div>
            </div>
        </div>
            
    </div>
</section>


<section class="topSection-07">
    <div class="top-qc-container">
        <div class="row top-qc">
            <div class="col-sm-6 top-q none-pa">
                <a href="{{ url('/') }}/question">
                    <img src="{{ asset('img/top-question.svg')}}" alt="よくある質問">
                    <h2>Q&A</h2>
                    <h3 class="btnarrow6">よくある質問</h3>
                </a>
            </div>
            <div class="col-sm-6 top-c none-pa">
                <a href="{{ url('/') }}/contact">
                    <img src="{{ asset('img/top-contact.svg')}}" alt="お問い合わせ">
                    <h2>Contact</h2>
                    <h3 class="btnarrow6">お問い合わせ</h3>
                </a>
            </div>
        </div>
    </div>
</section>


@endsection
