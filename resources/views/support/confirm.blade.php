@extends('layouts.member_app')

@section('title', '送信内容確認（zoomサポート） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', 'zoomサポートのフォームに入力していただいた内容をご確認していただき、問題がなければ「送信」ボタンを押してください。')

@section('content')
<div class="member-body">
    <section class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ url('support') }}">zoomサポート</a></li>
      		  <li class="breadcrumb-item active">送信内容確認</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">
        <div class="member-top-body">
            <div class="s-form-title">
                <img src="{{ asset('img/zoom-support.svg')}}" alt="zoomサポート">
            </div>
            
            <p class="s-confirm">内容をご確認していただき、問題がなければ「送信」ボタンを押してください。</p>
            
            <h2 class="s-title">送信内容確認</h2>
            
            <form method="POST" action="{{ route('support.send') }}">
                @csrf
                
                <div class="support-form">

                    <img src="{{asset('img/logo.svg')}}">
                    
                    <h3 class="confirm-m">会員情報</h3>
                </div>
                
                <table class="table table-bordered table-striped table-contactform7">
                    <tbody>
                        <tr style="background-color: #e5f8fc;">
                            <th><span class="title-contactform7">ご担当者名　</span></th>
                            <td>
                            {{ $inputs['name'] }}
                            <input
                                name="name"
                                value="{{ $inputs['name'] }}"
                                type="hidden">
                            </td>
                        </tr>
                        <tr>
                            <th><span class="title-contactform7">企業名・屋号名・団体名</span></th>
                            <td>
                            {{ $inputs['company'] }}
                            <input
                                name="company"
                                value="{{ $inputs['company'] }}"
                                type="hidden">
                            </td>
                        </tr>
                        <tr style="background-color: #e5f8fc;">
                            <th><span class="title-contactform7">メールアドレス　</span></th>
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
                    </tbody>
                </table>
                
                <div class="what-trouble">
                    <img src="{{ asset('img/what-trouble.svg')}}" alt="どの様なお困りごとですか？">
                    
                    {!! nl2br(e($inputs['body'])) !!}
                    <input
                        name="body"
                        value="{{ $inputs['body'] }}"
                        type="hidden">
                </div>
                
                <div id="send">
                    <button type="submit" name="action" value="submit" class="form-btn bgleft btn">
                        <span>送信 <i class="fas fa-angle-right"></i></span>
                    </button>
                </div>

                <div class="back-btn">
                    <button type="submit" name="action" value="back">入力内容修正 <i class="fas fa-angle-right"></i></button>
                </div>

            </form>
            
        </div>
    </section>
</div>
@endsection

