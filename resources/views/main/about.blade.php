@extends('layouts.app')

@section('title', 'ヨヤクマについて 【予約管理ならヨヤクマ】')
@section('description', '自分だけの予約ページを作成し、予約日時、定員数、価格等を簡単に設定することができます。作成した予約ページから予約がされると、管理画面のカレンダーに反映され、通知メールにて予約がお知らせされます。')

@section('content')

<div class="page-title">
    <h1>ヨヤクマについて</h1>
</div>  

<section class="top-orange-stripe">
    <div class="l-container">
        <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">ヨヤクマについて</li>
    	  </ol>
    	</div>
	</div>

    <div class="about-top m-container">
        <img src="{{ asset('img/about.svg')}}" alt="ヨヤクマについて">
        <h2>誰でも簡単に使える<br><strong class="under-2">予約管理システム</strong></h2>
        <div class="about-top-p">
            <p>ヨヤクマは、誰でも簡単に使える予約管理システムです！<strong class="under red">インターネット上で予約ができるようになり、ペーパーレスで予約管理が行えるようになります。</strong><br>
            自分だけの予約ページを作成し、予約日時、定員数、価格等を簡単に設定することができます。作成した予約ページから予約がされると、管理画面のカレンダーに反映され、通知メールにて予約がお知らせされます。予約ページは後からいつでも編集ができ、顧客情報も確認することができます。</p>
        </div>
    </div>
</section>

<section class="point">
    <div class="n-container">
        <div class="yoyakuma-point">
            <img src="{{ asset('img/logomark.svg')}}" class="membertop-logo" alt="予約管理ならヨヤクマ">
            <h2 class="heading-title">ヨヤクマのポイント</h2>
        </div>
        
        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-1.jpg')}}" class="img-fluid" alt="ヨヤクマのポイント1">
                    </div>
                    
                    <div class="col-lg-7 point-text-1">
                        <div class="boxContainer">
                            <h4 class="box box-none">01</h4>
                            <h3 class="box">ホームページやSNS等と連携して、<br class="display-lg">インターネット上で予約が可能に！</h3>
                        </div>
                        <p>ヨヤクマの予約ページのURLをホームページやSNS等にリンク、またはQRコードでチラシ等に載せることで、インターネット上で予約が可能になります。<br>
                        もう紙面で予約管理をする必要がなくなり、管理画面で予約状況や顧客情報の確認ができ、予約人数の変更やキャンセル処理も行えます。<br>
                        予約ページURLのリンク方法については<a href="{{ url('performance/operation#link') }}">コチラ</a>をご覧ください。</p>
                    </div>
                    
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-1"></div>
                    </div>
                </div>
            </div>
        </article>
        
        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-2.svg')}}" class="img-fluid" alt="ヨヤクマのポイント2">
                    </div>

                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-2"></div>
                    </div>
                    
                    <div class="col-lg-7 point-text-2">
                        <div class="boxContainer">
                            <h4 class="box box-none">02</h4>
                            <h3 class="box">シンプルな操作画面で、誰でも簡単に<br class="display-lg">予約ページの作成・編集が行えます！</h3>
                        </div>
                        <p>ヨヤクマの管理画面の操作はとてもシンプルになっています。誰でも簡単に予約ページの作成・編集が行えるよう、項目が見やすく、カレンダーを直接クリックして日程や定員数の設定が行えるようになっています。作成した予約ページの編集も、簡単に行うことができます。<br>
                        ヨヤクマの機能については<a href="{{ url('performance') }}">コチラ</a>をご覧ください。</p>
                    </div>
                </div>
            </div>
        </article>
        
        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-3-s.svg')}}" class="img-fluid" alt="ヨヤクマのポイント3">
                    </div>

                    <div class="col-lg-7 point-text-1">
                        <div class="boxContainer">
                            <h4 class="box box-none">03</h4>
                            <h3 class="box point-3-h">複数人で予約通知メールを受信して、<br class="display-lg">予約が入ったことをすぐに共有できます。</h3>
                        </div>
                        <p>予約が入った際の予約通知メールは、複数のメールアドレスで受信が可能なため、予約の把握を複数人ですぐに共有することができます。<br>
                        予約をされた方に対しても、予約完了のメールが自動送信されます。<br>
                        予約通知メールについては<a href="{{ url('performance/operation#mail') }}">コチラ</a>をご覧ください。</p>
                    </div>
                    
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-3"></div>
                    </div>
                </div>
            </div>
        </article>
        
        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-4.svg')}}" class="img-fluid" alt="ヨヤクマのポイント4">
                    </div>

                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-4"></div>
                    </div>
                    
                    <div class="col-lg-7 point-text-2">
                        <div class="boxContainer">
                            <h4 class="box box-none">04</h4>
                            <h3 class="box client">顧客情報の管理・検索も行えます！</h3>
                        </div>
                        <p>ヨヤクマの予約ページから予約をされた方の顧客情報は、管理画面にて一覧で確認することができ、キーワード検索によって検索することもできます。<br>
                        顧客情報が常にまとまっていることで、安心して予約ページの運用が行えます。<br>
                        詳しくは<a href="{{ url('performance/operation#customer') }}">コチラ</a>をご覧ください。</p>
                    </div>
                </div>
            </div>
        </article>
        
        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-5-s.svg')}}" class="img-fluid" alt="ヨヤクマのポイント5">
                    </div>

                    <div class="col-lg-7 point-text-1">
                        <div class="boxContainer">
                            <h4 class="box box-none">05</h4>
                            <h3 class="box">料金プランは月額2,980円<small>（税抜）</small>のみで、<br class="display-lg">広告表示は一切ありません！</h3>
                        </div>
                        <p>有料会員としてのヨヤクマの料金プランは、月額2,980円（税抜）の1プランのみとなっております。月額2,980円で予約ページを何ページでも作成することができ、予約可能人数の制限もなく、予約された際の手数料も一切かかりません。<br>
                        また、予約ページに広告表示も一切されることはありません。他社の予約管理システムと比べても、非常に低コストで運用が可能です。<br>
                        有料会員登録の方法については<a href="{{ url('/') }}/price#paid">コチラ</a>をご覧ください。</p>
                    </div>
                    
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-5"></div>
                    </div>
                </div>
            </div>
        </article>

        <article class="pointBox">
            <div class="wrap">
                <div class="row items-center">
                    <div class="col-lg-5 d-block d-lg-none">
                        <img src="{{ asset('img/point-6-s.svg')}}" class="img-fluid" alt="ヨヤクマのポイント6">
                    </div>

                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="point-6"></div>
                    </div>
                    
                    <div class="col-lg-7 point-text-2">
                        <div class="boxContainer">
                            <h4 class="box box-none">06</h4>
                            <h3 class="box">安心のサポート体制で、<br class="display-lg">不慣れな方も必ず使いこなせます！</h3>
                        </div>
                        <p>万が一、予約ページの作成・編集、その他運用方法が分からないという方もご安心ください。どなたにも必ずヨヤクマのサービスを使いこなしていただけるよう、zoomによる操作サポート、お問い合わせフォーム、お電話からのカスタマーサポートと、万全のサポート体制を整えております。何かご不明点やご相談がありましたら、お気軽にサポートをご利用ください。</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td>※</td>
                                    <td>zoomによる操作サポートは、<a href="{{ route('register') }}">会員登録</a>をしていただく必要があります。</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </article>


    </div>
