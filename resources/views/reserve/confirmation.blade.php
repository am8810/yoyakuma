@extends('layouts.reservepage_app')

@section('title', '予約内容のご確認 【予約管理ならヨヤクマ】')
@section('description', '予約内容のご確認画面です。予約項目、予約に関しての注意事項、予約者様情報をご確認いただき、問題がなければ「予約する」ボタンをクリックすると予約完了となります。')

@section('content')
<div class="r-page-body">
    <div class="reserve-form">
    	<div class="reservestep">
    	    <img src="{{ asset('img/reservestep-3.svg')}}" class="img-fluid" alt="内容確認">
    	</div>
    	
	    @if($fail_save_flg)
        <div class="reached">
            <table>
                <tr>
                    <td>※</td>
                    <td>コチラの予約は定員に達しました。</td>
                </tr>
            </table>
        </div>
	    @endif
	    
    	<div class="reserve-confirmation">
    	    <h2>予約内容のご確認</h2>
    	    <p>予約申込み前に、予約内容をご確認ください。予約内容に問題がなければ<strong>「予約する」ボタンをクリック</strong>して予約完了となります。<br>
    	    予約申込みを完了すると、<a href="{{ url('terms_reserve') }}" target="_blank">利用規約</a>と<a href="{{ url('privacy_reserve') }}" target="_blank">プライバシーポリシー</a>にご同意いただけたものとさせていただきます。
    	    </p>
    	</div>

        <form method="POST" name="form1" action="/reserve/{{ $page_address }}/{{ $reservepage->id }}/date_time/customer/confirmation/completion">
            
            <div class="do_reserve">
                <label>予約項目</label>
                <div class="confirmation">
            	　<table>
            	　    <tbody>
            	　        <tr>
            	　            <th class="conf-t-l">
                                @if ($reservepage->image)
                                <img src="{{ asset('storage/reservepages/'.$reservepage->image) }}" id="reservepage-image-preview" class="img-fluid">
                                @else
                                <img src="{{ asset('img/no-image.jpg')}}" id="reservepage-image-preview" class="img-fluid">
                                @endif
        	　                </th>
            	　            <th><strong>{{ $reservepage->name }}</strong><br>
                                @if($reservepage->price =='予約時に価格は算定されません')
                                ※ 予約時に価格は算定されません
                                @elseif($reservepage->price =='0')無料
                                @else
                                {{ number_format($reservepage->price) }}円（税込）
                                @endif
            	　            </th>
            	　        </tr>
　        　        　    <tr>
            	　            <th class="conf-t-l">予約日時</th>
            	　            <th>{{ \Carbon\Carbon::createFromDate($calendar->date)->format('Y年m月d日') }}<br>{{ $calendar->start_time }} - {{ $calendar->end_time }}</th>
            	　        </tr>
　                    	　<tr>
            	　            <th class="conf-t-l">予約人数</th>
            	　            <th>{{ $do_reserve->do_capacity }} 人</th>
            	　        </tr>
            	　        <tr>
            	　            <th class="conf-t-l">合計金額</th>
            	　            <th>
                                @if($reservepage->price =='予約時に価格は算定されません')
                                ※ 予約時に価格は算定されません
                                @elseif($reservepage->price =='0')無料
                                @else
                                {{ number_format($reservepage->price * $do_reserve->do_capacity) }}円（税込）
                                @endif
        	　                </th>
            	　        </tr>
            	　    </tbody>
            	　</table>

        	    </div>
            </div>
            
            <div class="do_reserve">
                <label>予約に関しての注意事項</label>
                <div class="notes">
                    <h4>日時・人数の変更について</h4>
                    <p>{!!nl2br($reservepage->date_change)!!}</p>
                    
                    <h4>キャンセルについて</h4>
                    <p>{!!nl2br($reservepage->cancel)!!}</p>

                </div>
            </div>
            
            <div class="do_reserve">
                <label>予約者様情報</label>
                <div class="confirmation">
            	　<table>
            	　    <tbody>
　                    	　<tr>
            	　            <th class="conf-t-l">お名前</th>
            	　            <th>{{ $do_reserve->customer_name }}</th>
            	　        </tr>
　        　              <tr>
            	　            <th class="conf-t-l">お名前（フリガナ）</th>
            	　            <th>{{ $do_reserve->customer_furigana }}</th>
            	　        </tr>
　        　              <tr>
            	　            <th class="conf-t-l">電話番号</th>
            	　            <th>{{ $do_reserve->customer_phone }}</th>
            	　        </tr>
　        　              <tr class="border-ari">
            	　            <th class="conf-t-l">メールアドレス</th>
            	　            <th>{{ $do_reserve->customer_email }}</th>
            	　        </tr>
            	　    </tbody>
            	　</table>
            	　
            	　<table>
            	　    <tbody>
            	　        <tr>
            	　            <td>※</td>
            	　            <td>メールアドレスの入力が無い場合、予約完了メールが送信されません。予めご了承ください。</td>
            	　        </tr>
            	　    </tbody>
            	　</table>

        	    </div>
            </div>
            
            <div class="completion-btn">
                {{ csrf_field() }}
                <a href="javascript:form1.submit()" role="button">予約する <i class="fas fa-angle-right"></i></a>
            </div>
            
            <div class="back-btn">
                <a href="javascript:void(0);" onclick="history.back();" role="button">戻る <i class="fas fa-angle-right"></i></a>
            </div>

        </form>

    </div>
</div>
@endsection
