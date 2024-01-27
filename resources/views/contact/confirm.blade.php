@extends('layouts.app')

@section('title', '送信内容確認（お問い合わせ） 【予約管理ならヨヤクマ】')
@section('description', 'お問い合わせフォームに入力していただいた内容をご確認していただき、問題がなければ「送信」ボタンを押してください。')

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
	  </ol>
	</div>
</section>

<section class="s-container">
    <div class="contact-form">
        <img src="{{ asset('img/mail.svg')}}" alt="お問い合わせ">
        <h4>CONTACT FORM</h4>
        
        <div class="conts-title">
            <h2>送信内容確認</h2>
        </div>
        
        <p class="form-p">内容をご確認していただき、問題がなければ「送信」ボタンを押してください。</p>
    </div>

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <table class="table table-bordered table-striped table-contactform7">
            <tbody>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">お名前　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        {{ $inputs['name'] }}
                        <input
                            name="name"
                            value="{{ $inputs['name'] }}"
                            type="hidden">
                    </td>
                </tr>
                <tr>
                    <th><span class="title-contactform7">会社名</span></th>
                    <td>
                        {{ $inputs['company'] }}
                        <input
                            name="company"
                            value="{{ $inputs['company'] }}"
                            type="hidden">
                    </td>
                </tr>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">メールアドレス　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        {{ $inputs['email'] }}
                        <input
                            name="email"
                            value="{{ $inputs['email'] }}"
                            type="hidden">
                    </td>
                </tr>
                <tr>
                    <th><span class="title-contactform7">電話番号</span></th>
                    <td>
                        {{ $inputs['phone'] }}
                        <input
                            name="phone"
                            value="{{ $inputs['phone'] }}"
                            type="hidden">
                    </td>
                </tr>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">お問い合わせ内容　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        {!! nl2br(e($inputs['body'])) !!}
                        <input
                            name="body"
                            value="{{ $inputs['body'] }}"
                            type="hidden">
                    </td>
                </tr>
            </tbody>
        </table>
    
        <div id="send">
            <button type="submit" name="action" value="submit" class="form-btn bgleft btn">
                <span>送信 <i class="fas fa-angle-right"></i></span>
            </button>
        </div>
        
        <div class="back-btn">
            <button type="submit" name="action" value="back">入力内容修正 <i class="fas fa-angle-right"></i></button>
        </div>

    </form>
    
    <div class="explain">
        <p>入力いただきました個人情報は、ヨヤクマの情報提供の目的で利用し、個人情報の取り扱いに沿って適切に管理いたします。個人情報を入力・送信された場合、<a href="{{ url('privacy') }}" target="_blank">個人情報の取り扱い<i class="fas fa-external-link-alt"></i></a>にご同意いただけたものとします。<br>
        情報の開示・訂正・削除を希望される方は、下記の連絡先までお問い合わせください。<br>
        【ヨヤクマ運営元】スターティングデザイン<br>
        yoyakuma@starting-design.com</p>
    </div>
    
</section>
@endsection
