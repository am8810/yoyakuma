@extends('layouts.app')

@section('title', '特定商取引法に基づく表示 【予約管理ならヨヤクマ】')
@section('description', 'ヨヤクマの特定商取引法に基づく表示について記載しています。事業者の名称はSTARTING DESIGN（スターティングデザイン）です。有料会員登録についての価格、支払い方法、支払い時期等についても記載しています。')

@section('content')

    <div id="legal_notice_title" class="page-title">
        <h1>特定商取引法に基づく表示</h1>
    </div>  

    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">特定商取引法に基づく表示</li>
    	  </ol>
    	</div>
    </section>

    <section class="s-container">
        <div class="legal_notice">
            <img src="{{ asset('img/legal_notice.svg')}}" alt="特定商取引法に基づく表示">

            <div class="legal_notice-title">
                <h2>特定商取引法に<br class="hidden-xs">基づく表示</h2>
            </div>
            
            <p class="l_n_p">以下は、ヨヤクマの特定商取引法の表示です。</p>
        </div>
    
        <div id="legal_notice">
            <table class="table table-bordered table-striped table-contactform7">
                <tbody>
                    <tr>
                        <th><span class="title-contactform7">事業者の名称</span></th>
                        <td>STARTING DESIGN（スターティングデザイン）</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">運営責任者</span></th>
                        <td>代表：天野 隼人</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">所在地</span></th>
                        <td>請求があったら遅滞なく開示します。</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">電話番号</span></th>
                        <td>080-5161-5304</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">営業時間</span></th>
                        <td>10：00〜20：00（土日祝を除く）</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">メールアドレス</span></th>
                        <td>amano.h@starting-design.com</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">サービス名</span></th>
                        <td>ヨヤクマ</td>
                    </tr>
                </tbody>
            </table>
            
            <h3>有料会員登録について</h3>
            
            <table class="table table-bordered table-striped table-contactform7">
                <tbody>
                    <tr>
                        <th><span class="title-contactform7">販売価格</span></th>
                        <td>月額3,278円（税込）</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">支払方法</span></th>
                        <td>クレジットカード決済のみとなっております。</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">支払時期</span></th>
                        <td>有料会員登録の際に直ちに処理され、以降は登録日時から1ヶ月ごとに処理されます。</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">引き渡し時期</span></th>
                        <td>有料会員登録のお支払いが完了後、直ちに引き渡します。</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">販売価格以外に必要な費用</span></th>
                        <td>販売価格以外に必要な費用はございません。</td>
                    </tr>
                    <tr>
                        <th><span class="title-contactform7">返品・交換</span></th>
                        <td>サービスの性質上、返品・交換は承っておりません。<br>解約等の手続は、<a href="{{ url('terms#price_cancellation') }}">利用規約</a>に定めます。</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </section>

@endsection
