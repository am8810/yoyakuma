@extends('layouts.member_app')

@section('title', '日時・定員数（予約ページ編集） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページの日時・定員数の編集画面です。現在設定されている日時に対してカレンダーに色が付いています。既に設定がされたカレンダーの編集や、新たに日時・定員数を追加、日時・定員数の設定削除等が行えます。')

@section('content')

<div class="popup" id="js-popup">
  <div class="popup-inner">
    <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
    <a class="d-none d-sm-block" href="#"><img src="{{ asset('img/modal_1.jpg')}}" alt="カレンダー上から日程・定員数を設定できます！"></a>
    <a class="d-block d-sm-none" href="#"><img src="{{ asset('img/modal_1-s.jpg')}}" alt="カレンダー上から日程・定員数を設定できます！"></a>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>

<div class="member-body">
  <div class="l-container d-none d-sm-block">
	  <div id="pankuzu">
    	 <ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		<li class="breadcrumb-item"><a href="{{ url('reservepages') }}">予約ページ編集</a></li>
      	<li class="breadcrumb-item active">日時・定員数</li>
    	 </ol>
    </div>
  </div>

  <div class="container member-top-body type-l create-2-body">
    <div id="pankuzu" class="d-block d-sm-none c-2-pan">
      <ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
    		<li class="breadcrumb-item"><a href="{{ url('reservepages') }}">予約ページ編集</a></li>
      	<li class="breadcrumb-item active">日時・定員数</li>
      </ol>
    </div>

      <div class="type-l-edit">
        <h2>編集画面</h2>
      </div>
  
      <h1>日時・定員数</h1>
      
      <div class="notset">
  	    @if($validation_calendar_flg)
  	    <p>※日時・定員数の設定がありません。</p>
  	    @endif
      </div>
      
  	<div class="flow-line-3"></div>
  
  	<div class="flow-2">
  	    <h3>日時・定員数はカレンダーを<strong>直接クリック</strong>すると設定が行えます。</h3>
  	    <p>（日時・定員数の設定は複数行うことが可能です。）</p>
  	    
  	    <div class="straddle">
    	    <table>
    	      <tr>
    	        <td>※</td>
    	        <td>日付をまたいだ設定は行えません。</td>
    	      </tr>
    	      <tr>
    	        <td>※</td>
    	        <td>繰り返し設定は新規で登録を行う際にしか表示されず、既存のカレンダー設定画面には表示されません。</td>
    	      </tr>
    	      <tr>
    	        <td>※</td>
    	        <td>カレンダーを直接触って日時を変更した場合は、「登録」をクリックする必要があります。</td>
    	      </tr>
    	      <tr>
    	        <td>※</td>
    	        <td>設定した日時・定員数を全て削除したい場合は、以下のボタンをクリックしてください。</td>
    	      </tr>
    	    </table>
  	    </div>
  	    
  	    <button class="btn btn-light btn-center" data-toggle="modal" data-target="#all-delete">全て削除</button>
  
        <div class="modal fade" id="all-delete" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">本当に全て削除しますか？</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">一度削除すると日時・定員数は全て削除され、復旧はできません。</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="edit_drop_calendar()">全て削除</button>
                    </div>
                </div>
            </div>
        </div>
  
  	</div>
  	
  	<input id="reservepage_id" name="reservepage_id" type="hidden" value="{{ $reservepage_id }}">
  	
  	<!-- FullCalendarの表示-->
    <div id='calendar_reservepages'></div>

    <div class="btn-backlist">
      <a href="/reservepages">予約ページ一覧に戻る <i class="fas fa-angle-right"></i></a>
    </div>
  
  
    <!-- モーダルの表示-->
    <div id="inputScheduleForm" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">日時・定員数の選択</h5>
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <table class="date_time_t">
              <tr class="r-date">
                <td class="d-conts">日にち</td>
                <td>
                  <input id="date" name="date" class="fieldset__input js__datepicker" type="text" placeholder="選択してください">
                </td>
              </tr>
              
              <tr>
                <td class="d-conts">時間</td>
                <td>
                  <select id="start_time" name="start_time" type="text" placeholder="00:00">
                    <!-- 00:00から23:45を15分ごとに作成 -->
                    <?php
                      $interval = 15; // 分単位の間隔
                      $startTime = strtotime('00:00');
                      $endTime = strtotime('23:45');
                      $current = $startTime;
                  
                      while ($current <= $endTime) {
                        $time = date('H:i', $current);
                        echo '<option value="' . $time . '">' . $time . '</option>';
                        $current += $interval * 60;
                      }
                    ?>
                  </select>
                  〜
                  <select id="end_time" name="end_time" type="text" placeholder="00:00">
                    <!-- 00:00から23:45を15分ごとに作成 -->
                    <?php
                      $interval = 15; // 分単位の間隔
                      $startTime = strtotime('00:00');
                      $endTime = strtotime('23:45');
                      $current = $startTime;
                  
                      while ($current <= $endTime) {
                        $time = date('H:i', $current);
                        echo '<option value="' . $time . '">' . $time . '</option>';
                        $current += $interval * 60;
                      }
                    ?>
                  </select>
                </td>
              </tr>
              
              <tr class="r-capa">
                <td class="d-conts">定員数</td>
                <td>
                  <input id="reservepage-capacity" name="capacity" type="number" placeholder="00">人
                </td>
              </tr>
            </table>
            
            <div class="repeat-radio">
              <h4>繰り返し設定</h4>
              <input type="radio" id="repeat1" name="repeat" value="none-repeat" checked="checked"><label>繰り返さない</label>
              <input type="radio" id="repeat2" name="repeat" value="day-repeat"><label>毎日</label>
              <input type="radio" id="repeat3" name="repeat" value="week-repeat"><label>毎週</label>

              <table>
                <tr>
                  <td>※</td>
                  <td>繰り返し期間は1年先までになります。<br>1年先以降の設定は、先の日にちのカレンダーを別途選択して行ってください。</td>
                </tr>
              </table>
            </div>
            <input id="calendar-id" name="id" type="hidden">
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="edit_calendar(false)">登録</button>
            <button type="button" class="btn btn-danger btn-delete" onclick="edit_calendar(true)">削除</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>


