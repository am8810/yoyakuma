@extends('layouts.app')

@section('title', '料金 【予約管理ならヨヤクマ】')
@section('description', '有料会員としてのヨヤクマの料金プランは、月額2,980円（税抜）の1プランのみとなっております。予約ページを何ページでも作成することができ、予約可能人数の制限もなく、予約された際の手数料も一切かかりません。')

@section('content')

    <div class="page-title">
        <h1>料金</h1>
    </div>  
    
    <div class="price-back">
        <div class="l-container">
            <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
          		  <li class="breadcrumb-item active">料金</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="n-container">
            <div class="yoyakuma-point">
                <img src="{{ asset('img/logomark.svg')}}" class="price-logo" alt="予約管理ならヨヤクマ">
                <h2 class="heading-title">ヨヤクマの料金</h2>
            </div>
            
            <div class="price-box">
                <img class="price-parts-01" src="{{ asset('img/price-parts-01.svg')}}" alt="1プラン">
                <img class="price-parts-02" src="{{ asset('img/price-parts-02.svg')}}" alt="月額2,980円（税抜）">
            </div>
            
            <div class="row pad-45-m top-price price-pa">
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
                    </div>
                </div>
            </div>
                
        </section>
        
        <section id="paid" class="m-container">
            <div class="paid">
                <div class="orange-line"></div>
                <h2>有料会員登録の方法</h2>
                <article class="paid-conts">
                    <div class="boxContainer">
                        <div class="box"><h4>STEP.1</h4></div>
                        <div class="box"><h3>新規会員登録</h3></div>
                    </div>
                    
                    <div class="orange-dotted-3"></div>
                    
                    <p>まずは、<a href="{{ route('register') }}">新規会員登録フォーム</a>にて必要項目を入力していただき、アカウントを作成してください。</p>
                </article>
                
                <article class="paid-conts">
                    <div class="boxContainer">
                        <div class="box step2"><h4>STEP.2</h4></div>
                        <div class="box"><h3>管理画面の「基本情報」から「有料会員登録」へ</h3></div>
                    </div>
                    
                    <div class="orange-dotted-3"></div>
                    
                    <div class="row paid-pa">
                        <div class="col-sm-6">
                            <img class="img-fluid capture paid-img" src="{{ asset('img/price-01.jpg')}}" alt="管理画面の「基本情報」から「有料会員登録」へ-1">
                        </div>
                        <div class="col-sm-6">
                            <p class="pa-adjustment-4">アカウントが作成されると、管理画面への<a href="{{ route('login') }}">ログイン</a>が可能になります。新規会員登録の際に設定したメールアドレスとパスワードでログインしていただき、上部メニューの「基本情報」をクリックしてください。</p>
                        </div>
                    </div>
                    
                    <img class="img-fluid s-arrow price-arrow" src="{{ asset('img/arrow.svg')}}" alt="矢印">
                    
                    <div class="row paid-pa">
                        <div class="col-sm-6">
                            <img class="img-fluid capture paid-img" src="{{ asset('img/price-02.jpg')}}" alt="管理画面の「基本情報」から「有料会員登録」へ-2">
                        </div>
                        <div class="col-sm-6">
                            <p>「基本情報」をクリックすると、「有料会員登録」の項目があります。こちらをクリックしてください。</p>
                        </div>
                    </div>
                </article>
                
                <article class="paid-conts paid-pa-2">
                    <div class="boxContainer">
                        <div class="box step3"><h4>STEP.3</h4></div>
                        <div class="box"><h3>クレジットカード情報の入力</h3></div>
                    </div>
                    
                    <div class="orange-dotted-3"></div>
                    
                    <p>有料会員登録ページにてクレジットカード情報を入力していただき、「利用規約」と「個人情報の取り扱い」の同意にチェックをして、「有料会員登録」をクリックすると有料会員として登録されます。</p>
                    
                    <table>
                        <tbody>
                            <tr>
                                <td>※</td>
                                <td>有料会員登録のお支払い方法は、クレジットカード決済のみとなっております。</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="scroll-image">
                        <img class="img-fluid" src="{{ asset('img/price-03.jpg')}}" alt="クレジットカード情報の入力">
                    </div>

                </article>
            </div>
        </section>
        
        <section class="m-container not-paid">
            <img class="img-fluid" src="{{ asset('img/price-04.svg')}}" alt="有料会員ではない場合">
            <p>ヨヤクマの予約管理システムは、無料会員のままでも予約ページを作成・編集することは可能です。しかし、無料会員のまま作成する予約ページは「非公開状態」となり、ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。<br>
            無料会員としてヨヤクマの操作性を試すことはできますが、実際に予約が行えるようにするには有料会員登録が必要です。</p>
        </section>
    
    </div>
        


@endsection
