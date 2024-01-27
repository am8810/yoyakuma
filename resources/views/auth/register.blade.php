@extends('layouts.register_app')

@section('content')

<div class="page-title register-title">
    <h1>新規会員登録</h1>
</div>  

<div class="register_body">

    <section class="container">
    	 <div id="pankuzu" class="register-pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">新規会員登録</li>
    	  </ol>
    	</div>
    </section>
    
    <section class="s-container">
        <div class="contact-form">
            <img src="{{ asset('img/register-icon.svg')}}" alt="新規会員登録">
            <h4>Member Registration Form</h4>
            
            <div class="conts-title">
                <h2>新規会員登録<br class="hidden-xs">フォーム</h2>
            </div>
            
            <p>下記の項目を入力していただき、「利用規約」と「個人情報の取り扱い」に同意のチェックをして「会員登録」をクリックしてください。</p>
            
            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>入力項目は全て必須項目です。</td>
                    </tr>
                    <tr>
                        <td>※</td>
                        <td>「メールアドレス」と「あなたのページアドレス」以外はアカウント作成後に変更可能です。</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <table class="table table-bordered table-striped table-contactform7">
                <tbody class="register-form">
                    <tr style="background-color: #fef4e5;">
                        <th><span class="title-contactform7">メールアドレス</span></th>
                        <td class="regi-mail">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samazon-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレスを入力してください">
                            <table class="register-ta">
                                <tr>
                                    <td>※</td>
                                    <td>アカウント作成後の変更はできません。</td>
                                </tr>
                            </table>
                            @if ($errors->has('email'))
                              @foreach($errors->get('email') as $message)
                              <span><strong>{{ $message }}</strong></span>
                              @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr style="background-color: #fff;">
                        <th><span class="title-contactform7">パスワード</span></th>
                        <td>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samazon-login-input" name="password" required autocomplete="new-password" placeholder="8文字以上の半角数字">
        
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>※パスワードが一致しません</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>
                    <tr style="background-color: #fef4e5;">
                        <th><span class="title-contactform7">パスワード（確認）</span></th>
                        <td>
                            <input id="password-confirm" type="password" class="form-control samazon-login-input" name="password_confirmation" required autocomplete="new-password" placeholder="もう一度入力してください">
                        </td>
                    </tr>
                    <tr style="background-color: #fff;">
                        <th><span class="title-contactform7">あなたのページアドレス</span></th>
                        <td class="page_address">
                            https://yoyakuma.com/reserve/
                            <input type="text" class="form-control @error('page_address') is-invalid @enderror samazon-login-input" name="page_address" required placeholder="3文字以上の半角英数字">
                            <table class="register-ta">
                                <tr class="register-bl">
                                    <td>※</td>
                                    <td>予約ページはヨヤクマサイト（https://yoyakuma.com）内に含まれる形で作成されます。</td>
                                </tr>
                                <tr>
                                    <td>※</td>
                                    <td>アカウント作成後の変更はできません。</td>
                                </tr>
                            </table>
                            @if ($errors->has('page_address'))
                              @foreach($errors->get('page_address') as $message)
                              <span><strong>{{ $message }}</strong></span>
                              @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr style="background-color: #fef4e5;">
                        <th><span class="title-contactform7">電話番号</span></th>
                        <td>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror samazon-login-input" name="phone" required placeholder="電話番号を入力してください">
                        </td>
                    </tr>
                    <tr style="background-color: #fff;">
                        <th><span class="title-contactform7">担当者名</span></th>
                        <td>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samazon-login-input" name="name" value="{{ old('name') }}" required placeholder="管理者様のお名前を入力してください">
        
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>担当者名を入力してください</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>
                    <tr style="background-color: #fef4e5;">
                        <th><span class="title-contactform7">企業名・屋号名・団体名</span></th>
                        <td>
                            <input type="text" class="form-control @error('store_name') is-invalid @enderror samazon-login-input" name="store_name" required placeholder="例) ○○○株式会社">
                        </td>
                    </tr>
                    <tr style="background-color: #fff;">
                        <th><span class="title-contactform7">業種</span></th>
                        <td>
                            <select size="1" class="form-control @error('industry') is-invalid @enderror samazon-login-input" name="industry">
                                <option value="" hidden>選択してください</option>
                                <option value="1">レストラン・居酒屋・カフェ</option>
                                <option value="2">医療・健康・介護</option>
                                <option value="3">美容院・まつげ・ネイル</option>
                                <option value="4">リラク・マッサージ・エステ</option>
                                <option value="5">ヨガ・ピラティス</option>
                                <option value="6">フィットネス</option>
                                <option value="7">イベント</option>
                                <option value="8">旅行・観光</option>
                                <option value="9">レジャー・スポーツ</option>
                                <option value="10">貸しスペース・貸し会議室</option>
                                <option value="11">スクール・教室</option>
                                <option value="12">サークル・コミュニティ</option>
                                <option value="13">弁護士・税理士・士業</option>
                                <option value="14">セミナー</option>
                                <option value="15">カウンセリング</option>
                                <option value="16">占い</option>
                                <option value="17">ショップ</option>
                                <option value="18">その他</option>
                            </select>
                            
                            @if ($errors->has('industry'))
                              @foreach($errors->get('industry') as $message)
                              <span><strong>{{ $message }}</strong></span>
                              @endforeach
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>

            <button class="form-btn bgleft btn" type="submit" value="アカウント作成">
                <span>会員登録 <i class="fas fa-angle-right"></i></span>
            </button>

        </form>
        
        <div class="tentative">
            <table>
                <tbody>
                    <tr>
                        <td>※</td>
                        <td>「会員登録」をクリックすると仮会員登録が完了します。ご入力いただいたメールアドレスにご本人確認用のメールが送信され、メール本文内の「メールアドレス確認」をクリックすると本会員登録完了となります。</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="explain">
            <p>入力いただきました個人情報は、ヨヤクマの情報提供の目的で利用し、個人情報の取り扱いに沿って適切に管理いたします。個人情報を入力・送信された場合、<a href="{{ url('terms') }}" target="_blank">利用規約<i class="fas fa-external-link-alt"></i></a>と<a href="{{ url('privacy') }}" target="_blank">個人情報の取り扱い<i class="fas fa-external-link-alt"></i></a>にご同意いただけたものとします。<br>
            情報の開示・訂正・削除を希望される方は、下記の連絡先までお問い合わせください。<br>
            【ヨヤクマ運営元】スターティングデザイン<br>
            yoyakuma@starting-design.com</p>
        </div>
                
    </section>
    
</div>

@endsection