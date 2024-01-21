@extends('layouts.app')

@section('title', '機能について 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマは会員登録すると、ご自身で予約ページの作成・編集が可能となり、インターネットで予約を受けることができます。予約ページの作成・編集方法や、作成される予約ページ、予約ページの運用方法等についてご説明します。')

@section('content')

    <div class="page-title">
        <h1>機能について</h1>
    </div>  
    
    <div class="performance-back">
        <div class="l-container">
        	 <div id="pankuzu">
        	  <ol class="breadcrumb">
        		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
          		  <li class="breadcrumb-item active">機能について</li>
        	  </ol>
        	</div>
    	</div>
    
        <section class="performance-top s-container">
            <img src="{{ asset('img/performance-00.png')}}" alt="機能について">
            <p>ヨヤクマは会員登録すると、ご自身で予約ページの作成・編集が可能となり、予約ページを運用してインターネットで予約を受けることができます。（※予約ページを公開するには有料会員登録が必要です。）<br>
            予約ページの作成・編集方法や、作成される予約ページからどの様に予約がされるか、予約ページの運用方法等についてご説明します。</p>
        </section>
    </div>
    
    <section class="performance">
        <div class="container">
            <div class="yoyakuma-point">
                <img src="{{ asset('img/logomark.svg')}}" class="membertop-logo" alt="予約管理ならヨヤクマ">
                <h2 class="heading-title">ヨヤクマの機能</h2>
            </div>
            
            <article class="row per-conts">
                <div class="col-lg-5">
                    <img class="img-fluid per-img" src="{{ asset('img/performance-01.png')}}" alt="予約ページの作成">
                </div>
                <div class="col-lg-7">
                    <div class="boxContainer per-orange">
                        <img class="img-fluid box none-box" src="{{ asset('img/performance-o.svg')}}" alt="歯車（オレンジ）">
                        <h2 class="box none-box">予約ページの作成</h2>
                    </div>
                    <p>ヨヤクマの予約ページが、どのように作成されるかをご説明します。予約ページ作成は、どなたでも簡単に設定が行えるよう項目を見やすくし、カレンダーを直接クリックして行う仕様となっております。</p>
                    <div class="per-orange-btn">
                        <a href="{{ url('performance/create') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </article>
            
            <article class="row per-conts">
                <div class="col-lg-5">
                    <img class="img-fluid per-img" src="{{ asset('img/performance-02.png')}}" alt="予約ページの編集">
                </div>
                <div class="col-lg-7">
                    <div class="boxContainer per-orange">
                        <img class="img-fluid box none-box" src="{{ asset('img/performance-o.svg')}}" alt="歯車（オレンジ）">
                        <h2 class="box none-box">予約ページの編集</h2>
                    </div>
                    <p>作成された予約ページは、後から設定を変更することが可能です。設定方法は「予約ページの作成」と同様で、編集画面から変更を行うと設定が反映されます。</p>
                    <div class="per-orange-btn">
                        <a href="{{ url('performance/edit') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </article>
            
            <article class="row per-conts">
                <div class="col-lg-5">
                    <img class="img-fluid per-img" src="{{ asset('img/performance-03.png')}}" alt="作成される予約ページ">
                </div>
                <div class="col-lg-7">
                    <div class="boxContainer per-blue">
                        <img class="img-fluid box none-box" src="{{ asset('img/performance-b.svg')}}" alt="歯車（ブルー）">
                        <h2 class="box none-box">作成される予約ページ</h2>
                    </div>
                    <p>作成される予約ページが、どのようなデザインで、設定した内容がどのように反映されるかをご説明します。どのように予約が行われるかの流れも、ご理解いただければと思います。</p>
                    <div class="per-blue-btn">
                        <a href="{{ url('performance/createpage') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </article>
            
            <article class="row per-conts">
                <div class="col-lg-5">
                    <img class="img-fluid per-img" src="{{ asset('img/performance-04.png')}}" alt="予約ページの運用">
                </div>
                <div class="col-lg-7">
                    <div class="boxContainer per-blue">
                        <img class="img-fluid box none-box" src="{{ asset('img/performance-b.svg')}}" alt="歯車（ブルー）">
                        <h2 class="box none-box">予約ページの運用</h2>
                    </div>
                    <p>作成した予約ページを、どのように運用していくかをご説明します。<br>
                    予約がされたらどうお知らせするのか、予約状況はどう確認するのか、予約人数の変更やキャンセルの対応はどう行うのかといった具体的な運用方法になります。</p>
                    <div class="per-blue-btn">
                        <a href="{{ url('performance/operation') }}" role="button">詳しくはコチラ <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </article>

        </div>
    </section>


@endsection
