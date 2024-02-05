@extends('layouts.app')

@section('title', '仮会員登録完了 【予約管理ならヨヤクマ】')
@section('description', '現在、仮会員の状態となっております。ただいま、ご入力頂いたメールアドレス宛に、ご本人様確認用のメールをお送りしました。メール本文内の「メールアドレス確認」をクリックすると本会員登録が完了となります。')

@section('content')

<div class="page-title register-title">
    <h1>仮会員登録完了</h1>
</div>  

<div class="register_body">

    <section class="container">
    	 <div id="pankuzu" class="register-pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ route('register') }}">新規会員登録</a></li>
      		  <li class="breadcrumb-item active">仮会員登録完了</li>
    	  </ol>
    	</div>
    </section>
    
    <section class="s-container">
        <div class="contact-form">
            <img src="{{ asset('img/register-icon.svg')}}" alt="新規会員登録">
            <h4>Member Registration</h4>
            
            <div class="conts-title">
                <h2>仮会員登録完了</h2>
            </div>
        </div>
            
		<div class="registration">
		    <img src="{{ asset('img/specialThanks.svg')}}" alt="仮会員登録完了">
		    
			<p>この度はヨヤクマ会員登録をしていただき、ありがとうございます！<br>
			<strong>現在、仮会員の状態となっていますので、以下の手順によって本会員登録を行ってください。</strong></p>
			
			<table>
			    <tbody>
			        <tr>
			            <td>※</td>
			            <td>仮会員の状態では、管理画面を表示することができません。<br>
			            管理画面を表示するには、本会員登録が必要です。</td>
			        </tr>
			    </tbody>
			</table>
			
		</div>

		<div class="full-membership">
            <div class="orange-line"></div>
            <h3>本会員登録について</h3>
            <p>仮会員登録が完了すると、会員登録でご入力いただいたメールアドレスにご本人確認用のメールが送られます。メール本文内の「メールアドレス確認」をクリックすると本会員登録が完了となり、管理画面が表示されます。</p>
            
            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>本会員登録は、仮会員登録が完了してから<strong>1時間以内</strong>に行ってください。（1時間を過ぎますと本会員登録が行えなくなります。）</td>
                    </tr>
                    <tr>
                        <td>※</td>
                        <td>本人確認のセキュリティの為、本会員登録を行う際は、<strong>仮ログイン（仮会員登録）しているブラウザと同一ブラウザ</strong>で、本人確認用メールの「メールアドレス確認」のリンクを開く必要があります。</td>
                    </tr>
                </tbody>
            </table>

            <img src="{{ asset('img/browser.jpg')}}" alt="各ブラウザ">
            
            <h4>1時間以内に、仮会員登録を行ったブラウザと<br class="display-xs">同じブラウザで本会員登録を行ってください。</h4>

		</div>
		
    </section>
    
</div>

@endsection