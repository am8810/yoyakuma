@extends('layouts.login_app')

@section('content')

<div class="page-title">
    <h1>ログイン</h1>
</div>  

<div class="orange-back">
    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">ログイン</li>
    	  </ol>
    	</div>
    </section>

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="login-space">
                    <img src="{{asset('img/logo.svg')}}">
                    
                    @if (session('warning'))
                    <div class="alert alert-danger">
                        {{ session('warning') }}
                    </div>
                    @endif
        
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
        
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samazon-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
        
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>入力情報が正しくない可能性があります。</strong>
                            </span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samazon-login-input" name="password" required autocomplete="current-password" placeholder="パスワード">
                        </div>
        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                <label class="form-check-label samazon-check-label w-100" for="remember">
                                    次回から自動的にログインする
                                </label>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <button type="submit" class="form-btn bgleft login-button">
                                <span>ログイン</span>
                            </button>
        
                            <a class="btn btn-link d-flex justify-content-center samazon-login-text" href="{{ route('password.request') }}">
                                パスワードをお忘れの場合
                            </a>
                        </div>
                    </form>
        
                    <hr>
        
                    <div class="form-group">
                        <a class="btn btn-link d-flex justify-content-center samazon-login-text login-new" href="{{ route('register') }}">
                            新規登録
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection