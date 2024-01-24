{{ $user->store_name }} 様<br>
<br>
いつもお世話になっております。<br>
ヨヤクマの予約ページから「{{ $do_reserve->customer_name }}」様より、<br>
予約が入りましたのでお知らせいたします。<br>
以下が予約内容になります。<br>
<br>
---------------- 予約内容のご確認 -----------------<br>
<br>
【予約項目】<br>
予約対象：{{ $reservepage->name }}<br>
予約日時：{{ \Carbon\Carbon::createFromDate($calendar->date)->format('Y年m月d日') }}（{{ $calendar->start_time }} - {{ $calendar->end_time }}）<br>
予約人数：{{ $do_reserve->do_capacity }} 人<br>
合計金額：@if($reservepage->price =='-1')※ 予約時に価格は算定されません
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
ヨヤクマの管理画面にログインしていただくと、<br>
予約状況のカレンダーに予約が反映され、予約者様の情報が顧客一覧に反映されています。<br>
<br>
https://yoyakuma.com/login<br>
<br>
予約者様へは、「予約完了お知らせ」メールが自動送信されております。<br>
予約のご対応の方、何卒よろしくお願いいたします。<br>
<br>
-------------------------<br>
【予約管理ならヨヤクマ】<br>
https://yoyakuma.com<br>
<br>