$(function () { 
      // AjaxでSTATIC FORMSにデータを送信
   $('#submit').on('click', function (event) {
     // formタグによる送信を拒否
     event.preventDefault();
   
     // 入力チェックをした結果、エラーがあるかないか判定
     let result = inputCheck();
     
     // エラー判定とメッセージを取得
     let error = result.error;
     let message = result.message;
     
     // エラーが無かったらページ遷移し、エラーがあったらエラー表示する
     if (error == false) {
       // ページ遷移する
       $('form').submit();
     } else {
       // エラーメッセージを表示する
       alert(message);
     }
   });
   
  // フォーカスが外れたとき（blur）にフォームの入力チェックをする
   $('#date').blur(function () {
     inputCheck();
   });
   $('#calendar_time').blur(function () {
     inputCheck();
   });
   $('#do_capacity').blur(function () {
     inputCheck();
   });
   $('#customer_name').blur(function () {
     inputCheck();
   });
   $('#customer_furigana').blur(function () {
     inputCheck();
   });
   $('#customer_email').blur(function () {
     inputCheck();
   });
   $('#customer_phone').blur(function () {
     inputCheck();
   });
   $('#card_holder').blur(function () {
     inputCheck();
   });
   $('#card_number').blur(function () {
     inputCheck();
   });
   $('#card_expiry_year').blur(function () {
     inputCheck();
   });
   $('#card_expiry_month').blur(function () {
     inputCheck();
   });
   $('#security_code').blur(function () {
     inputCheck();
   });



   // 予約フォームの入力チェック
   function inputCheck() {
// エラーのチェック結果
     let result;
 
     // エラーメッセージのテキスト
     let message = '';
 
     // エラーがなければfalse、エラーがあればtrue
     let error = false;
     
     // 日にちのチェック
     if ($('#date').val() == '') {
       // エラーあり
       error = true;
       message += '日にちを選択してください。\n';
     }
     
     // 時間のチェック
     if ($('#calendar_time').val() == '') {
       // エラーあり
       error = true;
       message += '時間を選択してください。\n';
     }
     
     // 予約人数のチェック
     if ($('#do_capacity').val() == '') {
       // エラーあり
       error = true;
       message += '予約人数を選択してください。\n';
     } 
   
     // お客様のお名前チェック
     if ($('#customer_name').val() == '') {
       // エラーあり
       error = true;
       message += 'お名前を入力してください。\n';
     } 
     
     // お客様の電話番号チェック
     if ($('#customer_phone').val() == '') {
       // エラーあり
       error = true;
       message += '電話番号を入力してください。\n';
     } 

     // オブジェクトでエラー判定とメッセージを返す
     result = {
       error: error,
       message: message
     }
 
     // 戻り値としてエラーがあるかどうかを返す
     return result;

    }
});