</section>

<section id="reservetype" class="what-kind">
    <div class="n-container">
        <img class="what-kind-title" src="{{ asset('img/what-kind.svg')}}" alt="どんな業種が対応しているのか？">
        
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
        
        <p class="byType">以下はタイプごとにまとめた、ご利用に適している業種や用途と、デモページになります。</p>
    </div>
</section>


<section class="LessonSchool_type">
    <div class="n-container">
        <div class="LessonSchool_type_2">
            <h3>「レッスン・スクール」タイプに適している業種や用途</h3>
            <ul class="suitable_box">
                <li class="suitable">ヨガスタジオ</li>
                <li class="suitable">ピラティススタジオ</li>
                <li class="suitable">パーソナルトレーニング</li>
                <li class="suitable">オンラインフィットネス</li>
                <li class="suitable">英会話スクール</li>
                <li class="suitable">ダンススクール</li>
                <li class="suitable">パソコン教室</li>
                <li class="suitable">プログラミング教室</li>
                <li class="suitable">料理教室</li>
                <li class="suitable">音楽教室</li>
                <li class="suitable">テニス教室</li>
                <li class="suitable">サッカー教室</li>
                <li class="suitable">バスケット教室</li>
                <li class="suitable-nb">…etc</li>
            </ul>
        </div>    
        
        <div class="LessonSchool_type_demo">
            <div class="text-c">
                <h3 class="under">「レッスン・スクール」タイプのデモページ</h3>
            </div>
            <p>「レッスン・スクール」タイプのデモページです。<strong class="red">毎週決まった時間から予約が可能となっております。</strong></p>
            
            <div class="row pad-45-m">
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/LessonSchool_type-01.jpg')}}" alt="ヨガスタジオのデモページ">
                        <h4><span class="under">ヨガスタジオ</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/LessonSchool_type-02.jpg')}}" alt="英会話スクールのデモページ">
                        <h4><span class="under">英会話スクール</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/LessonSchool_type-03.jpg')}}" alt="料理教室のデモページ">
                        <h4><span class="under">料理教室</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>予約が行われる流れを理解していただくため、デモページから予約を行っていただくことも可能です。<br>
                        デモページの予約は、実際に予約が行われる訳ではありません。</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div>
