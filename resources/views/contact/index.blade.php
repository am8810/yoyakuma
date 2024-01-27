@extends('layouts.app')

@section('title', 'お問い合わせ 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマに関してご不明点やご相談がありましたらお気軽にご連絡ください。お問い合わせフォームに必要事項を入力し、「個人情報の取り扱い」に同意のチェックをいただき、「送信内容を確認」ボタンを押してください。')

@section('content')

<div class="page-title">
    <h1>お問い合わせ</h1>
</div>  

<section class="container">
	 <div id="pankuzu">
	  <ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
  		  <li class="breadcrumb-item active">お問い合わせ</li>
	  </ol>
	</div>
</section>

<section class="s-container">
    <div class="contact-form">
        <img src="{{ asset('img/mail.svg')}}" alt="お問い合わせ">
        <h4>CONTACT FORM</h4>
        
        <div class="conts-title">
            <h2>お問い合わせ<br class="hidden-xs">フォーム</h2>
        </div>
        
        <p>下記の項目を入力していただき、「個人情報の取り扱い」に同意のチェックをして「送信内容を確認」ボタンを押してください。</p>
    </div>

    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <table class="table table-bordered table-striped table-contactform7">
            <tbody>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">お名前　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        <input
                            name="name"
                            value="{{ old('name') }}"
                            type="text" placeholder=" お名前を入力してください" autofocus class="form-control">
                        @if ($errors->has('name'))
                            <p class="error-message">{{ $errors->first('name') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><span class="title-contactform7">会社名</span></th>
                    <td>
                        <input
                            name="company"
                            value="{{ old('company') }}"
                            type="text" placeholder=" 会社名を入力してください" class="form-control">
                    </td>
                </tr>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">メールアドレス　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        <input
                            name="email"
                            value="{{ old('email') }}"
                            type="text" placeholder=" メールアドレスを入力してください" class="form-control">
                        @if ($errors->has('email'))
                            <p class="error-message">{{ $errors->first('email') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><span class="title-contactform7">電話番号</span></th>
                    <td>
                        <input
                            name="phone"
                            value="{{ old('phone') }}"
                            type="text" placeholder=" 電話番号を入力してください" class="form-control">
                    </td>
                </tr>
                <tr style="background-color: #fef4e5;">
                    <th><span class="title-contactform7">お問い合わせ内容　</span><span class="required-contactform7">必須</span></th>
                    <td>
                        <textarea name="body" placeholder=" お問い合わせ内容を入力してください" class="form-control">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <p class="error-message">{{ $errors->first('body') }}</p>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button class="form-btn bgleft btn" type="submit" value="送信内容を確認">
            <span>送信内容を確認 <i class="fas fa-angle-right"></i></span>
        </button>

    </form>
    
    <div class="explain">
        <p>入力いただきました個人情報は、ヨヤクマの情報提供の目的で利用し、個人情報の取り扱いに沿って適切に管理いたします。個人情報を入力・送信された場合、<a href="{{ url('privacy') }}" target="_blank">個人情報の取り扱い<i class="fas fa-external-link-alt"></i></a>にご同意いただけたものとします。<br>
        情報の開示・訂正・削除を希望される方は、下記の連絡先までお問い合わせください。<br>
        【ヨヤクマ運営元】スターティングデザイン<br>
        yoyakuma@starting-design.com</p>
    </div>

</section>
@endsection
