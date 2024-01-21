@extends('layouts.app')

@section('title', 'お問い合わせ完了 【予約管理ならヨヤクマ】')
@section('description', 'この度はヨヤクマへお問い合わせいただき、ありがとうございます。メールをご確認の後、1〜3日以内にご返信させていただきます。しばらくたっても返信、返答がない場合は、ご入力いただいたメールアドレスに誤りがある場合がございます。')

@section('content')

<div class="page-title">
    <h1>お問い合わせ</h1>
</div>  

<section class="container">
	 <div id="pankuzu">
	  <ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
  		  <li class="breadcrumb-item"><a href="{{ url('/') }}/contact">お問い合わせ</a></li>
  		  <li class="breadcrumb-item active">送信内容確認</li>
  		  <li class="breadcrumb-item active">お問い合わせ完了</li>
	  </ol>
	</div>
</section>

<section class="s-container">
    <div class="contact-form">
        <img src="{{ asset('img/mail.svg')}}" alt="お問い合わせ">
        <h4>CONTACT FORM</h4>
        
        <div class="conts-title">
            <h2>お問い合わせ完了</h2>
        </div>
    </div>

    <p>この度はヨヤクマへお問い合わせいただき、ありがとうございます。<br>
    メールをご確認の後、1〜3日以内にご返信させていただきます。<br>
    <br>
    なお、しばらくたっても返信、返答がない場合は、ご入力いただいたメールアドレスに誤りがある場合がございます。<br>
    その際は、お手数ですが再度送信いただくか、下記の連絡先までご連絡いただけますと幸いです。<br>
    <br>
    何かご不明な点等がございましたら、お気軽にお問い合わせください。</p>
    
    <div class="top-info">
        <h3>お問い合わせ先</h3>
        <p>【予約管理ならヨヤクマ】<br>
        担当者：天野<br>
        メールアドレス：yoyakuma@starting-design.com<br>
        電話番号：080-5161-5304</p>
        
        <a href="{{ url('/') }}" role="button">トップページへ戻る <i class="fas fa-angle-right"></i></a>
    </div>
</section>
@endsection