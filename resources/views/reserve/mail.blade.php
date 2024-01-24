{{ $do_reserve->customer_name }} 様<br>
<br>
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>
　　　　　　　　 予約完了のお知らせ 　　　　　　　　<br>
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>
<br>
この度は、【{{ $reservepage->name }}】のご予約をいただき誠にありがとうございます。<br>
以下の通り、ご予約を承りました。<br>
<br>
---------------- 予約内容のご確認 -----------------<br>
<br>
【予約項目】<br>
予約対象：{{ $reservepage->name }}<br>
予約日時：{{ \Carbon\Carbon::createFromDate($calendar->date)->format('Y年m月d日') }}（{{ $calendar->start_time }} - {{ $calendar->end_time }}）<br>
予約人数：{{ $do_reserve->do_capacity }} 人<br>
合計金額：@if($reservepage->price =='予約時に価格は算定されません')※ 予約時に価格は算定されません
            @elseif($reservepage->price =='0')無料
            @else
            {{ number_format($reservepage->price * $do_reserve->do_capacity) }}円（税込）
            @endif<br>
<br>
【予約に関しての注意事項】<br>
日時・人数の変更について：<br>
{!!nl2br($reservepage->date_change)!!}<br>
キャンセルについて：<br>
{!!nl2br($reservepage->cancel)!!}<br>
<br>
【予約者様情報】<br>
お名前：{{ $do_reserve->customer_name }}<br>
お名前（フリガナ）：{{ $do_reserve->customer_furigana }}<br>
電話番号：{{ $do_reserve->customer_phone }}<br>
メールアドレス：{{ $do_reserve->customer_email }}
<br>
--------------------------------------------------<br>
<br>
※このメールへの返信はお受付しておりません。<br>
ご連絡等がございましたら、下記までお願いいたします。<br>
<br>
【お問い合わせ先】<br>
{{ $user->store_name }}<br>
電話番号：{{ $user->phone }}<br>
<br>
