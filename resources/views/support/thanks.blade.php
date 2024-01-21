@extends('layouts.member_app')

@section('title', '送信完了（zoomサポート） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', 'zoomサポートのご依頼、ありがとうございます。送信内容をご確認後、1〜3日以内にご返信をさせていただき、zoomサポートを行う日程候補日を送らせていただきます。事前にzoomのダウンロードをお願いいたします。')

@section('content')
<div class="member-body">
    <section class="l-container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		  <li class="breadcrumb-item"><a href="{{ url('support') }}">zoomサポート</a></li>
      		  <li class="breadcrumb-item active">送信内容確認</li>
      		  <li class="breadcrumb-item active">送信完了</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">
        <div class="member-top-body">
            <div class="s-form-title">
                <img src="{{ asset('img/zoom-support.svg')}}" alt="zoomサポート">
            </div>
            
            <h2 class="comp-title">送信完了</h2>
            
            <div class="s-thanks">
                <p>zoomサポートのご依頼、ありがとうございます。<br>
                送信内容をご確認後、1〜3日以内にご返信をさせていただき、zoomサポートを行う日程候補日を送らせていただきます。<br>
                <br>
                zoomサポートを行う為、ご使用のパソコンにzoomを事前にインストールしておいていただければと思います。<br>
                zoomのインストールは以下のボタンからデータをダウンロードして行ってください。</p>
                
                <a href="{{ asset('uploads/zoomusInstallerFull.pkg')}}" role="button">zoomダウンロード <i class="fas fa-angle-right"></i></a></td>
                
                <p>なお、しばらくたっても返信、返答がない場合は、ご入力いただいたメールアドレスに誤りがある場合がございます。<br>
                その際は、お手数ですが再度送信いただくか、下記の連絡先までご連絡いただけますと幸いです。<br>
                <br>
                何かご不明な点等がございましたら、お気軽にお問い合わせください。</p>
                
                <h3>お問い合わせ先</h3>
                <p>【予約管理ならヨヤクマ】<br>
                担当者：天野<br>
                メールアドレス：yoyakuma@starting-design.com<br>
                電話番号：080-5161-5304</p>
            </div>
            
    		<div class="to-top-s">
    			<a href="{{ url('home') }}" role="button">トップページへ戻る <i class="fas fa-angle-right"></i></a>
    		</div>

        </div>
    </section>
</div>
@endsection