<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ secure_asset('js/calendar.js') }}" defer></script>


<!-- FullCalendarについての記述 -->
<script>
  const calendar_select_option = [] // calendar_select_optionという配列を作成
  $("#start_time option").each(function() { // #start_timeのoptionを全て選択
        calendar_select_option.push(this.value); // 現在反復処理中の配列を末尾に追加
  });
  document.addEventListener('DOMContentLoaded', function() { // ページが読み込まれた際に処理を実行
  var reservepage_id = document.getElementById('reservepage_id'); // 変数reservepage_idにreservepage_idを格納
  var data = {'reservepage_id': reservepage_id.value}; // 変数dataにreservepage_idの値を格納
  $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '../../edit_calendar', // リクエストが送信されるURL
        type: 'POST', // リクエストのHTTPメソッド
        dataType: "json", // サーバーからのレスポンスのデータタイプ
        data: data, // 変数dataに格納されているデータを指定
    })
    //通信が成功したときの処理
    .done(function (results) {
        console.log(results); // サーバーからのレスポンスデータをコンソールに表示
    var calendarEl = document.getElementById('calendar_reservepages'); // ID属性がcalendar_reservepagesの要素を取得し、変数calendarElに格納

    var calendar = new FullCalendar.Calendar(calendarEl, { // FullCalendarのカレンダーオブジェクトを作成し、変数calendarに格納。変数calendarElも格納
      headerToolbar: { // カレンダーのヘッダーツールバーについて
        left: 'prev,next today', // 左側に表示される項目
        center: 'title', // 中央にタイトル（日にち）
        right: 'dayGridMonth,timeGridWeek' // 右側に表示される項目
      },
      locale: 'ja', // 表示言語を日本語化
      scrollTime: '09:00:00', // スクロール開始時間を午前9時に設定
      navLinks: true, // 前の週に移動したり、次の月に移動することを有効
      selectable: true, // 日付範囲の選択を���効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする
      events: results["data"], // resultsオブジェクトのdataを取得して表示
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイア��グが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ��イアログ（モーダル）を表示する為の命令
        

        var startYmd; // 変数startYmdを宣言
        var endYmd; // 変数endYmdを宣言
        if (start["startStr"].length < 11) { // startStrの文字列長が10の場合（時間の情報が無い場合）
          startYmd = new Date(start["startStr"] + ' 00:00:00'); // startYmdに、startStrに00:00:00を追加したものをDateオブジェクトとして代入
          endYmd = new Date(start["endStr"] + ' 00:30:00'); // endYmdに、endStrに00:30:00を追加したものをDateオブジェクトとして代入
        } else { // 日付と時間の情報がある場合
          startYmd = new Date(start["startStr"]); // startYmdに、startStrをDateオブジェクトとして代入
          endYmd = new Date(start["endStr"]); // endYmdに、endStrをDateオブジェクトとして代入
        }
        
        // year変数に、startYmdの年をgetFullYearメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで4桁の年の表現
        const year = startYmd.getFullYear().toString().padStart(4, '0'); 
        // month変数に、startYmdの月をgetMonthメソッドで取得。取得される月は 0 から始まるため、実際の月の値に 1 を加える。toStringメソッドで文字列として使用。padStartメソッドで2桁の月の表現
        const month = (startYmd.getMonth() + 1).toString().padStart(2, '0'); 
        // startYmdの日にちをgetDateメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで2桁の日にちの表現
        const day = startYmd.getDate().toString().padStart(2, '0');

        // #dateの値をyear、month、dayの値を結合して設定。それぞれを文字列にしてあるので＋演算子で結合
        $('#date').val(year + '年' + month + '月' + day + '日'); 
        
        // #start_timeの値を、startYmdの情報から取得し、文字列とし時と分を結合
        var startTime = startYmd.getHours().toString().padStart(2, '0') + ':' + startYmd.getMinutes().toString().padStart(2, '0');
        const start_index = calendar_select_option.indexOf(startTime);
        $('#start_time')[0].options[start_index].selected = true;
        
        // #end_timeの値を、endYmdの情報から取得し、文字列として時と分を結合
        var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
        const end_index = calendar_select_option.indexOf(endTime);
        $('#end_time')[0].options[end_index].selected = true;

        $('#reservepage-capacity').val(1); // 定員数の初期値を1にする
        $('#calendar-id').val(""); // calendar_idの初期値を空にする
        
        // 定員数を1より低く出来なくし、整数しか入力できなくする
        $('#reservepage-capacity').on('input', function() { // inputイベントが発生した際に実行
          var minValue = 1; // 最小値を1に設定
          var currentValue = $(this).val(); // 現在の値を取得
          
          // 入力値が整数でない場合は最小値に設定する
          if (!Number.isInteger(Number(currentValue))) { //値が整数か判定
            $(this).val(minValue);
            return;
          }
        
          // 入力値が最小値未満の場合は最小値に設定する
          if (parseInt(currentValue) < minValue) { // parseIntは値を整数に変換する関数
            $(this).val(minValue);
          }
        });
        
        $('.repeat-radio').show() // 繰り返しラジオボックスを表示
        $('.btn-delete').hide() // 削除ボタンを非表示
        
        calendar.unselect() // カレンダー上で選択されたイベントを選択解除

      },
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト
      eventClick: function(arg) { 
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        var startYmd; // 変数startYmdを宣言
        var endYmd; // 変数endYmdを宣言
        if (arg.event["startStr"].length < 11) { // startStrの文字列長が10の場合（時間の情報が無い場合）
              startYmd = new Date(arg.event["startStr"] + ' 00:00:00'); // startYmdに、startStrに00:00:00を追加したものをDateオブジェクトとして代入
              endYmd = new Date(arg.event["endStr"] + ' 00:30:00'); // endYmdに、endStrに00:30:00を追加したものをDateオブジェクトとして代入
        } else { // 日付と時間の情報がある場合
              startYmd = new Date(arg.event["startStr"]); // startYmdに、startStrをDateオブジェクトとして代入
              endYmd = new Date(arg.event["endStr"]); // endYmdに、endStrをDateオブジェクトとして代入
        }
            
        // year変数に、startYmdの年をgetFullYearメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで4桁の年の表現
        const year = startYmd.getFullYear().toString().padStart(4, '0'); 
        // month変数に、startYmdの月をgetMonthメソッドで取得。取得される月は 0 から始まるため、実際の月の値に 1 を加える。toStringメソッドで文字列として���用。padStartメソッドで2桁の月の表現
        const month = (startYmd.getMonth() + 1).toString().padStart(2, '0'); 
        // startYmdの日にちをgetDateメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで2桁の日にちの表現
        const day = startYmd.getDate().toString().padStart(2, '0');
    
        // #dateの値をyear、month、dayの値を結合して設定。それぞれを文字列にしてあるので＋演算子で結合
        $('#date').val(year + '年' + month + '月' + day + '日'); 
            
        // #start_timeの値を、startYmdの情報から取得し、文字列とし時と分を結合
        var startTime = startYmd.getHours().toString().padStart(2, '0') + ':' + startYmd.getMinutes().toString().padStart(2, '0');
        const start_index = calendar_select_option.indexOf(startTime);
        $('#start_time')[0].options[start_index].selected = true;
            
        // #end_timeの値を、endYmdの情報から取得し、文字列として時と分を結合
        var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
        const end_index = calendar_select_option.indexOf(endTime);
        $('#end_time')[0].options[end_index].selected = true;
    
        $('#reservepage-capacity').val(arg.event.extendedProps["capacity"]); // 定員数の初期値
        $('#calendar-id').val(arg.event.extendedProps["calendar_id"]); // calendar_idの初期値
        $('#reservepage_id').val(arg.event.extendedProps["reservepage_id"]); // reservepage_idの初期値
        
        $('.repeat-radio').hide() // 繰り返しラジオボックスを非表示
        $('.btn-delete').show() // 削除ボタンを表示
        
        // 定員数を1より低く出来なくし、整数しか入力できなくする
        $('#reservepage-capacity').on('input', function() { // inputイベントが発生した際に実行
            var minValue = 1; // 最小値を1に設定
            var currentValue = $(this).val(); // 現在の値を取得
              
            // 入力値が整数でない場合は最小値に設定する
            if (!Number.isInteger(Number(currentValue))) { //値が整数か判定
                $(this).val(minValue);
                return;
            }
            
            // 入力値が最小値未満の場合は最小値に設定する
            if (parseInt(currentValue) < minValue) { // parseIntは値を整数に変換する関数
                $(this).val(minValue);
            }
        });
        
      },
      editable: true, // カレンダー上のイベントや日付を編集可能にする
      dayMaxEvents: true, // イベント数が多い場合「もっと表示」にする
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    calendar.render(); // カレンダーを表示するためのメソッド
    })
    //通信が失敗したときの処理
    .fail(function (jqXHR, textStatus, errorThrown) { //3つの関数は通信失敗の詳細情報の為必要
        $('#error_message').empty(); // IDがerror_messageの内容を全て削除し空にする

        var text = $.parseJSON(jqXHR.responseText); // サーバーからのレスポンスデータをJSON形式で受け取る
        var errors = text.errors; // 取得したエラーメッセージの情報を取得
        for (key in errors) { //keyはループ変数で、errors変数の各プロパティのキーが順番に代入される
            var errorMessage = errors[key][0]; //errorMessage変数にerrors変数のプロパティの配列の最初の要素を格納
            $('#error_message').append(`<li>${errorMessage}</li>`); //IDがerror_messageの値を使ってli要素を作成
        }
    });
});
</script>


<script type="text/javascript">
$(function(){
  $('#date').pickadate();
});
</script>



@endsection



