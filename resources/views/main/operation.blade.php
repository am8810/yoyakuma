@extends('layouts.app')

@section('title', '予約ページの運用 【予約管理ならヨヤクマ】')
@section('description', '作成した予約ページを、どのように運用していくかをご説明します。予約がされたらどうお知らせするのか、予約状況はどう確認するのか、予約人数の変更やキャンセルの対応はどう行うのかといった具体的な運用方法になります。')

@section('content')

    <div class="page-title">
        <h1>予約ページの運用</h1>
    </div>  
    
    <div class="top-gray-stripe">
        <div class="l-container">
            <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}/performance">機能について</a></li>
          		  <li class="breadcrumb-item active">予約ページの運用</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="under-performance s-container">
            <img src="{{ asset('img/operation-image.png')}}" alt="予約ページの運用　イメージ">
            <p>作成した予約ページを、どのように運用していくかをご説明します。<br>予約がされたらどうお知らせするのか、予約状況はどう確認するのか、予約人数の変更やキャンセルの対応はどう行うのかといった具体的な運用方法になります。</p>
        </section>
        
        <section class="m-container">
            <div class="explanation">
                <div class="blue-line"></div>
                <h2 class="create-page">予約ページの運用</h2>

                <article id="link" class="ope-m">
                    <h3>ホームページやSNS等との連携</h3>
                    <div class="orange-dotted"></div>
                    
                    <div class="row operation">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/operation-image-01.jpg')}}" alt="ホームページやSNS等との連携">
                        </div>
                        <div class="col-sm-6 sns-p">
                            <p>作成した予約ページは、そのままでは人に見れもらえません。予約ページのURLをコピーして、ホームページやSNS等から予約ページへリンクさせて運用をしてください。<br>
                            また、URLからQRコードを作成してチラシ等に入れる運用方法もあります。<br>
                            予約ページのURLは、画面上部にある赤枠の部分に表示されています。</p>
                        </div>
                    </div>
                </article>
                
                <article id="mail" class="ope-m">
                    <h3>予約がされたらどう伝わるか</h3>
                    <div class="orange-dotted"></div>
                    
                    <div class="row operation">
                        <div class="col-sm-6">
                            <img class="img-fluid ope-02" src="{{ asset('img/operation-image-02.svg')}}" alt="予約がされたらどう伝わるか">
                        </div>
                        <div class="col-sm-6">
                            <p>予約が入ったら、管理者と予約をされた方に自動通知メールが送信されます。<br>
                            管理者には「予約が入りました」メールが、予約をされた方には「予約完了のお知らせ」メールが送られ、メール本文に予約内容と予約をされた方の顧客情報が記載されます。<br>
                            管理者への自動通知メールは複数アドレスで受信可能です。複数の受信メールアドレスの設定方法は<a href="{{ url('performance/create#reception') }}">コチラ</a>をご覧ください。</p>
                        </div>
                    </div>
                </article>

                <article class="ope-m-2">
                    <h3>予約状況の確認</h3>
                    <div class="orange-dotted"></div>
                    
                    <p>予約ページから予約がされると、管理画面のトップページにあるカレンダーに色が付き、予約が反映されます。<br>
                    以下が、管理画面トップページのカレンダーに予約が反映された状態の表示になります。</p>
                    
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-09.jpg')}}" alt="管理画面">
                    </div>

                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
    
                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-03.jpg')}}" alt="予約状況の確認">
                        </div>
                        <div class="col-sm-6">
                            <p>反映されたカレンダーをクリックすると、予約内容が表示されます。<br>
                            どの予約がどの日時に、どなたが何名で予約し、合計金額がいくらなのかが表示され、残りの予約可能人数も表示されます。<br>
                            予約人数の変更とキャンセルのボタンも設置されます。</p>
                        </div>
                    </div>

                </article>


                <article id="change" class="ope-m-2">
                    <h3>予約人数の変更</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-04.jpg')}}" alt="予約人数の変更-1">
                        </div>
                        <div class="col-sm-6">
                            <p>予約人数の変更が必要な際は、カレンダーをクリックして予約内容を表示し、変更が必要な方の「予約人数の変更」をクリックしてください。</p>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-05.jpg')}}" alt="予約人数の変更-2">
                        </div>
                        <div class="col-sm-6">
                            <p>「変更する予約人数を選択してください」という表示がされるので、変更したい人数を選択し「登録」をクリックすると、予約人数が変更されます。</p>
                        </div>
                    </div>

                </article>
                
                
                <article id="cancel" class="ope-m-2">
                    <h3>予約がキャンセルされた場合</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-06.jpg')}}" alt="予約がキャンセルされた場合-1">
                        </div>
                        <div class="col-sm-6">
                            <p>予約がキャンセルされた場合は、カレンダーをクリックして予約内容を表示し、予約キャンセルが必要な方の「予約キャンセル」をクリックしてください。</p>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-07.jpg')}}" alt="予約がキャンセルされた場合-2">
                        </div>
                        <div class="col-sm-6 cancel">
                            <p>「本当に予約をキャンセルしますか？」という表示がされ、「予約キャンセルを実行」をクリックすると予約がキャンセルされます。</p>
                            
                            <table>
                                <tbody>
                                    <tr>
                                        <td>※</td>
                                        <td>一度予約をキャンセルすると元に戻すことはできません。</td>
                                    </tr>
                                    <tr>
                                        <td>※</td>
                                        <td>キャンセル料が発生する場合の対応は、予約をされた方との<strong>直接のやり取り</strong>をお願いいたします。</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>


                <article class="ope-m-2 iftel-m">
                    <h3>電話で予約があった場合</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p iftel">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-08.svg')}}" alt="電話で予約があった場合">
                        </div>
                        <div class="col-sm-6">
                            <p>電話で予約があった場合は、予約をされる方の「予約対象と日時（何の予約を、何日何時からか）」「お名前」「予約人数」「電話番号」を確認していただき、管理者ご自身で予約ページから予約を行なって、お客様情報を入力していただければと思います。<br>
                            もしくは、お電話からの予約は受け付けず、ネット予約のみの運用をしていただく等、ご対応をお願いいたします。</p>
                        </div>
                    </div>

                </article>


                <article id="customer" class="ope-m-2">
                    <h3>顧客情報の確認</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p customer-m-2">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/operation-image-09.jpg')}}" alt="顧客情報の確認">
                        </div>
                        <div class="col-sm-6">
                            <p>予約をされた方は、顧客情報として管理されます。顧客情報は、管理画面メニューの「顧客一覧」をクリックすると確認することができ、「予約予定日」「予約対象」「お名前」「フリガナ」「電話番号」「メールアドレス」が表示されます。<br>
                            ページを最初に開いた際に表示される顧客情報は、予約予定日が現在の日にち以降のものになります。</p>
                        </div>
                    </div>
                    
                    <div class="edit-conts customer-m">
                        <h4>❶ 過去の顧客を表示</h4>
                        <div class="row setting">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="{{ asset('img/operation-image-10.jpg')}}" alt="❶ 過去の顧客を表示">
                            </div>
                            <div class="col-sm-6">
                                <p>現在の日にちより過去の顧客を確認したい場合は、「過去の顧客」にチェックを入れた状態で「検索」をクリックしてください。</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="edit-conts customer-m cus-m">
                        <h4>❷ 顧客のキーワード検索</h4>
                        <div class="row setting">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="{{ asset('img/operation-image-11.jpg')}}" alt="❷ 顧客のキーワード検索">
                            </div>
                            <div class="col-sm-6">
                                <p>キーワード検索に、お名前や予約名を入力して「検索」をクリックすると、顧客を検索することができます。<br>
                                過去の顧客を検索する場合は、「過去の顧客」にチェックを入れた状態で行ってください。</p>
                            </div>
                        </div>
                    </div>

                </article>
                
                
                <article class="ope-m-2">
                    <h3>予約が定員に達した場合</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/operation-image-12.jpg')}}" alt="予約が定員に達した場合">
                        </div>
                        <div class="col-sm-6">
                            <p>予約が定員に達した場合、予約ページの「予約する」ボタンが非表示となり、代わりに「※コチラの予約は定員に達しました。」という文言が表示され、予約が行われないようになります。</p>
                        </div>
                    </div>
                </article>
                
                
                <article class="ope-m-3">
                    <h3>一時的に予約を停止したい場合</h3>
                    <div class="orange-dotted"></div>

                    <div class="row ope-p">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/operation-image-13.jpg')}}" alt="一時的に予約を停止したい場合">
                        </div>
                        <div class="col-sm-6">
                            <p>一時的に予約を停止したい場合は、「予約ページ編集」の「基本情報」をクリックし、「公開設定」を「非公開」にチェックを入れて「更新」をクリックしてください。<br>
                            予約ページは非公開状態となり、ログイン状態の管理者のみが閲覧可能で、一般ユーザーには閲覧されないようになります。非公開状態の予約ページは、「予約ページ編集」ページで「非公開」のタブをクリックすると確認できます。<br>
                            予約を再開する場合は、「公開設定」を「公開」にチェックを入れて「更新」をクリックしてください。</p>
                        </div>
                    </div>
                </article>

            </div>
        </section>
        
        
        <section class="m-container deployment">
            <div class="deplo-1">
                <img class="img-fluid" src="{{ asset('img/operation-image-14.svg')}}" alt="考えるヨヤクマ">
            </div>
            <div class="deplo-2">
                <img class="img-fluid" src="{{ asset('img/operation-image-15.svg')}}" alt="予約をたくさんしてもらうには？">
            </div>

            <p>予約をたくさんしてもらうには、様々な施策が必要になります。<br>
            まずは<strong class="under red">ホームページ、SNS、チラシ等で予約内容の魅力を知ってもらうこと</strong>が重要です。そこからヨヤクマの予約ページを利用して予約をしてもらいます。<br>
            ヨヤクマを運営しているスターティングデザインでは、ホームページ制作、SNS運用方法のレクチャー、チラシ制作等、予約内容の魅力を最大限に伝えるサポートをさせていただきます。</p>
            
            <div class="deplo-3">
                <img class="img-fluid" src="{{ asset('img/operation-image-16.png')}}" alt="予約内容の魅力を最大限に伝える">
            </div>
            
            <div class="deplo-4">
                <img class="img-fluid" src="{{ asset('img/performance-03.png')}}" alt="ヨヤクマの予約ページ">
            </div>
            
            <p>ヨヤクマとの連携や、ヨヤクマをご利用いただいている方には格安でホームページ制作、SNS運用レクチャー、チラシ制作を承っております。是非、予約をたくさんしてもらう為の施策をご検討される方は、スターティングデザインまでご相談ください。</p>

            <div class="deplo-5">
                <img class="img-fluid" src="{{ asset('img/starting-design.svg')}}" alt="スターティングデザイン">
            </div>

            <a href="https://starting-design.com/" role="button" target="_blank">サイトはコチラ <i class="icon-another-window_w"></i></a>
            
        </section>

    </div>

    
@endsection
