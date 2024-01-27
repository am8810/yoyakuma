@extends('layouts.member_app')

@section('title', '基本情報（予約ページ編集） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページ基本情報の編集画面です。現在設定されている内容が各項目に設定されており、編集をしたい項目の内容を変更して「更新」をクリックすると、変更が予約ページに反映されます。')

@section('content')
<div class="member-body">
    <div class="l-container">
	  <div id="pankuzu">
    	 <ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		<li class="breadcrumb-item"><a href="{{ url('reservepages') }}">予約ページ編集</a></li>
      		<li class="breadcrumb-item active">基本情報</li>
    	 </ol>
      </div>
    </div>

<div class="m-container">
    <div class="member-top-body reserve_create">
        <div class="type-l-edit">
            <h2>編集画面</h2>
        </div>
        <h1 class="create_title edit-title">予約ページ基本情報</h1>
        
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
          
          <p>無料会員のまま作成した予約ページは「非公開状態」となり、ログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。<br>
          有料会員登録は以下のボタンから行えます。</p>
          
          <a href="{{route('mypage.membership')}}">有料会員登録 <i class="fas fa-angle-right"></i></a>
        </div>
        @endif
        
    	<div class="flow-line-2"></div>
    	
	<div class="form-padding">
    	    
        <form id="reservepage-form" method="POST" action="/reservepages/{{ $reservepage->id }}" enctype="multipart/form-data" class="create-form">

            {{ csrf_field() }}
            
            <input type="hidden" name="_method" value="PUT">
            
            @if ($user->member_flag)
            <div id="radio-box">
                <label>公開設定</label>
                <ul>
                  <li class="release">
                    <input type="radio" id="f-option" name="release" value="0" @if($reservepage->release == 0)checked @endif>
                    <label for="f-option">公開</label>
                    
                    <div class="check"></div>
                  </li>
                  
                  <li>
                    <input type="radio" id="s-option" name="release" value="1" @if($reservepage->release == 1)checked @endif>
                    <label for="s-option">非公開</label>
                    
                    <div class="check"><div class="inside"></div></div>
                  </li>
                  
                </ul>
                
                <div class="non-release">
                  <table>
                      <tbody>
                          <tr>
                              <td>※</td>
                              <td>「非公開」を選択するとログイン状態の管理者にのみ表示され、一般ユーザーには表示されません。</td>
                          </tr>
                      </tbody>
                  </table>
                </div>  
            </div>
            <div class="create-border-2"></div>
            @endif

            <div id="create-title" class="form-group">
                <label for="reservepage-name">タイトル</label>
                <input type="text" name="name" id="reservepage-name" class="form-control" value="{{ $reservepage->name }}" placeholder="例：お試し体験レッスン">
                <p class="required">
                @if ($errors->has('name'))
                  {{$errors->first('name')}}
                @endif
                </p>
            </div>
            
            
            <div class="form-group">
                <label for="reservepage-description">説明文</label>
                <textarea name="description" id="reservepage-description" class="form-control" placeholder="予約内容について詳細を入力してください">{{ $reservepage->description }}</textarea>
                <p class="required">
                @if ($errors->has('description'))
                  {{$errors->first('description')}}
                @endif
                </p>
            </div>
            
            
            <div id="reserve-image" class="form-group">
                <label for="reservepage-image" class="d-flex">イメージ画像</label>
                @if ($reservepage->image !== null)
                    <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid w-25">
                    @if ($reservepage->image !== '')
                        <button type="button" id="delete-image-button" class="btn btn-danger" onclick="deleteImage()">画像を削除</button>
                    @endif
                @else
                    <img src="#" id="reservepage-image-preview" class="img-fluid w-25">
                @endif
                <label for="reservepage-image" class="btn image-button">画像を選択</label>
                <input type="file" name="image" id="reservepage-image" onChange="handleImage(this.files)" style="display: none;">
                          
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
                @if ($reservepage->logo !== null)
                    <img src="{{ asset('storage/reservepages/'.$reservepage->logo) }}" id="reservepage-logo-preview" class="img-fluid w-25">
                    @if ($reservepage->logo !== '')
                        <button type="button" id="delete-logo-button" class="btn btn-danger" onclick="deleteLogo()">画像を削除</button>
                    @endif
                @else
                    <img src="#" id="reservepage-logo-preview" class="img-fluid w-25">
                @endif
                <label for="reservepage-logo" class="btn image-button">画像を選択</label>
                <input type="file" name="logo" id="reservepage-logo" onChange="handleLogo(this.files)" style="display: none;">
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
                        @if($reservepage->price != -1)
                        <th><input type="number" name="price" id="reservepage-price" class="form-control" value="{{ $reservepage->price }}" placeholder="0000" min="0"></th>
                        <td>円（税込）</td>
                        @endif
                        @if($reservepage->price == -1)
                        <th><input type="number" name="price" id="reservepage-price" class="form-control" value="" placeholder="0000" min="0"></th>
                        <td>円（税込）</td>
                        @endif
                    </tr>
                </table>
                <p class="or">or</p>
                <input type="checkbox" name="price" id="none-price" value="-1" {{ $price == '-1' ? 'checked' : '' }}> 予約時に価格は算定されません
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
                    <label for="reservepage-description">日時・人数の変更について</label>
                    <textarea name="date_change" id="reservepage-date_change" class="form-control" placeholder="例：日時・人数の変更の際は、お電話にてご連絡ください。">{{ $reservepage->date_change }}</textarea>
                    <p class="required">
                    @if ($errors->has('date_change'))
                      {{$errors->first('date_change')}}
                    @endif
                    </p>
                </div>
                <div class="form-group">
                    <label for="reservepage-description">キャンセルについて</label>
                    <textarea name="cancel" id="reservepage-cancel" class="form-control" placeholder="例：予約日の4日前までキャンセル料は無料です。※予約日の3日前からは、料金の50%キャンセル料が発生いたします。">{{ $reservepage->cancel }}</textarea>
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
                @if ($errors->has('inputform'))
                  {{$errors->first('inputform')}}
                @endif
                </p>
                <input type="button" value="追加" class="inform-btn" onclick="addForm()">
                <input type="hidden" id="inputforms" value="{{ $reservepage->mailaddress }}" >
              
                <div class="create-border-3"></div>
            </div>
            
            
            <div class="form-group" id="colorpicker">
                <label for="reservepage-name">予約カレンダーの色</label>
                <div class="boxContainer colorpi-m">
                  <div class="box"><input type="color" name="color" id="colorBox" class="form-control" value="{{ $reservepage->color }}"></div>
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
            
            <button type="submit" class="btn btn-create">更新 <i class="fas fa-angle-right"></i></button>
    
        </form>
        
        <div class="btn-return">
            <p><a href="/reservepages">予約ページ一覧に戻る <i class="fas fa-angle-right"></i></a></p>
        </div>
    </div>
    </div>
