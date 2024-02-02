@extends('layouts.member_app')

@section('title', 'パスワード変更 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマ会員のパスワード変更画面です。パスワードを変更する必要がある場合は、新しいパスワードを入力して「パスワード更新」をクリックしてください。')

@section('content')
<div class="member-body">
    <div class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ route('mypage') }}">基本情報</a></li>
      		  <li class="breadcrumb-item active">パスワード変更</li>
    	  </ol>
    	</div>
    </div>

    <div id="password-edit" class="s-container user-page-icon">
        <div class="member-top-body">
            <img src="{{ asset('img/user-icon-4.jpg')}}" alt="パスワード変更">
            <h1 class="mypage-title">パスワード変更</h1>
            
            <p>パスワードを変更する必要がある場合は、以下から新しいパスワードに更新してください。</p>
    
            <form method="post" action="{{route('mypage.update_password')}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">新しいパスワード</label>
        
                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="8文字以上の半角英数字">
        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-right">確認用</label>
        
                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="8文字以上の半角英数字">
                    </div>
                </div>
        
                <div id="pass-update" class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn w-25">
                        パスワード更新
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection