@extends('layouts.login_app')

@section('title', 'パスワードリセット 【予約管理ならヨヤクマ】')
@section('description', '会員登録メールアドレスを入力して、再設定したいパスワードを入力してください。')

@section('content')

<div class="page-title">
    <h1>パスワードリセット</h1>
</div>  

<div class="orange-back">
    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item"><a href="{{ route('login') }}">ログイン</a></li>
      		  <li class="breadcrumb-item active">パスワードリセット</li>
    	  </ol>
    	</div>
    </section>

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="login-space">
                    
                    <img src="{{asset('img/logo.svg')}}">
    
                    <h3>パスワードリセット</h3>
                    <p>会員登録メールアドレスを入力して、再設定したいパスワードを入力してください。</p>
                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
    
                        <input type="hidden" name="token" value="{{ $token }}">
    
                        <div class="form-group">
                            <input id="email" type="email" class="samazon-login-input form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <input id="password" type="password" class="samazon-login-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="新しいパスワード">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="samazon-login-input form-control" name="password_confirmation" required autocomplete="new-password" placeholder="新しいパスワード（確認用）">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="form-btn bgleft login-button">
                                <span>{{ __('Reset Password') }}</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