</div>

<!-- イメージ画像を削除する為の記述 -->
<script>
    function handleImage(files) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('reservepage-image-preview').src = e.target.result;
        };
        reader.readAsDataURL(files[0]);
    }

    function deleteImage() {
    var confirmed = confirm("本当に画像を削除しますか？");
    if (confirmed) {
        var imagePreview = document.getElementById('reservepage-image-preview');
        var inputFile = document.getElementById('reservepage-image');
        
        imagePreview.src = "#";
        inputFile.value = "";
        
        // 画像の削除フラグを追加
        var removeImageInput = document.createElement('input');
        removeImageInput.type = "hidden";
        removeImageInput.name = "remove_image";
        removeImageInput.value = "true";
        
        // フォームに削除フラグの要素を追加
        var form = document.getElementById('reservepage-form');
        form.appendChild(removeImageInput);

        // 「画像を削除」ボタンを非表示にする
        var deleteImageButton = document.getElementById('delete-image-button');
        deleteImageButton.style.display = "none";
    }
}
</script>
  
<!-- ロゴ画像を削除する為の記述 -->
<script>
    function handleLogo(files) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('reservepage-logo-preview').src = e.target.result;
        };
        reader.readAsDataURL(files[0]);
    }

    function deleteLogo() {
    var confirmed = confirm("本当に画像を削除しますか？");
    if (confirmed) {
        var imagePreview = document.getElementById('reservepage-logo-preview');
        var inputFile = document.getElementById('reservepage-logo');
        
        imagePreview.src = "#";
        inputFile.value = "";
        
        // 画像の削除フラグを追加
        var removeImageInput = document.createElement('input');
        removeImageInput.type = "hidden";
        removeImageInput.name = "remove_logo";
        removeImageInput.value = "true";
        
        // フォームに削除フラグの要素を追加
        var form = document.getElementById('reservepage-form');
        form.appendChild(removeImageInput);
        
        // 「画像を削除」ボタンを非表示にする
        var deleteLogoButton = document.getElementById('delete-logo-button');
        deleteLogoButton.style.display = "none";
    }
}
</script>
  
  
<!-- colorpicker -->
<script src="{{ secure_asset('js/colorpicker.js') }}" defer></script>

<!-- チェックボックスの活性・非活性 -->
<script src="{{ secure_asset('js/checkbox_price.js') }}" defer></script>

<!-- 予約受信メールアドレスの追加 -->
<script src="{{ secure_asset('js/receiving_address.js') }}" defer></script>
<script src="{{ secure_asset('js/edit_receiving_address.js') }}" defer></script>

@endsection



