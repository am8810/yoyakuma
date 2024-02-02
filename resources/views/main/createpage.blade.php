@extends('layouts.app')

@section('title', '作成される予約ページ 【予約管理ならヨヤクマ】')
@section('description', '作成される予約ページが、どのようなデザインで、設定した内容がどのように反映されるかをご説明します。どのように予約が行われるかの流れも、ご理解いただければと思います。')

@section('content')

    <div class="page-title">
        <h1>作成される予約ページ</h1>
    </div>  
    
    <div class="top-gray-stripe">
        <div class="l-container">
            <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}/performance">機能について</a></li>
          		  <li class="breadcrumb-item active">作成される予約ページ</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="under-performance s-container">
            <img src="{{ asset('img/createpage-image.png')}}" alt="作成される予約ページ　イメージ">
            <p>作成される予約ページが、どのようなデザインで、設定した内容がどのように反映されるかをご説明します。予約が行われる流れもご理解いただければと思います。</p>
        </section>
        
        <section class="m-container">
            <div class="explanation">
                <div class="blue-line"></div>
                <h2 class="create-page">作成される予約ページ</h2>
                <p>作成される予約ページは、以下のようなデザインになります。</p>
                
                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-01.jpg')}}" alt="作成される予約ページ">
                    </div>
    
                    <p>予約ページ作成の基本情報で設定した「タイトル」「説明文」「イメージ画像」「ロゴマーク画像」「予約価格」「日時・人数の変更について」「キャンセルについて」が反映されています。ロゴマークの横に「提供者」の表示があり、この部分はヨヤクマの会員登録時に設定した「企業名・屋号名・団体名」が反映されます。<br>
                    「予約する」ボタンをクリックすると、「日時・人数の選択」画面へ移ります。</p>
                </article>
                
                <img class="img-fluid p-arrow first-arrow-2" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-02.jpg')}}" alt="日時・人数の選択">
                    </div>
                    
                    <p>「日時・人数の選択」画面では、「予約対象」「日にち」「時間」「予約人数」の項目があり、予約したい日時と人数を選択することができます。</p>
                </article>

                <article class="createpage-conts">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/createpage-image-03.jpg')}}" alt="日にちの選択">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="flow-m">日にちの選択</h3>
                            <div class="orange-dotted"></div>
                            <p class="pa-adjustment-3">「日にち」をクリックするとカレンダーが表示され、予約ページ作成時に設定した日にちが選択できるようになっています。<br>
                            （予約が定員に達している日にちは選択不可となります）</p>
                        </div>
                    </div>
                </article>
                
                <img class="img-fluid s-arrow s-ar-m" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                <article class="createpage-conts">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/createpage-image-04.jpg')}}" alt="時間の選択">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="flow-m">時間の選択</h3>
                            <div class="orange-dotted"></div>
                            <p class="pa-adjustment-3">「時間」をクリックすると、選択した日にちに予約可能な時間のみが選択できるようになっています。<br>
                            （予約が定員に達している時間は選択不可となります）</p>
                        </div>
                    </div>
                </article>
                
                <img class="img-fluid s-arrow s-ar-m" src="{{ asset('img/arrow.svg')}}" alt="矢印">

                <article class="createpage-conts">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('img/createpage-image-05.jpg')}}" alt="予約人数の選択">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="flow-m">予約人数の選択</h3>
                            <div class="orange-dotted"></div>
                            <p>「予約人数」をクリックすると、選択した日にちと時間に設定されている定員数で、予約可能な人数のみが選択できるようになっています。</p>
                        </div>
                    </div>
                </article>
                
                <div class="createpage-m">
                    <p>「日にち」「時間」「予約人数」の選択が完了したら「次へ」をクリックして「お客様情報」ページへ移ります。</p>
                    
                    <table>
                        <tbody>
                            <tr>
                                <td>※</td>
                                <td>「日にち」を選択してから「時間」を選択し、「時間」を選択してから「予約人数」を選択する必要があります。</td>
                            </tr>
                            <tr>
                                <td>※</td>
                                <td>予約人数は、選択している日時に予約可能な人数が表示されます。</td>
                            </tr>
                            <tr>
                                <td>※</td>
                                <td>1回の予約で予約可能な人数は、最大20人までとなります。20人を超える予約をされる場合は、複数回に分けて予約を行う必要があります。</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <img class="img-fluid p-arrow arrow-mb" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">
                
                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-06.jpg')}}" alt="お客様情報">
                    </div>
    
                    <p>「お客様情報」ページでは、予約をされる方の「お名前」「フリガナ」「電話番号」「メールアドレス」を入力していただきます。ここで入力していただいた情報が顧客情報となり、管理画面で確認することができます。<br>
                    入力が完了したら「内容確認へ進む」をクリックして「内容確認」ページへ移ります。</p>
                </article>

                <img class="img-fluid p-arrow arrow-mb" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">

                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-07.jpg')}}" alt="内容確認">
                    </div>
    
                    <p>「内容確認」ページでは、予約対象、予約日時、予約人数、合計金額、予約に関しての注意事項、予約者様情報が表記され、予約申込み前に予約内容を最終確認することができます。<br>
                    予約内容に問題がなければ「予約する」をクリックして予約完了となります。</p>
                </article>

                <img class="img-fluid p-arrow arrow-mb" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">

                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-08.jpg')}}" alt="予約完了">
                    </div>
    
                    <p>「予約完了」になると、管理者と予約をされた方に自動通知メールが送信されます。予約者様のメールアドレスに「予約完了のお知らせ」メールが送信され、管理者には「予約が入りました」メールが送信されます。管理者への自動通知メールは複数アドレスで受信可能です。<br>
                    予約に関してのお問い合わせ先として、ヨヤクマの会員登録時に設定した「企業名・屋号名・団体名」「電話番号」が反映されます。</p>
                </article>

                <img class="img-fluid p-arrow arrow-mb" src="{{ asset('img/performance-arrow.svg')}}" alt="矢印">

                <article>
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/createpage-image-09.jpg')}}" alt="管理画面">
                    </div>
                    
                    <p class="reflection">予約がされると、管理画面のトップページにあるカレンダーに予約が反映されます。反映された予約をクリックすると予約内容が表示され、予約対象と予約日時、予約者様のお名前と人数、合計金額が確認できます。また、この日時の予約に対しての「残り予約可能人数」も確認することができます。</p>
    
                    <img class="img-fluid s-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
    
                    <img class="img-fluid" src="{{ asset('img/createpage-image-10.jpg')}}" alt="予約内容確認">
                </article>

            </div>
        </section>
        
        
        <section class="m-container edit-s-2">
            <div class="explanation">
                <div class="red-line"></div>
                <div class="overCapacity"><h2>予約が定員に達した際の表示</h2></div>
                <div class="red-dotted"></div>
                
                <article>
                    <p>予約が定員に達した際は、予約ページの「予約する」ボタンが非表示となり、代わりに「※コチラの予約は定員に達しました。」という表記がされます。「予約する」ボタンが非表示になる為、定員を超えた予約はされることはありませんのでご安心ください。</p>
                    
                    <img class="img-fluid capture" src="{{ asset('img/createpage-image-11.jpg')}}" alt="予約が定員に達した際の表示">
                </article>

                <article class="incase">
                    <table>
                        <tbody>
                            <tr>
                                <td>※</td>
                                <td>万が一、予約フォームを入力中に定員に達してしまった場合</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <p>複数の方が同時に予約をしようとした際に万が一、予約フォームを入力中に定員に達してしまった場合は、「内容確認」ページの「予約する」ボタンをクリックした際に、「※コチラの予約は定員に達しました。」と表記され、予約がされない仕様となっております。</p>
                    
                    <img class="img-fluid capture" src="{{ asset('img/createpage-image-12.jpg')}}" alt="※万が一、予約フォームを入力中に定員に達してしまった場合">

                </article>
            </div>
        </section>

    </div>

    
@endsection
