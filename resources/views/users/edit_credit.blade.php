@extends('layouts.member_app')

@section('title', 'カード情報の変更 / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '有料会員登録のクレジットカード情報の変更画面です。変更するクレジットカード情報を入力していただき、「カード情報の変更」をクリックしてください。')

@section('content')
<div class="member-body">
    <div class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ route('mypage') }}">基本情報</a></li>
    		  <li class="breadcrumb-item"><a href="{{route('mypage.membership')}}">有料会員登録</a></li>
      		  <li class="breadcrumb-item active">カード情報の変更</li>
    	  </ol>
    	</div>
    </div>
    
    <div class="s-container member-top-body user-page-icon">
        <img src="{{ asset('img/user-icon-3.jpg')}}" alt="有料会員登録">
        <h1 class="mypage-title">カード情報の変更</h1>
        
        <div class="membership-p">
            <p>以下に変更するクレジットカード情報を入力していただき、「カード情報の変更」をクリックしてください。</p>
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
        

       <form id="setup-form" action="{{ route('mypage.update_credit') }}" method="post">
        @csrf
          <input id="card-holder-name" type="text" placeholder="カード名義人">
        　<div id="card-element"></div>
        　
          <button id="card-button" data-secret="{{ $intent->client_secret }}" class="form-btn bgleft btn card-change">
            <span>カード情報の変更 <i class="fas fa-angle-right"></i></span>
          </button>
       </form>

    </div>
</div>
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script type="application/javascript"> 
    const stripe = Stripe('pk_test_51O8KJ7LtSGE4625lIVM18riDD7rpE6TfRiTOJPXZ1rtum5qsFON8QxEKgjkajDoQNW16yyPgGAfhZYzqgtcZj3J300pALp3NSb');
    const elements = stripe.elements();
    const cardElement = elements.create('card', {hidePostalCode: true);
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
@endpush
@endsection

  

