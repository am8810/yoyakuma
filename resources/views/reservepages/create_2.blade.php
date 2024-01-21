@extends('layouts.member_app')

@section('title', '日時・定員数（予約ページ作成） / 管理画面 【予約管理ならヨヤクマ】')
@section('description', '予約ページ作成の日時・定員数の設定画面です。日時・定員数はカレンダーを直接クリックすると設定が行えます。（日時・定員数の設定は複数行うことが可能です。）毎週や毎日の繰り返し設定も行えます。')

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
         <li class="breadcrumb-item"><a href="{{ url('reservepages/step1') }}">予約ページ作成（基本情報）</a></li>
         <li class="breadcrumb-item active">日時・定員数</li>
      </ol>
    </div>
  </div>

  <div class="container member-top-body create-2-body">
    <div id="pankuzu" class="d-block d-sm-none c-2-pan">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>
         <li class="breadcrumb-item"><a href="{{ url('reservepages/step1') }}">予約ページ作成（基本情報）</a></li>
         <li class="breadcrumb-item active">日時・定員数</li>
      </ol>
    </div>

    <h1 class="create_title">日時・定員数</h1>
    
    <div class="notset">
	    @if($validation_calendar_flg)
	    <p>※日時・定員数の設定がありません。</p>
	    @endif
    </div>
      
  	<div class="flow-line"></div>
  	
  	<div class="flow">
	    <img class="d-none d-sm-block" src="{{ asset('img/flow-2.svg')}}" alt="予約ページ作成の流れ（日時・定員数）">
	    <img class="d-block d-sm-none" src="{{ asset('img/flow-2-s.svg')}}" alt="予約ページ作成の流れ（日時・定員数）">
  	</div>
  	
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
                        <p class="text-center">一度削除すると日時・定員数はすべて削除され復旧はできません。</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="drop_calendar()">全て削除</button>
                    </div>
                </div>
            </div>
        </div>
  
  	</div>
  	
  	<!-- FullCalendarの表示-->
    <div id='calendar_reservepages'></div>
  	<!---->
  	
    <form method="POST" action="/reservepages/saveStep2" class="create-form">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-create">ページ作成 <i class="fas fa-angle-right"></i></button>
    </form>
  
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
    
          </div>
          <div class="modal-footer">
            <input id="reservepage_id" name="reservepage_id" type="hidden">
            <button type="button" class="btn btn-primary" onclick="create_calendar(false)">登録</button>
            <button type="button" class="btn btn-danger btn-delete" onclick="create_calendar(true)">削除</button>
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

  document.addEventListener('DOMContentLoaded', function() { // DOMContentLoadedイベントが発生した時に関数が実行される
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
      selectable: true, // 日付範囲の選択を有効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする

      // 最初の新規作成
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        

        var startYmd; // 変数startYmdを宣言
        var endYmd; // 変数endYmdを宣言
        if (start["startStr"].length < 11) { // startStrの文字列長が11未満の場合（時間の情報が無い場合）
          startYmd = new Date(start["startStr"] + ' 00:00:00'); // startYmdに、startStrに00:00:00を追加したものをDateオブジェクトとして代入
          endYmd = new Date(start["endStr"] + ' 00:30:00'); // endYmdに、endStrに00:30:00を追加したものをDateオブジェクトとして代入
        } else { // 日付と時間の情報がある場合
          startYmd = new Date(start["startStr"]); // startYmdに、startStrをDateオ�������ジェクトとして代入
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
        const start_index = calendar_select_option.indexOf(startTime); // calendar_select_option配列でstartTimeの値が最初に見つかった位置をインデックス
        $('#start_time')[0].options[start_index].selected = true; // #start_timeのオプションを選択状態にする
        
        // #end_timeの値を、endYmdの情報から取得し、文字列として時と分を結合
        var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
        const end_index = calendar_select_option.indexOf(endTime); // calendar_select_option配列でendTimeの値が最初に見つかった位置をインデックス
        $('#end_time')[0].options[end_index].selected = true; // #endt_timeのオプションを選択状態にする

        $('#reservepage-capacity').val(1); // 定員数の初期値を1にする
        
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
        
        $('.btn-delete').hide() // 削除ボタンを非表示
        
        calendar.unselect() // // カレンダー上で選択されたイベントを選択解除
        
      },
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト。
      eventClick: function(arg) { 
      　// イベントを削除するときの確認メッセージ
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove() // イベントをカレンダーから削除
        }
      },
      editable: true, // カレンダー上のイベントや日付を編集可能にする
      dayMaxEvents: true, // カレンダーの日付ごとに表示できるイベントの最大数を制限する
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    
    calendar.render(); // カレンダーを表示するためのメソッド
  });
  

</script>


<script type="text/javascript">
$(function(){
  $('#date').pickadate();
});
</script>



@endsection



