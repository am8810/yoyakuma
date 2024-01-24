@extends('layouts.member_app')

@section('title', 'zoomサポート / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '「予約ページをどうやって作成・編集すればいいか分からない」「予約状況や顧客情報の確認方法が分からない」「メールアドレスやパスワードの変更方法が分からない」といったお困りごとがありましたら、zoomによって画面共有をしていただき操作サポートをいたします。')

@section('content')
<div class="member-body">
    <section class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item active">zoomサポート</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">
        <div class="member-top-body">
            <div class="s-form-title">
                <img src="{{ asset('img/zoom-support.svg')}}" alt="zoomサポート">
            </div>
            
            <img class="zoom_illust" src="{{ asset('img/zoom_illust.svg')}}" alt="zoomサポート イラスト">

            <p>「予約ページをどうやって作成・編集すればいいか分からない」「予約状況や顧客情報の確認方法が分からない」「メールアドレスやパスワードの変更方法が分からない」といったお困りごとがありましたら、zoomによって画面共有をしていただき操作サポートをいたします。<br>
            zoomサポートを行う上で、以下の注意事項がございますのでご確認ください。</p>
            
            <div class="s-form-note">
                <table>
                    <tr>
                        <td>※</td>
                        <td>zoomサポートを行うには、ご使用のパソコンにzoomをインストールする必要があります。以下のボタンから、zoomサイトにてzoomをダウンロードしてインストールを行ってください。<br>
                        <a href="https://zoom.us/ja/download" target="_blank" role="button">zoomサイト <i class="icon-another-window_w"></i></a></td>
                    </tr>
                    <tr>
                        <td>※</td>
                        <td>zoomサポートを行うには、以下のフォームから必要項目を入力していただき送信をしてください。<br>フォームからのメールを確認次第、1〜3日以内に返信をさせていただき、zoomサポートを行う日程候補日を送らせていただきます。</td>
                    </tr>
                    <tr>
                        <td>※</td>
                        <td>zoomサポートは原則、パソコンかノートパソコンで行わせていただきます。</td>
                    </tr>
                    <tr>
                        <td>※</td>
                        <td>「zoom（ズーム）」とは、オンライン上で画面・音声の共有が行えるコミュニケーションツールです。無料で仕様することが可能です。</td>
                    </tr>
                </table>
            </div>
            
            <form method="POST" action="{{ route('support.confirm') }}">
                @csrf
                
                <div class="support-form">
                    <p>以下に会員情報の入力と、どのようなお困りごとか詳細を入力していただいたら、「利用規約」と「個人情報の取り扱い」に同意のチェックをいただき、「送信内容を確認」ボタンを押してください。</p>
                    
                    <img src="{{asset('img/logo.svg')}}">
                    
                    <h3>会員情報</h3>
                    
                    <table>
                        <tr>
                            <td>※</td>
                            <td>入力項目は全て必須になります。</td>
                        </tr>
                    </table>
                </div>
                
                <table class="table table-bordered table-striped table-contactform7">
                    <tbody>
                        <tr style="background-color: #e5f8fc;">
                            <th><span class="title-contactform7">ご担当者名</span></th>
                            <td>
                                <input
                                    name="name"
                                    value="{{ old('name') }}"
                                    type="text" placeholder=" ご担当者名を入力してください" class="form-control">
                                @if ($errors->has('name'))
                                    <p class="error-message">{{ $errors->first('name') }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><span class="title-contactform7">企業名・屋号名・団体名</span></th>
                            <td>
                                <input
                                    name="company"
                                    value="{{ old('company') }}"
                                    type="text" placeholder=" 企業名・屋号名・団体名を入力してください" class="form-control">
                                @if ($errors->has('company'))
                                    <p class="error-message">{{ $errors->first('company') }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr style="background-color: #e5f8fc;">
                            <th><span class="title-contactform7">メールアドレス</span></th>
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
                                @if ($errors->has('phone'))
                                    <p class="error-message">{{ $errors->first('phone') }}</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="what-trouble">
                    <img src="{{ asset('img/what-trouble.svg')}}" alt="どの様なお困りごとですか？">
                    
                    <textarea name="body" placeholder=" どの様なお困りごとか詳細を入力してください" class="form-control">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                </div>
                
                <div class="consent support-check">
                  <input type="checkbox" id="consent-chk" name="consent-chk">
                  <label for="consent-chk"><a href="{{ url('terms') }}" target="_blank">利用規約<i class="fas fa-external-link-alt"></i></a>と<a href="{{ url('privacy') }}" target="_blank">個人情報の取扱い<i class="fas fa-external-link-alt"></i></a>に同意します。</label>
                </div>
                
                <button disabled class="form-btn bgleft btn" type="submit" value="送信内容を確認">
                    <span>送信内容を確認 <i class="fas fa-angle-right"></i></span>
                </button>

            </form>
            
            <div class="explain">
                <p>入力いただきましたお客様の個人情報は、ヨヤクマの情報提供の目的で利用します。<br>
                また、お客様の入力された内容は適切に管理します。<br>
                情報の開示・訂正・追加・削除を希望されるお客様は、下記の連絡先までお問い合わせください。<br>
                【ヨヤクマ管理者】<br>
                メール：yoyakuma-admin@starting-design.com<br>
                電話：080-5161-5304<br>
                お客様がご自身の個人情報を入力・送信された場合、上記利用目的にご同意いただけたものとします。</p>
            </div>

        </div>
    </section>
</div>

<script>
    const consent_chk = document.querySelector(`#consent-chk`);
    const submit_btn = document.querySelector(`button[type=submit]`);
    
    consent_chk.addEventListener('change', () => {
      
      if (consent_chk.checked === true) {
        submit_btn.disabled = false;
      } else {
        submit_btn.disabled = true;
      }
    
    });
</script>
@endsection

