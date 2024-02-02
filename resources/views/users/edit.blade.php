@extends('layouts.member_app')

@section('title', '会員情報 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '会員情報が確認できます。「メールアドレス」と「あなたのページアドレス」以外の項目は会員情報を変更することができます。ご自身が有料会員か無料会員かの確認もできます。')

@section('content')
<div class="member-body">
    <div class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ route('mypage') }}">基本情報</a></li>
      		  <li class="breadcrumb-item active">会員情報</li>
    	  </ol>
    	</div>
    </div>


    <div id="member-edit" class="s-container user-page-icon">
        <div class="member-top-body">
            <img src="{{ asset('img/user-icon-1.jpg')}}">
            <h1 class="mypage-title">会員情報</h1>
    
    
            <form method="POST" action="/users/mypage">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="text-md-left samazon-edit-user-info-label">メールアドレス</label>
                    </div>
                    <div class="collapse show userMail">
                        <h3 class="samazon-edit-user-info-value">{{ $user->email }}</h3>
                    </div>
                    
                    <div class="register_email">
                        <table>
                            <tbody>
                                <tr class="note-orange">
                                    <td>※</td>
                                    <td>アカウント作成後の変更はできません。</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <hr>
    
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="phone" class="text-md-left samazon-edit-user-info-label">電話番号</label>
                        <span onclick="switchEditUserInfo('.userPhone', '.editUserPhone', '.userPhoneEditLabel');" class="userPhoneEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userPhone">
                        <h3 class="samazon-edit-user-info-value">{{ $user->phone }}</h3>
                    </div>
                    <div class="collapse editUserPhone form-m">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus placeholder="XXX-XXXX-XXXX">
    
                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>
    
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>電話番号を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
                <hr>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left samazon-edit-user-info-label">担当者名</label>
                        <span onclick="switchEditUserInfo('.userName', '.editUserName', '.userNameEditLabel');" class="userNameEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userName">
                        <h3 class="samazon-edit-user-info-value">{{ $user->name }}</h3>
                    </div>
                    <div class="collapse editUserName form-m">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="ヨヤクマ 太郎">
    
                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>
    
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>担当者名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
                <hr>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="store_name" class="text-md-left samazon-edit-user-info-label">企業名・屋号名・団体名</label>
                        <span onclick="switchEditUserInfo('.userStoreName', '.editUserStoreName', '.userStoreNameEditLabel');" class="userStoreNameEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userStoreName">
                        <h3 class="samazon-edit-user-info-value">{{ $user->store_name }}</h3>
                    </div>
                    <div class="collapse editUserStoreName form-m">
                        <input id="store_name" type="text" class="form-control @error('store_name') is-invalid @enderror" name="store_name" value="{{ $user->store_name }}" required autocomplete="store_name">
    
                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>
    
                        @error('store_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>企業名・屋号名・団体名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    
                <hr>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="industry" class="text-md-left samazon-edit-user-info-label">業種</label>
                        <span onclick="switchEditUserInfo('.userIndustry', '.editUserIndustry', '.userIndustryEditLabel');" class="userIndustryEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userIndustry">
                        <h3 class="samazon-edit-user-info-value">
                            @if($user->industry == 1) 
                            レストラン・居酒屋・カフェ
                            @elseif($user->industry == 2)
                            医療・健康・介護
                            @elseif($user->industry == 3)
                            美容院・まつげ・ネイル
                            @elseif($user->industry == 4)
                            リラク・マッサージ・エステ
                            @elseif($user->industry == 5)
                            ヨガ・ピラティス
                            @elseif($user->industry == 6)
                            フィットネス
                            @elseif($user->industry == 7)
                            イベント
                            @elseif($user->industry == 8)
                            旅行・観光
                            @elseif($user->industry == 9)
                            レジャー・スポーツ
                            @elseif($user->industry == 10)
                            貸しスペース・貸し会議室
                            @elseif($user->industry == 11)
                            スクール・教室
                            @elseif($user->industry == 12)
                            サークル・コミュニティ
                            @elseif($user->industry == 13)
                            弁護士・税理士・士業
                            @elseif($user->industry == 14)
                            セミナー
                            @elseif($user->industry == 15)
                            カウンセリング
                            @elseif($user->industry == 16)
                            占い
                            @elseif($user->industry == 17)
                            ショップ
                            @elseif($user->industry == 18)
                            その他
                            @endif
                        </31>
                    </div>
                    <div class="collapse editUserIndustry form-m">
                        <select size="1" class="form-control @error('industry') is-invalid @enderror samazon-login-input" name="industry">
                            <option hidden>選択してください</option>
                            <option value="1" @if($user->industry == 1)selected @endif>レストラン・居酒屋・カフェ</option>
                            <option value="2" @if($user->industry == 2)selected @endif>医療・健康・介護</option>
                            <option value="3" @if($user->industry == 3)selected @endif>美容院・まつげ・ネイル</option>
                            <option value="4" @if($user->industry == 4)selected @endif>リラク・マッサージ・エステ</option>
                            <option value="5" @if($user->industry == 5)selected @endif>ヨガ・ピラティス</option>
                            <option value="6" @if($user->industry == 6)selected @endif>フィットネス</option>
                            <option value="7" @if($user->industry == 7)selected @endif>イベント</option>
                            <option value="8" @if($user->industry == 8)selected @endif>旅行・観光</option>
                            <option value="9" @if($user->industry == 9)selected @endif>レジャー・スポーツ</option>
                            <option value="10" @if($user->industry == 10)selected @endif>貸しスペース・貸し会議室</option>
                            <option value="11" @if($user->industry == 11)selected @endif>スクール・教室</option>
                            <option value="12" @if($user->industry == 12)selected @endif>サークル・コミュニティ</option>
                            <option value="13" @if($user->industry == 13)selected @endif>弁護士・税理士・士業</option>
                            <option value="14" @if($user->industry == 14)selected @endif>セミナー</option>
                            <option value="15" @if($user->industry == 15)selected @endif>カウンセリング</option>
                            <option value="16" @if($user->industry == 16)selected @endif>占い</option>
                            <option value="17" @if($user->industry == 17)selected @endif>ショップ</option>
                            <option value="18" @if($user->industry == 18)selected @endif>その他</option>
                        </select>
    
    
                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>
    
                        @error('industry')
                        <span class="invalid-feedback" role="alert">
                            <strong>業種を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <hr>
    
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="text-md-left samazon-edit-user-info-label">あなたのページアドレス</label>
                    </div>
                    <div class="collapse show userPhone">
                        <h3 class="samazon-edit-user-info-value">https://yoyakuma.com/reserve/{{ $user->page_address }}</h3>
                    </div>
                    
                    <div class="page_address">
                        <table>
                            <tbody>
                                <tr>
                                    <td>※</td>
                                    <td>予約ページはヨヤクマサイト（https://yoyakuma.com）内に含まれる形で作成されます。</td>
                                </tr>
                                <tr class="note-orange">
                                    <td>※</td>
                                    <td>アカウント作成後の変更はできません。</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <hr>
                
                <div class="form-group">
                    <label>登録状況</label>
                    @if ($user->member_flag == 0)
                    <div>
                        <h3>無料会員</h3>
                        
                        <div class="page_address">
                            <table>
                                <tbody>
                                    <tr class="note-orange">
                                        <td>※</td>
                                        <td>有料会員登録をしないと、予約ページを「公開状態」にすることができません。</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>無料会員のまま作成する予約ページは「非公開状態」となり、管理者にのみ表示され、一般ユーザーには表示されません。<br>
                            有料会員登録は以下のボタンから行えます。</p>
                            <a href="{{route('mypage.membership')}}">有料会員登録 <i class="fas fa-angle-right"></i></a>
                        </div>
                        
                    </div>
                    @else
                    <div>
                        <h3 class="note-orange">有料会員</h3>
                    </div>
                    @endif
                </div>
    
                <hr>
    
            </form>
            
            <div class="d-flex justify-content-end">
                <form method="POST" action="{{ route('mypage.destroy') }}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <div id="withdrawal" class="btn dashboard-delete-link" data-toggle="modal" data-target="#delete-user-confirm-modal">退会する</div>
    
                    <div class="modal fade" id="delete-user-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog withdrawal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><label>本当に退会しますか？</label></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <table>
                                      <tbody>
                                          <tr>
                                              <td>※</td>
                                              <td>一度退会するとデータはすべて削除され復旧はできません。</td>
                                          </tr>
                                          <tr>
                                              <td>※</td>
                                              <td>顧客情報も削除され復旧はできません。</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dashboard-delete-link" data-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn samazon-delete-submit-button text-white">退会する</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let switchEditUserInfo = (textClass, inputClass, labelClass) => {
        if ($(textClass).css('display') == 'block') {
            $(labelClass).text("キャンセル");
            $(textClass).collapse('hide');
            $(inputClass).collapse('show');
        } else {
            $(labelClass).text("編集");
            $(textClass).collapse('show');
            $(inputClass).collapse('hide');
        }
    }
</script>
@endsection