</section>


<section class="MenuCourse_type">
    <div class="n-container">

        <div class="MenuCourse_type_2">
            <h3>「お店・施設」タイプに適している業種や用途</h3>
            <ul class="suitable_box">
                <li class="suitable">レストラン</li>
                <li class="suitable">飲食店</li>
                <li class="suitable">美容院</li>
                <li class="suitable">理髪店</li>
                <li class="suitable">ネイルサロン</li>
                <li class="suitable">エステサロン</li>
                <li class="suitable">レンタルスタジオ</li>
                <li class="suitable">レンタルスペース</li>
                <li class="suitable">写真スタジオ</li>
                <li class="suitable">スポーツ施設</li>
                <li class="suitable">体育館</li>
                <li class="suitable">運動場</li>
                <li class="suitable">病院</li>
                <li class="suitable">クリニック</li>
                <li class="suitable">接骨院・整体</li>
                <li class="suitable">鍼灸院</li>
                <li class="suitable">健康診断</li>
                <li class="suitable">予防接種</li>
                <li class="suitable">カウンセリング</li>
                <li class="suitable">コーチング</li>
                <li class="suitable">結婚式場</li>
                <li class="suitable">果物狩り</li>
                <li class="suitable">バーベキュー場</li>
                <li class="suitable">サウナ</li>
                <li class="suitable">施設見学</li>
                <li class="suitable">弁護士</li>
                <li class="suitable">税理士</li>
                <li class="suitable-nb">…etc</li>
            </ul>
        </div>    
        
        <div class="MenuCourse_type_demo">
            <div class="text-c">
                <h3 class="under">「お店・施設」タイプのデモページ</h3>
            </div>
            <p>「お店・施設」タイプのデモページです。<strong class="red">営業日、定休日が決まっており、時間ごとに予約が可能となっております。</strong></p>
            
            <div class="row pad-45-m">
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/MenuCourse_type-01.jpg')}}" alt="飲食店のデモページ">
                        <h4><span class="under">飲食店</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/MenuCourse_type-02.jpg')}}" alt="美容院のデモページ">
                        <h4><span class="under">美容院</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/MenuCourse_type-03.jpg')}}" alt="スポーツ施設のデモページ">
                        <h4><span class="under">スポーツ施設</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>予約が行われる流れを理解していただくため、デモページから予約を行っていただくことも可能です。<br>
                        デモページの予約は、実際に予約が行われる訳ではありません。</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div>
</section>


<section class="Event_type">
    <div class="n-container">
        <div class="Event_type_2">
            <h3>「イベント」タイプに適している業種や用途</h3>
            <ul class="suitable_box">
                <li class="suitable">イベント開催</li>
                <li class="suitable">ワークショップ</li>
                <li class="suitable">展示会</li>
                <li class="suitable">展覧会</li>
                <li class="suitable">ライブ</li>
                <li class="suitable">ブライダルフェア</li>
                <li class="suitable">研修セミナー</li>
                <li class="suitable">説明会</li>
                <li class="suitable">面接</li>
                <li class="suitable">撮影会</li>
                <li class="suitable">交流会</li>
                <li class="suitable">観光</li>
                <li class="suitable">ツアー</li>
                <li class="suitable-nb">…etc</li>
            </ul>
        </div>    
        
        <div class="Event_type_demo">
            <div class="text-c">
                <h3 class="under">「イベント」タイプのデモページ</h3>
            </div>
            <p>「イベント」タイプのデモページです。<strong class="red">決まった日にちの時間から予約が可能となっております。</strong></p>
            
            <div class="row pad-45-m">
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/Event_type-01.jpg')}}" alt="ヨガスタジオのデモページ">
                        <h4><span class="under">展示会</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/Event_type-02.jpg')}}" alt="英会話スクールのデモページ">
                        <h4><span class="under">研修セミナー</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pad-45">
                        <img class="arrow-2" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                        <img class="img-fluid type-img" src="{{ asset('img/Event_type-03.jpg')}}" alt="料理教室のデモページ">
                        <h4><span class="under">面接</span>のデモページ</h4>
                        <a href="#" role="button">デモページ <i class="icon-another-window_w"></i></a>
                    </div>
                </div>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>予約が行われる流れを理解していただくため、デモページから予約を行っていただくことも可能です。<br>
                        デモページの予約は、実際に予約が行われる訳ではありません。</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div>
</section>


@endsection
