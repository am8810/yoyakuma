@extends('layouts.member_app')

@section('title', '有料会員登録 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマは月額2,980円（税抜）の有料会員登録を行っていただくことで、予約ページを公開状態にすることができます。クレジットカード情報を入力していただき、ボタンをクリックすると有料会員登録が完了します。')

@section('content')
<div class="member-body">
    <div class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ route('mypage') }}">基本情報</a></li>
      		  <li class="breadcrumb-item active">有料会員登録</li>
    	  </ol>
    	</div>
    </div>
    
    <div class="s-container member-top-body">
      <div class="user-page-icon">
        <img src="{{ asset('img/user-icon-3.jpg')}}" alt="有料会員登録">
      </div>
      
        <h1 class="mypage-title">有料会員登録</h1>
        
       @if ($user->member_flag == 0)
       
       <div class="membership-p">
            <p>ヨヤクマは月額2,980円（税抜）の有料会員登録を行っていただくことで、予約ページを公開状態にすることができます。（無料会員のままでは、予約ページは非公開状態になります。）<br>
            以下にクレジットカード情報を入力していただき、「利用規約」と「個人情報の取り扱い」の同意にチェックをして「有料会員登録」をクリックすると有料会員として登録されます。</p>
            <table>
              <tbody>
                <tr>
                  <td>※</td>
                  <td>料金についての詳細は<a href="#" target="_blank">コチラ <i class="icon-another-window_w"></i></a>をご覧ください。</td>
                </tr>
              </tbody>
            </table>
        </div>
        
        <div class="aboutCredit">
            <h3>クレジットカード情報</h3>
            <img src="{{ asset('img/creditCompany.jpg')}}" alt="クレジット会社">
            
            <table>
              <tbody>
                <tr>
                  <td>※</td>
                  <td>上記の種類のクレジットカードをご利用いただけます。</td>
                </tr>
                <tr>
                  <td>※</td>
                  <td>ご請求は毎月ごとに3,278円（税込）をさせていただく形となります。</td>
                </tr>
                <tr>
                  <td>※</td>
                  <td>一括払いのみのご対応となります。</td>
                </tr>
              </tbody>
            </table>
        </div>


       <form id="setup-form" action="{{ route('subscribe.post') }}" method="post">
        @csrf
          <input id="card-holder-name" type="text" placeholder="カード名義人">
        　<div id="card-element"></div>
        　
　        <div class="consent">
            <input type="checkbox" id="memberform-click" name="memberform-click">
            <label for="memberform-click"><a href="{{ url('terms') }}" target="_blank">利用規約<i class="fas fa-external-link-alt"></i></a>と<a href="{{ url('privacy') }}" target="_blank">個人情報の取扱い<i class="fas fa-external-link-alt"></i></a>に同意します。</label>
          </div>
          
          <button id="card-button" data-secret="{{ $intent->client_secret }}" disabled class="form-btn bgleft btn">
            <span>有料会員登録 <i class="fas fa-angle-right"></i></span>
          </button>
       </form>
       
       @else
        <img src="{{ asset('img/registered.svg')}}" alt="有料会員登録がされています。" class="registered">

        <p class="registered-p">有料会員登録が既にされています。予約ページを公開状態にすることが可能です。</p>
        
        <div class="publishingMethod">
          <h3>予約ページを公開状態にする方法</h3>
          <p>有料会員登録がされると、予約ページを作成・編集する際の「基本情報」に「公開設定」の項目が追加されます。非公開状態となっている予約ページを公開状態にして、予約を開始しましょう！</p>
        </div>
        
        <div class="row p-method">
            <div class="col-sm-6">
                <img class="img-fluid" src="{{ asset('img/publishingMethod-1.jpg')}}" alt="予約ページを公開状態にする方法-1">
                <p><a href="{{ url('reservepages') }}" target="_blank">予約ページ編集</a>の「非公開」タブをクリックし、「基本情報」をクリックしてください。</p>
            </div>
            <div class="col-sm-6">
                <img class="img-fluid" src="{{ asset('img/publishingMethod-2.jpg')}}" alt="予約ページを公開状態にする方法-2">
                <p>公開設定のチェックを「公開」にして更新をしてください。</p>
            </div>
        </div>

        <div class="registeredCredit">
          <h3><span>登録クレジットカード</span></h3>
          <p>以下のクレジットカードが登録されています。</p>
          
          <div class="boxContainer credit-r">
            <div class="box"><img src="{{ asset('img/user-icon-3.jpg')}}" alt="有料会員登録"></div>
            <div class="box">
              <h4>{{ $user->card_brand }}</h4>
              <p>末尾が•••• {{ $user->card_last_four }}のクレジットカード</p>
            </div>
          </div>
          
           <a href="{{ url('users/mypage/edit_credit') }}" role="button">カード情報の変更 <i class="fas fa-angle-right"></i></a>

        </div>
        
        <div class="d-flex justify-content-center">
            <form method="POST" action="{{ route('mypage.membership_cancel') }}">
                @csrf
                <input type="hidden" name="" value="">
                <div id="cancellation" class="btn dashboard-delete-link" data-toggle="modal" data-target="#cancellation-modal">有料会員登録を解除する</div>

                <div class="modal fade" id="cancellation-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog withdrawal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><label>本当に有料会員登録を解除しますか？</label></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <table>
                                  <tbody>
                                      <tr>
                                          <td>※</td>
                                          <td>有料会員登録を解除すると、公開中の予約ページは非公開状態となり、予約を受けることができなくなります。</td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dashboard-delete-link" data-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn samazon-delete-submit-button text-white">有料会員登録を解除</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
       @endif

    </div>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script type="application/javascript"> 
    const stripe = Stripe('pk_test_51O8KJ7LtSGE4625lIVM18riDD7rpE6TfRiTOJPXZ1rtum5qsFON8QxEKgjkajDoQNW16yyPgGAfhZYzqgtcZj3J300pALp3NSb');
    const elements = stripe.elements();
    const cardElement = elements.create('card', {hidePostalCode: true});
    cardElement.mount('#card-element');
    
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {

    　　　e.preventDefault();
    　　　        // ローリング開始
        animationStart()
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );
    
        if (error) {
            // Display "error.message" to the user...
            console.log(error);
            animation()
        } else {
            // The card has been verified successfully...
            
           stripePaymentIdHandler(setupIntent.payment_method);
        }
    });
    
    function stripePaymentIdHandler(paymentMethodId) {
      // Insert the paymentMethodId into the form so it gets submitted to the server
      const form = document.getElementById('setup-form');
    
      const hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'paymentMethodId');
      hiddenInput.setAttribute('value', paymentMethodId);
      form.appendChild(hiddenInput);
    
      // Submit the form
      form.submit();
      
    }
    
// 定数の定義
const loading = document.getElementById('loading');

// cssクラスを追加する関数
function animation(){
  loading.classList.add('loaded');
}

function animationStart() {
  loading.classList.remove('loaded');
}

//画面が読み込まれたら animation を呼び出す
// window.addEventListener('load', animation);

// // 指定秒後に動作させる
// window.setTimeout( animation, 2000 );
</script>

<script>
    const member_consent_chk = document.querySelector(`#memberform-click`);
    const card_btn = document.querySelector(`#card-button`);

    member_consent_chk.addEventListener('change', () => {
        card_btn.disabled = !member_consent_chk.checked;
    });
</script>

@endpush
@endsection
  

