@extends('layouts.member_app')

@section('content')
<div class="member-body">
    <div class="container member-top-body m-t-b">
        <img src="{{ asset('img/logomark.svg')}}" class="membertop-logo" alt="予約管理ならヨヤクマ">
        
        <p class="member-top-p">予約ページを新規作成する場合は<span class="text-orange">『予約ページを作成』</span>をクリック、<br class="hidden-xs">
        既にある予約ページを編集する場合は<span class="text-blue">『予約ページを編集』</span>をクリックして下さい。</p>
    
        <div class="wrap top-btn">
            <div class="item btn-orange">
                <a href="{{ url('reservepages/step1') }}" role="button"><i class="fas fa-plus"></i> 予約ページを作成</a>
            </div>
            <div class="item btn-blue">
                <a href="{{ url('reservepages') }}" role="button">予約ページを編集 <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        
        <div class="reserv-status">
            <h2>予約状況</h2>
        </div>

        <div id='calendar'></div>
        
        <!-- モーダルの表示-->
        <div id="ReserveContents" class="modal fade" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">予約内容</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="reserve-title table-responsive">
                  <table class="text-nowrap">
                    <thead>
                      <tr>
                        <th colspan="2"><span id="title">予約タイトル</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span id="date" name="date">2023年9月1日</span>（<span id="startTime">12:00</span> - <span id="endTime">14:00</span>）</td>
                        <td class="right-t">残り予約可能人数：<span id="capacity">20</span>人</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
                <div class="reserve-conts table-responsive">
                  <table id="doreserve" class="text-nowrap">
                  </table>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- モーダルの表示（予約人数の変更）-->
        <div class="modal fade" id="reserveChange" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">変更する予約人数を選択してください</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="cansel-target table-responsive">
                          <table class="text-nowrap">
                            <thead>
                              <tr>
                                <th colspan="2">予約人数変更の対象</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><span id="targetChange"></span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        
                        <select id="select_capacity" class="reserve-change">
                        </select>
                      <input type="hidden" id="changeDoreserveId">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="change_doreserve()">登録</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- モーダルの表示（予約キャンセル）-->
        <div class="modal fade" id="reserveCancel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">本当に予約をキャンセルしますか？</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="really-cancel">※一度予約をキャンセルすると元に戻すことはできません。</p>
                        
                        <div class="cansel-target table-responsive">
                          <table class="text-nowrap">
                            <thead>
                              <tr>
                                <th colspan="2">予約キャンセル対象</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><span id="targetCancel"></span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <input type="hidden" id="cancelDoreserveId">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_doreserve()">予約キャンセルを実行</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- FullCalendarについての記述 -->
