@extends('layouts.app')

@section('title', '予約ページの作成 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマの予約ページが、どのように作成されるかをご説明します。予約ページ作成は、どなたでも簡単に設定が行えるよう、項目を見やすくし、カレンダーを直接クリックして行う仕様となっております。')

@section('content')

    <div class="page-title">
        <h1>予約ページの作成</h1>
    </div>  
    
    <div class="top-gray-stripe">
        <div class="l-container">
            <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}/performance">機能について</a></li>
          		  <li class="breadcrumb-item active">予約ページの作成</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="under-performance s-container">
            <img src="{{ asset('img/create-image.png')}}" alt="予約ページ作成　イメージ">
            <p>ヨヤクマの予約ページが、どのように作成されるかをご説明します。予約ページ作成は、どなたでも簡単に設定が行えるよう、項目を見やすくし、カレンダーを直接クリックして行う仕様となっています。</p>
        </section>
        
        <section class="m-container">
            <div class="explanation">
                <div class="orange-line"></div>
                <h2>予約ページの作成</h2>
                <p>予約ページはまず、「基本情報」の設定を行い、次に「日程・定員数」の設定を行って作成します。<br>以下が「基本情報」の設定画面になります。</p>
                
                <div class="scroll-image">
                    <img class="img-fluid" src="{{ asset('img/create-image-01.jpg')}}" alt="予約ページ作成　1ページ目（基本情報の入力）">
                </div>
                
                <p>それぞれの項目について、どのような設定が可能がご説明します。</p>
                
                <article class="release-note">
                    <h3>公開設定</h3>
                    <div class="orange-dotted"></div>
                    <p>予約ページは、公開状態か非公開状態か選択することができます。<br>
                    公開状態は誰にでも閲覧可能な状態となり、非公開状態はログイン状態の管理者のみが閲覧可能で、一般ユーザーからは閲覧不可能となり、一時的に予約受付を停止することができます。</p>
                    <table>
                      <tbody>
                          <tr>
                              <td>※</td>
                              <td>有料会員登録をしないと、公開設定を「公開」にすることができません。</td>
                          </tr>
                      </tbody>
                    </table>
                </article>

                <article>
                    <h3>タイトル</h3>
                    <div class="orange-dotted"></div>
                    <p>予約ページのタイトルを入力します。どのような予約ページかが分かるタイトルを任意でご入力ください。</p>
                </article>
                
                <article>
                    <h3>説明文</h3>
                    <div class="orange-dotted"></div>
                    <p>予約ページの内容について、詳細を入力します。文字数の制限はなく改行もできますので、任意の文章をご入力ください。</p>
                </article>

                <article>
                    <h3>イメージ画像</h3>
                    <div class="orange-dotted"></div>
                    <p>予約のイメージが伝わる画像をアップロードします。<br>
                    画像データは横幅が600px以上のサイズを推奨しており、jpeg、png、svgのいずれかの形式のものをご使用ください。<br>
                    （イメージ画像の設定が無い場合、「no image」と表示されます）</p>
                </article>
                
                <article>
                    <h3>ロゴマーク画像</h3>
                    <div class="orange-dotted"></div>
                    <p>予約ページごとにロゴマーク画像の設定も可能です。<br>
                    画像データは横幅が60px以上のサイズを推奨しており、jpeg、png、svgのいずれかの形式のものをご使用ください。<br>
                    （ロゴマーク画像の設定が無い場合、ヨヤクマのロゴマークが薄く表示されます）</p>
                </article>
                
                <article>
                    <h3>予約価格</h3>
                    <div class="orange-dotted"></div>
                    <p>1人あたりの予約価格（税込）を入力します。無料の場合は0と入力すると、予約ページには「無料」と表示されます。予約時に価格は決まっておらず、現地で算定される場合は「予約時に価格は算定されません」にチェックを入れてください。</p>
                </article>

                <article>
                    <h3>日時・人数の変更について</h3>
                    <div class="orange-dotted"></div>
                    <p>予約をされた方から日時・人数の変更のご要望があった際に、どのようにご対応されるか、任意の文章をご入力ください。</p>
                </article>
                
                <article>
                    <h3>キャンセルについて</h3>
                    <div class="orange-dotted"></div>
                    <p>予約をされた方から予約キャンセルのご要望があった際に、何日前まではキャンセル料は無料で、何日前からはキャンセル料が発生するといったことを任意の文章でご入力ください。</p>
                    <table>
                      <tbody>
                          <tr>
                              <td>※</td>
                              <td>キャンセル料が発生する場合の対応は、<strong>予約をされた方との直接のやり取り</strong>をお願いいたします。</td>
                          </tr>
                      </tbody>
                    </table>
                </article>
                
                <article id="reception">
                    <h3>予約受信メールアドレス</h3>
                    <div class="orange-dotted"></div>
                    <p>予約がされた際に、予約通知メールを受信するアドレスを入力してください。<br>
                    複数のアドレスで受信する場合は、「追加」をクリックして複数のアドレスを入力してください。</p>
                    <img class="img-fluid create-mail" src="{{ asset('img/create-mail-btn.jpg')}}" alt="「追加」ボタン">
                </article>

                <article id="calendar-color">
                    <h3>予約カレンダーの色</h3>
                    <div class="orange-dotted"></div>
                    <p>管理画面の予約カレンダーに表示される色を自由に選択することができます。</p>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-fluid create-image-color" src="{{ asset('img/create-image-color.jpg')}}" alt="予約カレンダーの色">
                        </div>
                        <div class="col-sm-9 create-color">
                            <p>四角い色の部分をクリックすると、色を選択できる表示がされます。<br>
                            カーソルを動かして色を選択するか、RGBの色の数値を入力してください。<br>
                            <br>
                            色が選択できたら「色を決定」をクリックしてください。</p>
                            <img class="img-fluid" src="{{ asset('img/create-color-btn.jpg')}}" alt="「色を決定」ボタン">
                            <p>「現在選択している色は #000000です。」の部分が変更されたら、色が反映されます。</p>
                        </div>
                    </div>
                </article>

                <img class="img-fluid p-arrow" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                <div class="arrow-p">
                    <p class="to-step2">以上の「基本情報」の設定が完了したら、<strong>「日程・定員数」</strong>の設定へ移ります。</p>
                </div>  
                
                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/create-image-02.jpg')}}" alt="予約ページ作成　2ページ目（日程・定員数）">
                    </div>
                    
                    <div class="date-note">
                        <p>日時・定員数はカレンダーを<strong>直接クリック</strong>すると設定が行えます。また、<strong>日時・定員数の設定は複数行うことが可能です。</strong></p>
                        
                        <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>日付をまたいだ設定は行えません。</td>
                              </tr>
                          </tbody>
                        </table>
                        
                        <p>以下が日時・定員数の設定手順になります。</p>
                    </div>
    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/create-image-03.jpg')}}" alt="日程・定員数　設定1">
                        </div>
                        <div class="col-sm-6">
                            <p>予約を受けたい日時のカレンダーを<strong>直接クリック</strong>します。</p>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/create-image-04.jpg')}}" alt="日程・定員数　設定2">
                        </div>
                        <div class="col-sm-6">
                            <p class="pa-adjustment-1">日時・定員数の選択画面が表示されます。<br>
                            日にちと時間は、カレンダーをクリックした日時が設定されており、手動で変更することもできます。<br>
                            この日時に予約可能な人数を定員数として入力してください。</p>
                        </div>
                    </div>
    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/create-image-05.jpg')}}" alt="日程・定員数　設定3">
                        </div>
                        <div class="col-sm-6">
                            <p>繰り返し設定で、同じ設定を毎日か毎週で繰り返して設定することも可能です。</p>
                            
                            <div class="repetition">
                                <table>
                                  <tbody>
                                      <tr class="red">
                                          <td>※</td>
                                          <td>繰り返し期間は1年先までになります。<br>
                                          1年先以降の設定は、先の日にちのカレンダーを別途選択して行ってください。</td>
                                      </tr>
                                      <tr>
                                          <td>※</td>
                                          <td>繰り返し設定は、日程・定員数の新規作成時のみ表示され、既に設定されているものをクリックしても表示されません。</td>
                                      </tr>
                                  </tbody>
                                </table>
                                
                                <p>設定が完了したら「登録」をクリックすると、カレンダーに設定が反映されます。</p>
                            </div>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
    
                    <div class="row setting">
                        <div class="col-sm-6">
                            <img class="img-fluid capture" src="{{ asset('img/create-image-06.jpg')}}" alt="日程・定員数　設定4">
                        </div>
                        <div class="col-sm-6">
                            <p>カレンダーに設定した日時が反映され、色が付きます。<br>
                            設定した日時を個別で編集・削除することも可能です。</p>
                        </div>
                    </div>
                </article>

                <img class="img-fluid p-arrow comp-a" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                <article>
                    <div class="arrow-p">
                        <p class="pageCompleted">「日時・定員数」の設定が完了したら、<strong>「ページ作成」</strong>ボタンをクリックして予約ページ作成完了です！</p>
                    </div>  
    
                    <img class="img-fluid complete" src="{{ asset('img/complete.svg')}}" alt="Created!!">
                </article>
                
            </div>
        </section>
    </div>


@endsection
