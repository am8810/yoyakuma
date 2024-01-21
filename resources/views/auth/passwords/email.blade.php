@extends('layouts.login_app')

@section('title', 'パスワード変更 【予約管理ならヨヤクマ】')
@section('description', '会員登録メールアドレスを入力してください。パスワード変更用のメールをお送りします。')

@section('content')

<div class="page-title">
    <h1>パスワード変更</h1>
</div>  

<div class="orange-back">
    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item"><a href="{{ route('login') }}">ログイン</a></li>
      		  <li class="breadcrumb-item active">パスワード変更</li>
    	  </ol>
    	</div>
    </section>

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="login-space">
                    
                    <img src="{{asset('img/logo.svg')}}">
                    
                    <h3>パスワード変更依頼</h3>
                    <p>会員登録メールアドレスを入力してください。パスワード変更用のメールをお送りします。</p>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
        
        
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
        
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samazon-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
        
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>メールアドレスが正しくない可能性があります。</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div id="blue-btn" class="form-group">
                            <button type="submit" class="form-btn bgleft login-button">
                                <span>送信</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