<script>
  // 予約キャンセルの為の記述
  $(document).ready(function() { // ページが読み込まれた際に処理を実行
    $('#reserveCancel').on('show.bs.modal', function(event) { //idがreserveCancelのモーダルを表示
        let button = $(event.relatedTarget); // モーダルが表示されるボタンにアクセス
        let targetCancel = button.data('name'); // data-name属性の値を取得し、変数targetCancelに格納
        let doreserveId = button.data('doreserveid'); // data-doreserveid属性の値を取得し、変数doreserveIdに格納
        let modal = $(this); // 取得したモーダルがjQueryオブジェクトとなり、変数modalに格納
        modal.find('#targetCancel').text(targetCancel); // id属性がtargetCancelの予約キャンセル対象をテキストで渡す
        modal.find('#cancelDoreserveId').val(doreserveId); //id属性がcancelDoreserveIdの要素にdoreserveIdの値を渡す
        
        // キャンセルボタンがクリックされた際の処理
        modal.find('.btn-danger').click(function() {
            // コンソールに出力
            console.log('予約キャンセルが実行されました。doreserveId: ' + doreserveId);
            
            // ダイアログを閉じる
            modal.modal('hide');
        });
    });
  });
  
  // 予約人数変更の為の記述
  $(document).ready(function() { // ページが読み込まれた際に処理を実行
    $('#reserveChange').on('show.bs.modal', function(event) { //idがreserveChangeのモーダルを表示
        let button = $(event.relatedTarget); // モーダルが表示されるボタンにアクセス
        let targetChange = button.data('name'); // data-name属性の値を取得し、変数targetChangeに格納
        let doreserveId = button.data('doreserveid'); // data-doreserveid属性の値を取得し、変数doreserveIdに格納
        let docapacity = button.data('docapacity'); // data-docapacity属性の値を取得し、変数docapacityに格納
        let capacity = button.data('capacity'); // data-capacity属性の値を取得し、変数capacityに格納
        let modal = $(this); // 取得したモーダルがjQueryオブジェクトとなり、変数modalに格納
        modal.find('#targetChange').text(targetChange); // id属性がtargetChangeの予約人数変更対象をテキストで渡す
        modal.find('#changeDoreserveId').val(doreserveId); //id属性がchangeDoreserveIdの要素にdoreserveIdの値を渡す
        
         let select = document.getElementById("select_capacity"); // ID属性がselect_capacityの要素を取得し、変数selectに格納
         select.innerHTML = ""; // select要素内の子要素を全て削除
         
          // option要素を生成
    			var option = document.createElement('option');
    			option.text = "選択してください";
    
    			// 値情報を空にする
    			option.value = "";
    			
    			// option要素を追加
    			select.appendChild(option);
    			
    			// 予約可能人数が20を超える場合は、予約可能人数を20に制限
    			if (capacity > 20) {
    				capacity = 20;
    			}
    			// 1から予約可能人数までの範囲でループし、各値に対してoption要素を生成
    			for (let i = 1; i <= (capacity+docapacity); i++) { // ループカウンタ変数iを1で初期化。iの値を1ずつ増加していき、capacity以下の間は繰り返す。
    				var option = document.createElement('option'); // option要素を生成
    				
    				option.text = i + "人"; // optionのテキストをループカウンタ変数iの値に人を連結
    
    				option.value = i; // optionのvalueをループカウンタ変数iの値と同じにする
    				
    				// 現状の人数が選択された状態で表示させる
    				if (i === docapacity) {
    				  option.selected = true;
    				}
    				select.appendChild(option); // option要素を追加
    			}
  			});
        
        // 登録ボタンがクリックされた際の処理
        modal.find('.btn-primary').click(function() {
            // doreserveIdを使ってキャンセルの処理を行うか、必要な操作を実行します。
            // この例では、単にコンソールに出力しています。
            console.log('予約人数が変更されました。doreserveId: ' + doreserveId);
            
            // ダイアログを閉じる
            modal.modal('hide');
        });
    });
  
  // 予約内容の反映の為の記述
  document.addEventListener('DOMContentLoaded', function() { // ページが読み込まれた際に処理を実行
     $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '/home/get_homecalendar', // リクエストが送信されるURL
        type: 'POST', // リクエストのHTTPメソッド
        dataType: "json", // サーバーからのレスポンスのデータタイプ
    })
    //通信が成功したときの処理
    .done(function (results) {
        console.log(results); // サーバーからのレスポンスデータをコンソールに表示
  
        var calendarEl = document.getElementById('calendar'); // ID属性がcalendarの要素を取得し、変数calendarElに格納

        var calendar = new FullCalendar.Calendar(calendarEl, { // FullCalendarのカレンダーオブジェクトを作成し、変数calendarに格納。変数calendarElも格納
          headerToolbar: { // カレンダーのヘッダーツールバーについて
            left: 'prev,next today', // 左側に表示される項目
            center: 'title', // 中央にタイトル（日にち）
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // 右側に表示される項目
          },
          locale: 'ja', // 表示言語を日本語化
          scrollTime: '09:00:00', // スクロール開始時間を午前9時に設定
          navLinks: true, // 前の週に移動したり、次の月に移動することを有効
          selectable: false, // 日付範囲の選択を無効
          selectMirror: true, // 選択範囲のプレビュー
          allDaySlot: false, // 終日を非表示
          initialView: 'timeGridWeek', // 初期表示を週表示にする
          events: results["data"], // resultsオブジェクトのdataを取得して表示
          
          //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト
          eventClick: function(arg) {
            $('#ReserveContents').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
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
            // month変数に、startYmdの月をgetMonthメソッドで取得。取得される月は 0 から始まるため、実際の月の値に 1 を加える。toStringメソッドで文字列として使用。padStartメソッドで2桁の月の表現
            const month = (startYmd.getMonth() + 1).toString().padStart(2, '0'); 
            // startYmdの日にちをgetDateメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで2桁の日にちの表現
            const day = startYmd.getDate().toString().padStart(2, '0');
        
            // #dateの値をyear、month、dayの値を結合して設定。それぞれを文字列にしてあるので＋演算子で結合
            $('#date').text(year + '年' + month + '月' + day + '日'); 
            // 変数startTimeに、startYmdから開始時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：09:30）
            var startTime = startYmd.getHours().toString().padStart(2, '0') + ':' + startYmd.getMinutes().toString().padStart(2, '0');
            // idがstartTimeの要素のテキストを変数startTimeに置き換える
            $('#startTime').text(startTime); 
            // 変数endTimeに、endYmdから終了時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：10:00）
            var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
            // idがendTimeの要素のテキストを変数endTimeに置き換える
            $('#endTime').text(endTime); 
            // idがcapacityの要素のテキストをcapacityの値に置き換える
            $('#capacity').text(arg.event.extendedProps["capacity"]); 
            // idがtitleの要素のテキストをフルカレンダーのtitleに置き換える
            $('#title').text(arg.event["title"]); 
            
            // 変数doreservesにdoreservesのデータを取得
            let doreserves = arg.event.extendedProps["doreserves"];
            // idがdoreserveのtableの子要素（tr）を全て削除して空にする（これを書かないとtrがどんどん増えてしまう）
            $('#doreserve').empty();
            
            // 予約内容が反映される繰り返し処理
            for (doreserve of doreserves) { // 変数doreservesの配列要素を一つずつ取り出し、変数doreserveに代入（反復処理）
              let name = ""; // 変数nameを宣言し、空の文字列で初期化
              if (doreserve["customer_furigana"] == null) { // フリガナが空の場合
                name = doreserve["customer_name"]; // 変数nameには名前だけが入る
              } else { // フリガナが空ではない場合
                name = doreserve["customer_name"] + "(" + doreserve["customer_furigana"] +")"; // 変数nameには名前（フリガナ）が入る
              }
              let price = ""; // 変数priceを宣言し、空の文字列で初期化
              if (arg.event.extendedProps["price"] == "-1") { // priceの値が「予約時に価格は算定されません」の場合
                price = "予約時に価格は算定されません"; // 変数priceには「予約時に価格は算定されません」が入る
              } else if (arg.event.extendedProps["price"] == "0") { // priceの値が0の場合
                price = "無料" // 変数priceには「無料」が入る
              } else { // priceの値に数値がある場合
                let totalPrice = doreserve["do_capacity"] * arg.event.extendedProps["price"]; // 変数totalPriceに、do_capacity掛けるpriceの値を代入
                price = "合計金額：" + totalPrice.toLocaleString("ja-JP") + "円（税込）" // 変数priceには、「合計金額：0,000円」が入る（金額は変数totalPriceの値で3桁ごとにカンマが付く）
              }
              
              // 変数reserveNameに「名前(フリガナ)：人数　価格」を格納
              let reserveName = name + '：' + doreserve["do_capacity"] + '名　　' + price;
              // 変数htmlを宣言し、初期値としてHTMLの文字列を代入し、変数の値を埋め込んでいる
              let html = '<tr><td class="reserve-name">' + reserveName + '</td>' + 
                         '<td class="cha-w"><button type="button" class="btn btn-change" data-toggle="modal" data-target="#reserveChange" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'" data-capacity="' + arg.event.extendedProps["capacity"] + 
                         '" data-docapacity="' + doreserve["do_capacity"] + '">予約人数の変更</button></td>' +
                         '<td class="can-w"><button type="button" class="btn btn-cancel" data-toggle="modal" data-target="#reserveCancel" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'">予約キャンセル</button></td>' +
                         '</tr>';
              $('#doreserve').append(html); // idがdoreserveのtableに、変数htmlの要素を生成

            }
            
          },
          editable: false, // カレンダー上のイベントを移動できなくする
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
  
  // 予約キャンセルの為の関数
  function delete_doreserve() { // 関数の宣言
    var dateStr = document.getElementById('date').textContent; // 変数dateStrにidがdateの要素から、日にちの値を取得
    const year = dateStr.substr(0, 4); // dateStrから先頭の0000（年）を変数yearに代入
    const month = dateStr.substr(5, 2); // dateStrから0000年の後の00（月）を変数monthに代入
    const day = dateStr.substr(8, 2); // dateStrから0000年00月の後の00（日）を変数dayに代入
    const date = year + '-' + month + '-' + day; // 変数dateの値を「0000-00-00」の形にする

    let doreserveId = $('input[id="cancelDoreserveId"]').val(); // idがcancelDoreserveIdのinput要素の値を、変数doreserveIdに取得

　　// 変数doreserveIdの値を含むdataオブジェクトを作成
    let data = {'doreserveId': doreserveId,};
    
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '/home/delete_doreserve', // リクエストが送信されるURL
        type: 'POST', // リクエストのHTTPメソッド
        dataType: "json", // サーバーからのレスポンスのデータタイプ
        data: data, // 変数dataに格納されているデータを指定
    })
    //通信が成功したときの処理
    .done(function (results) {
        console.log(results); // サーバーからのレスポンスデータをコンソールに表示
        let modal = $('#ReserveContents'); // idがReserveContentsの要素を選択し、変数modalに代入
        modal.modal('hide'); // モーダルを非表示にする
        var calendarEl = document.getElementById('calendar'); // ID属性がcalendarの要素を取得し、変数calendarElに格納

        var calendar = new FullCalendar.Calendar(calendarEl, { // FullCalendarのカレンダーオブジェクトを作成し、変数calendarに格納。変数calendarElも格納
          headerToolbar: { // カレンダーのヘッダーツールバーについて
            left: 'prev,next today', // 左側に表示される項目
            center: 'title', // 中央にタイトル（日にち）
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // 右側に表示される項目
          },
          locale: 'ja', // 表示言語を日本語化
          navLinks: true, // 前の週に移動したり、次の月に移動することを有効
          selectable: false, // 日付範囲の選択を無効
          selectMirror: true, // 選択範囲のプレビュー
          allDaySlot: false, // 終日を非表示
          initialView: 'timeGridWeek', // 初期表示を週表示にする
          events: results["data"], // resultsオブジェクトのdataを取得して表示
          
          //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト
          eventClick: function(arg) {
            $('#ReserveContents').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
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
            // month変数に、startYmdの月をgetMonthメソッドで取得。取得される月は 0 から始まるため、実際の月の値に 1 を加える。toStringメソッドで文字列として使用。padStartメソッドで2桁の月の表現
            const month = (startYmd.getMonth() + 1).toString().padStart(2, '0'); 
            // startYmdの日にちをgetDateメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで2桁の日にちの表現
            const day = startYmd.getDate().toString().padStart(2, '0');
        
            // #dateの値をyear、month、dayの値を結合して設定。それぞれを文字列にしてあるので＋演算子で結合
            $('#date').text(year + '年' + month + '月' + day + '日'); 
            // 変数startTimeに、startYmdから開始時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：09:30）
            var startTime = startYmd.getHours().toString().padStart(2, '0') + ':' + startYmd.getMinutes().toString().padStart(2, '0');
            // idがstartTimeの要素のテキストを変数startTimeに置き換える
            $('#startTime').text(startTime); 
            // 変数endTimeに、endYmdから終了時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：10:00）
            var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
            // idがendTimeの要素のテキストを変数endTimeに置き換える
            $('#endTime').text(endTime); 
            // idがcapacityの要素のテキストをcapacityの値に置き換える
            $('#capacity').text(arg.event.extendedProps["capacity"]); 
            // idがtitleの要素のテキストをフルカレンダーのtitleに置き換える
            $('#title').text(arg.event["title"]); 
            
            // 変数doreservesにdoreservesのデータを取得
            let doreserves = arg.event.extendedProps["doreserves"];
            // idがdoreserveのtableの子要素（tr）を全て削除して空にする（これを書かないとtrがどんどん増えてしまう）
            $('#doreserve').empty();
            
            // 予約内容が反映される繰り返し処理
            for (doreserve of doreserves) { // 変数doreservesの配列要素を一つずつ取り出し、変数doreserveに代入（反復処理）
              let name = ""; // 変数nameを宣言し、空の文字列で初期化
              if (doreserve["customer_furigana"] == null) { // フリガナが空の場合
                name = doreserve["customer_name"]; // 変数nameには名前だけが入る
              } else { // フリガナが空ではない場合
                name = doreserve["customer_name"] + "(" + doreserve["customer_furigana"] +")"; // 変数nameには名前（フリガナ）が入る
              }
              let price = ""; // 変数priceを宣言し、空の文字列で初期化
              if (arg.event.extendedProps["price"] == "-1") { // priceの値が「予約時に価格は算定されません」の場合
                price = "予約時に価格は算定されません"; // 変数priceには「予約時に価格は算定されません」が入る
              } else if (arg.event.extendedProps["price"] == "0") { // priceの値が0の場合
                price = "無料" // 変数priceには「無料」が入る
              } else { // priceの値に数値がある場合
                let totalPrice = doreserve["do_capacity"] * arg.event.extendedProps["price"]; // 変数totalPriceに、do_capacity掛けるpriceの値を代入
                price = "合計金額：" + totalPrice.toLocaleString("ja-JP") + "円（税込）" // 変数priceには、「合計金額：0,000円」が入る（金額は変数totalPriceの値で3桁ごとにカンマが付く）
              }
              
              // 変数reserveNameに「名前(フリガナ)：人数　価格」を格納
              let reserveName = name + '：' + doreserve["do_capacity"] + '名　　' + price;
              // 変数htmlを宣言し、初期値としてHTMLの文字列を代入し、変数の値を埋め込んでいる
              let html = '<tr><td class="reserve-name">' + reserveName + '</td>' + 
                         '<td class="cha-w"><button type="button" class="btn btn-change" data-toggle="modal" data-target="#reserveChange" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'" data-capacity="' + arg.event.extendedProps["capacity"] + 
                         '" data-docapacity="' + doreserve["do_capacity"] + '">予約人数の変更</button></td>' +
                         '<td class="can-w"><button type="button" class="btn btn-cancel" data-toggle="modal" data-target="#reserveCancel" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'">予約キャンセル</button></td>' +
                         '</tr>';
              $('#doreserve').append(html); // idがdoreserveのtableに、変数htmlの要素を生成

            }
            
          },
          editable: false, // カレンダー上のイベントを移動できなくする
          dayMaxEvents: true, // イベント数が多い場合「もっと表示」にする
          eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
        });
        
        calendar.gotoDate(date); // イベント作成後にカレンダーをイベント作成した日に移動
        calendar.render(); // カレンダーを表示するためのメソッド
        
        let str = "予約がキャンセルされました"; // 変数strを宣言し、初期値を設定
        alert(str); // 変数strをアラートダイアログとして表示

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
}

// 予約人数変更の為の関数
  function change_doreserve() { // 関数の宣言
    var dateStr = document.getElementById('date').textContent; // 変数dateStrにidがdateの要素から、日にちの値を取得
    const year = dateStr.substr(0, 4); // dateStrから先頭の0000（年）を変数yearに代入
    const month = dateStr.substr(5, 2); // dateStrから0000年の後の00（月）を変数monthに代入
    const day = dateStr.substr(8, 2); // dateStrから0000年00月の後の00（日）を変数dayに代入
    const date = year + '-' + month + '-' + day; // 変数dateの値を「0000-00-00」の形にする
    
    let doreserveId = $('input[id="changeDoreserveId"]').val(); // idがchangeDoreserveIdのinput要素の値を、変数doreserveIdに取得
    let selectCapacity = $('select[id="select_capacity"]').val(); // idがselect_capacityのselect要素の値を、変数selectCapacityに取得

　　// 変数doreserveIdと変数selectCapacityの値を含むdataオブジェクトを作成
    let data = {'doreserveId': doreserveId, 'selectCapacity': selectCapacity};
    
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '/home/change_doreserve', // リクエストが送信されるURL
        type: 'POST', // リクエストのHTTPメソッド
        dataType: "json", // サーバーからのレスポンスのデータタイプ
        data: data, // 変数dataに格納されているデータを指定
    })
    //通信が成功したときの処理
    .done(function (results) {
        console.log(results); // サーバーからのレスポンスデータをコンソールに表示
        let modal = $('#ReserveContents'); // idがReserveContentsの要素を選択し、変数modalに代入
        modal.modal('hide'); // モーダルを非表示にする
        var calendarEl = document.getElementById('calendar'); // ID属性がcalendarの要素を取得し、変数calendarElに格納

        var calendar = new FullCalendar.Calendar(calendarEl, { // FullCalendarのカレンダーオブジェクトを作成し、変数calendarに格納。変数calendarElも格納
          headerToolbar: { // カレンダーのヘッダーツールバーについて
            left: 'prev,next today', // 左側に表示される項目
            center: 'title', // 中央にタイトル（日にち）
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // 右側に表示される項目
          },
          locale: 'ja', // 表示言語を日本語化
          navLinks: true, // 前の週に移動したり、次の月に移動することを有効
          selectable: false, // 日付範囲の選択を無効
          selectMirror: true, // 選択範囲のプレビュー
          allDaySlot: false, // 終日を非表示
          initialView: 'timeGridWeek', // 初期表示を週表示にする
          events: results["data"], // resultsオブジェクトのdataを取得して表示
          
          //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト
          eventClick: function(arg) {
            $('#ReserveContents').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
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
            // month変数に、startYmdの月をgetMonthメソッドで取得。取得される月は 0 から始まるため、実際の月の値に 1 を加える。toStringメソッドで文字列として使用。padStartメソッドで2桁の月の表現
            const month = (startYmd.getMonth() + 1).toString().padStart(2, '0'); 
            // startYmdの日にちをgetDateメソッドで取得。toStringメソッドで文字列として使用。padStartメソッドで2桁の日にちの表現
            const day = startYmd.getDate().toString().padStart(2, '0');
        
            // #dateの値をyear、month、dayの値を結合して設定。それぞれを文字列にしてあるので＋演算子で結合
            $('#date').text(year + '年' + month + '月' + day + '日'); 
            // 変数startTimeに、startYmdから開始時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：09:30）
            var startTime = startYmd.getHours().toString().padStart(2, '0') + ':' + startYmd.getMinutes().toString().padStart(2, '0');
            // idがstartTimeの要素のテキストを変数startTimeに置き換える
            $('#startTime').text(startTime); 
            // 変数endTimeに、endYmdから終了時間と分を取得し、文字列に変換して2桁にして、コロンを間に入れて＋演算子で結合（例：10:00）
            var endTime = endYmd.getHours().toString().padStart(2, '0') + ':' + endYmd.getMinutes().toString().padStart(2, '0');
            // idがendTimeの要素のテキストを変数endTimeに置き換える
            $('#endTime').text(endTime); 
            // idがcapacityの要素のテキストをcapacityの値に置き換える
            $('#capacity').text(arg.event.extendedProps["capacity"]); 
            // idがtitleの要素のテキストをフルカレンダーのtitleに置き換える
            $('#title').text(arg.event["title"]); 
            
            // 変数doreservesにdoreservesのデータを取得
            let doreserves = arg.event.extendedProps["doreserves"];
            // idがdoreserveのtableの子要素（tr）を全て削除して空にする（これを書かないとtrがどんどん増えてしまう）
            $('#doreserve').empty();
            
            // 予約内容が反映される繰り返し処理
            for (doreserve of doreserves) { // 変数doreservesの配列要素を一つずつ取り出し、変数doreserveに代入（反復処理）
              let name = ""; // 変数nameを宣言し、空の文字列で初期化
              if (doreserve["customer_furigana"] == null) { // フリガナが空の場合
                name = doreserve["customer_name"]; // 変数nameには名前だけが入る
              } else { // フリガナが空ではない場合
                name = doreserve["customer_name"] + "(" + doreserve["customer_furigana"] +")"; // 変数nameには名前（フリガナ）が入る
              }
              let price = ""; // 変数priceを宣言し、空の文字列で初期化
              if (arg.event.extendedProps["price"] == "-1") { // priceの値が「予約時に価格は算定されません」の場合
                price = "予約時に価格は算定されません"; // 変数priceには「予約時に価格は算定されません」が入る
              } else if (arg.event.extendedProps["price"] == "0") { // priceの値が0の場合
                price = "無料" // 変数priceには「無料」が入る
              } else { // priceの値に数値がある場合
                let totalPrice = doreserve["do_capacity"] * arg.event.extendedProps["price"]; // 変数totalPriceに、do_capacity掛けるpriceの値を代入
                price = "合計金額：" + totalPrice.toLocaleString("ja-JP") + "円（税込）" // 変数priceには、「合計金額：0,000円」が入る（金額は変数totalPriceの値で3桁ごとにカンマが付く）
              }
              
              // 変数reserveNameに「名前(フリガナ)：人数　価格」を格納
              let reserveName = name + '：' + doreserve["do_capacity"] + '名　　' + price;
              // 変数htmlを宣言し、初期値としてHTMLの文字列を代入し、変数の値を埋め込んでいる
              let html = '<tr><td class="reserve-name">' + reserveName + '</td>' + 
                         '<td class="cha-w"><button type="button" class="btn btn-change" data-toggle="modal" data-target="#reserveChange" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'" data-capacity="' + arg.event.extendedProps["capacity"] + 
                         '" data-docapacity="' + doreserve["do_capacity"] + '">予約人数の変更</button></td>' +
                         '<td class="can-w"><button type="button" class="btn btn-cancel" data-toggle="modal" data-target="#reserveCancel" data-name="' + reserveName +
                         '" data-doreserveId="' + doreserve["id"] +'">予約キャンセル</button></td>' +
                         '</tr>';
              $('#doreserve').append(html); // idがdoreserveのtableに、変数htmlの要素を生成

            }
            
          },
          editable: false, // カレンダー上のイベントを移動できなくする
          dayMaxEvents: true, // イベント数が多い場合「もっと表示」にする
          eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
        });
        calendar.gotoDate(date); // イベント作成後にカレンダーをイベント作成した日に移動
        calendar.render(); // カレンダーを表示するためのメソッド
        
        let str = "登録が成功しました"; // 変数strを宣言し、初期値を設定
        if (!results["successFlg"]) { // resultsオブジェクトの中のsuccessFlgがfalseの場合（登録が失敗した場合）
          str = "登録が失敗しました"; //変数strの値を変更
        }
        alert(str); // 変数strをアラートダイアログとして表示
        
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
}
  
  
</script>

@endsection
