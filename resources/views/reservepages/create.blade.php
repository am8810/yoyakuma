@extends('layouts.member_app')

@section('title', '予約ページ作成（基本情報） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページ作成の画面です。基本情報として「公開設定」「タイトル」「説明文」「イメージ画像」「ロゴマーク画像」「予約価格」「予約に関しての注意事項」「予約受信メールアドレス」「予約カレンダーの色」の入力・選択をしてください。')

@section('content')

<div class="member-body">
    <div class="l-container">
      <div id="pankuzu">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
           <li class="breadcrumb-item active">予約ページ作成（基本情報）</li>
        </ol>
      </div>
    </div>

    <div class="m-container">
      <div class="member-top-body type-l">
        <h1>予約ページ作成</h1>
        
        @if (!$user->member_flag)
        <div class="none-member">
          <table>
            <tbody>
                <tr>
                    <td>※</td>
                    <td>有料会員登録をしないと、予約ページを「公開状態」にすることができません。</td>
                </tr>
            </tbody>
          </table>
          
          <p>無料会員のまま作成する予約ページは「非公開状態」となり、ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。<br class="hidden-create">
          有料会員登録は以下のボタンから行えます。</p>
          
          <a href="{{route('mypage.membership')}}">有料会員登録 <i class="fas fa-angle-right"></i></a>
        </div>
        @endif
        
        <div class="create-border-1"></div>

    	<div class="flow">
    	    <img class="d-none d-sm-block" src="{{ asset('img/flow-1.svg')}}" alt="予約ページ作成の流れ（基本情報）">
    	    <img class="d-block d-sm-none" src="{{ asset('img/flow-1-s.svg')}}" alt="予約ページ作成の流れ（基本情報）">
    	</div>
    	
    	<div class="form-padding">
    	    
            <form method="POST" action="/reservepages/saveStep1" class="create-form" enctype="multipart/form-data">
              <h3><span>基本情報の入力</span></h3>

                {{ csrf_field() }}

                @if ($user->member_flag)
                <div id="radio-box">
                    <label>公開設定</label>
                    <ul>
                      <li class="release">
                        <input type="radio" id="f-option" name="release" value="0" checked="checked">
                        <label for="f-option">公開</label>
                        
                        <div class="check"></div>
                      </li>
                      
                      <li>
                        <input type="radio" id="s-option" name="release" value="1">
                        <label for="s-option">非公開</label>
                        
                        <div class="check"><div class="inside"></div></div>
                      </li>
                      
                    </ul>
                    
                    <div class="non-release">
                      <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>「非公開」を選択すると予約ページはログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。</td>
                              </tr>
                          </tbody>
                      </table>
                    </div> 
                </div>
                <div class="create-border-2"></div>
                @endif

                <div id="create-title" class="form-group">
                    <label for="reservepage-name">タイトル</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="reservepage-name" class="form-control" placeholder="例：お試し体験レッスン">
                    <p class="required">
                    @if ($errors->has('name'))
                      {{$errors->first('name')}}
                    @endif
                    </p>
                </div>
                
                <div class="form-group">
                    <label for="reservepage-description">説明文</label>
                    <textarea name="description" id="reservepage-description" class="form-control" placeholder="予約内容について詳細を入力してください">{{ old('description') }}</textarea>
                    <p class="required">
                    @if ($errors->has('description'))
                      {{$errors->first('description')}}
                    @endif
                    </p>
                </div>
                
                <div id="reserve-image" class="form-group">
                  <label for="reservepage-image" class="d-flex">イメージ画像</label>
                  <input type="file" name="image" id="reservepage-image">
                  <div class="image-note">
                      <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>予約のイメージが伝わる画像をアップロードしてください。</td>
                              </tr>
                              <tr>
                                  <td>※</td>
                                  <td>横長で横幅が600px以上の画像推奨。</td>
                              </tr>
                              <tr>
                                  <td>※</td>
                                  <td>画像データはjpeg、png、svgのいずれかの形式のものを使用してください。</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
                
                <div id="reserve-logo" class="form-group">
                  <label for="reservepage-logo" class="d-flex">ロゴマーク画像</label>
                  <input type="file" name="logo" id="reservepage-logo">
                  <div class="image-note">
                      <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>ロゴマーク画像をアップロードしてください。</td>
                              </tr>
                              <tr>
                                  <td>※</td>
                                  <td>横長で縦幅が60px以上の画像推奨。</td>
                              </tr>
                              <tr>
                                  <td>※</td>
                                  <td>画像データはjpeg、png、svgのいずれかの形式のものを使用してください。</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
                
                <div id="price-form" class="form-group">
                    <label for="reservepage-price">予約価格</label>
                    <p class="form-p">1人あたりの予約価格を決めてください。無料の場合は0と入力してください。<br>
                    価格は現地で算定される場合は、「予約時に価格は算定されません」にチェックを入れてください。</p>
                    <table>
                        <tr>
                            <th><input type="number" name="price" value="{{ old('price') }}" id="reservepage-price" class="form-control" placeholder="0000"></th>
                            <td>円（税込）</td>
                        </tr>
                    </table>
                    <p class="or">or</p>
                    <input type="checkbox" name="price" id="none-price" value="予約時に価格は算定されません"> 予約時に価格は算定されません
                    <p class="required">
                    @if ($errors->has('price'))
                      {{$errors->first('price')}}
                    @endif
                    </p>
                    
                    <div class="create-border-2"></div>
                </div>
                
                <div class="caution">
                    <h4>予約に関しての注意事項</h4>
                    <p>予約に関しての「日時・人数の変更について」「キャンセルについて」の入力をしてください。</p>
                    <div class="reserve-note">
                      <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>キャンセル料が発生する場合の対応は、<strong>予約をされた方との直接のやり取り</strong>をお願いいたします。</td>
                              </tr>
                          </tbody>
                      </table>
                    </div> 
                    <div class="form-group">
                        <label for="reservepage-date_change">日時・人数の変更について</label>
                        <textarea name="date_change" id="reservepage-date_change" class="form-control" placeholder="例：日時・人数の変更の際は、お電話にてご連絡ください。">{{ old('date_change') }}</textarea>
                        <p class="required">
                        @if ($errors->has('date_change'))
                          {{$errors->first('date_change')}}
                        @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="reservepage-cancel">キャンセルについて</label>
                        <textarea name="cancel" id="reservepage-cancel" class="form-control" placeholder="例：予約日の4日前までキャンセル料は無料です。※予約日の3日前からは、料金の50%キャンセル料が発生いたします。">{{ old('cancel') }}</textarea>
                        <p class="required">
                        @if ($errors->has('cancel'))
                          {{$errors->first('cancel')}}
                        @endif
                        </p>
                    </div>
                    
                    <div class="create-border-3"></div>
                </div>
                
                
                <div class="re-mail">
                    <label>予約受信メールアドレス</label>
                    <p>予約がされた際に、予約通知メールを受信するアドレスを入力してください。</p>
                    
                    <table>
                        <tbody>
                            <tr>
                                <td>※</td>
                                <td>複数のアドレスで受信する場合は、「追加」をクリックしてください。</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div id="receiving_address" class="reserve-mail">
                      <input type="email" id="inputform_0" name="inputform[]" placeholder="○○○@△△△.com" class="form-control">
                    </div>
                    <p class="required">
                        @if ($errors->has('inputform.*'))
                          {{$errors->first('inputform.*')}}
                        @endif
                    </p>
                    <input type="button" value="追加" class="inform-btn" onclick="addForm()">
                  
                    <div class="create-border-3"></div>
                </div>
                

                <div class="form-group" id="colorpicker">
                    <label for="colorBox">予約カレンダーの色</label>
                    <div class="boxContainer colorpi-m">
                      <div class="box"><input type="color" name="color" id="colorBox" class="form-control" value="#f29600"></div>
                      <div class="box"><input type="button" value="色を決定" id="checkButton" class="inform-btn"></div>
                      <div class="box" id="nowcolor">テキスト</div>
                    </div>

                      <table>
                          <tbody>
                              <tr>
                                  <td>※</td>
                                  <td>色をクリックしてお好みの色を選択したら「色を決定」をクリックしてください。</td>
                              </tr>
                          </tbody>
                      </table>

                </div>
                
              <button type="submit" class="btn btn-create">日程・定員数の設定へ <i class="fas fa-angle-right"></i></button>

                
            </form>
        
        </div>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
      $("#reservepage-image").change(function() {
          if (this.files && this.files[0]) {
              let reader = new FileReader();
              reader.onload = function(e) {
                  $("#reservepage-image-preview").attr("src", e.target.result);
              }
              reader.readAsDataURL(this.files[0]);
          }
      });
  </script>
  
<!-- colorpicker -->
<script src="{{ secure_asset('js/colorpicker.js') }}" defer></script>

<!-- チェックボックスの活性・非活性 -->
<script src="{{ secure_asset('js/checkbox_price.js') }}" defer></script>

<!-- 予約受信メールアドレスの追加 -->
<script src="{{ secure_asset('js/receiving_address.js') }}" defer></script>

@endsection



