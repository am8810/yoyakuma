@extends('layouts.reservepage_app')

@section('title', '予約完了 【予約管理ならヨヤクマ】')
@section('description', '予約が完了しました。予約者様のメールアドレスに予約完了メールが送信されていますので、予約内容をご確認ください。メールアドレスの入力が無い場合、予約完了メールが送信されません。予めご了承ください。')

@section('content')
<div class="r-page-body">
    <div class="reserve-form">
    	<div class="reservestep">
    	    <img src="{{ asset('img/reservestep-4.svg')}}" class="img-fluid" alt="予約完了">
    	</div>

    	<div class="completion">
    	    <h2>予約完了</h2>
    	    <p>予約が完了しました。予約者様のメールアドレスに予約完了メールが送信されていますので、予約内容をご確認ください。</p>
    	    
        	　<table>
        	　    <tbody>
        	　        <tr>
        	　            <td>※</td>
        	　            <td>メールアドレスの入力が無い場合、予約完了メールが送信されません。予めご了承ください。</td>
        	　        </tr>
        	　    </tbody>
        	　</table>
    	</div>
    	
    	<div class="comp-contact">
    	    <p>予約に関してのお問い合わせは、以下の連絡先までご連絡ください。</p>
    	    <h4>{{ $user->store_name }}</h4>
    	    <p>電話番号：{{ $user->phone }}</p>
    	</div>

        <form method="POST" action="" >
            <div class="reseveback-btn">
                <a href="/reserve/{{ $page_address }}/{{ $reservepage->id }}" role="button">予約ページへ戻る <i class="fas fa-angle-right"></i></a>
            </div>
        </form>

    </div>
</div>
@endsection
