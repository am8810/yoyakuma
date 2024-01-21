
// 予約ページ作成画面（日程・定員数）の為の記述〜始まり〜

function create_calendar(delete_flg) { // 関数の宣言
    var dateStr = $('input[name="date"]').val(); // 変数dateStrに日にちの値を取得
    const year = dateStr.substr(0, 4); // dateStrから先頭の0000（年）を変数yearに代入
    const month = dateStr.substr(5, 2); // dateStrから0000年の後の00（月）を変数monthに代入
    const day = dateStr.substr(8, 2); // dateStrから0000年00月の後の00（日）を変数dayに代入

    const date = year + '-' + month + '-' + day; // 変数dateの値を「0000-00-00」の形にする
    var start_time = $('select[name="start_time"]').val(); // 変数start_timeに開始時間の値を取得
    var end_time = $('select[name="end_time"]').val(); // 変数end_timeに終了時間の値を取得
    var capacity = document.getElementById('reservepage-capacity'); // 変数capacityに定員数の値を取得
    var reservepage_id = document.getElementById('reservepage_id');  // 変数reservepage_idにreservepage_idを取得
    var repeatList = document.getElementsByName('repeat');  // 変数repeatListにname="repeat"を取得
    var repeat = ""; // 変数repeatを初期化
    
    for (let i = 0; i < repeatList.length; i++){ // iという変数を0で初期化、iがrepeatListの長さよりも小さい場合処理を繰り返す
        if (repeatList.item(i).checked){ // repeatListのi番目を取得し、チェックされているか確認
            repeat = repeatList.item(i).value; // チェックされている場合、その値をrepeat変数に設定
        }
    }   

　　// 変数dataに対して日にち、開始時間、終了時間、定員数、id、repeat、delete_flgの値を取得
    var data = {'date': date,
                'start_time': start_time,
                'end_time': end_time,
                'capacity': capacity.value,
                'reservepage_id' : reservepage_id.value,
                'repeat': repeat,
                'delete_flg': delete_flg
                };
    const calendar_select_option = [] // calendar_select_optionという配列を作成
          $("#start_time option").each(function() { // #start_timeのoptionを全て選択
                calendar_select_option.push(this.value); // 現在反復処理中の配列を末尾に追加
          });

                
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '../calendar', // リクエストが送信されるURL
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
        left: 'prev,next', // 左側に表示される項目
        center: 'title', // 中央にタイトル（日にち）
        right: 'dayGridMonth,timeGridWeek' // 右側に表示される項目
      },
      locale: 'ja', // 表示言語を日本語化
      navLinks: true, // 前の週に移動したり、次の月に移動することを有効
      selectable: true, // 日付範囲の選択を���効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする
      events: results["data"],
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        

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
        $('#reservepage_id').val(""); // reservepage_idの初期値を空にする
        
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
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト。
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
      dayMaxEvents: true, // カレンダーの日付ごとに表示できるイベントの最大数を制限する
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    
    // イベント作成後にカレンダーをイベント作成した日に移動
    calendar.gotoDate(date);

    calendar.render(); // カレンダーを表示するためのメソッド
        $('#inputScheduleForm').modal('hide'); //ダイアログを閉じる
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



// カレンダーを全て削除（作成画面）
function drop_calendar() { // 関数の宣言
                
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '../drop_calendar', // リクエス�����が送信されるURL
        type: 'POST', // リクエストのHTTPメソッド
        dataType: "json", // サーバーからのレスポンスのデータタイプ
    })
    //通信が成功したときの処理
    .done(function (results) {
        console.log(results); // サーバーからのレスポンスデータをコンソールに表示
    var calendarEl = document.getElementById('calendar_reservepages'); // ID属性がcalendar_reservepagesの要素を取得し、変数calendarElに格納

    var calendar = new FullCalendar.Calendar(calendarEl, { // FullCalendarのカレンダーオブジェクトを作成し、変数calendarに格納。変数calendarElも格納
      headerToolbar: { // カレンダーのヘッダーツールバーについて
        left: 'prev,next', // 左側に表示される項目
        center: 'title', // 中央にタイトル（日にち）
        right: 'dayGridMonth,timeGridWeek' // 右側に表示される項目
      },
      locale: 'ja', // 表示言語を日本語化
      navLinks: true, // 前の週に移動したり、次の月に移動することを有効
      selectable: true, // 日付範囲の選択を���効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする
      events: results["data"],
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        

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
        //$('#end_time').prepend('<option value="' + endTime + '" selected>' + endTime + '</option>');
        const end_index = calendar_select_option.indexOf(endTime);
        $('#end_time')[0].options[end_index].selected = true;

        $('#reservepage-capacity').val(1); // 定員数の初�����値を1にする
        $('#reservepage_id').val(""); // reservepage_idの初期値を空にする
        
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
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト。
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
        $('#reservepage_id').val(arg.event.extendedProps["reservepage_id"]); // reservepage_idの初期値
        
        $('.repeat-radio').hide() // 繰り返しラジオボックスを非表示
        $('.btn-delete').show() // 削除ボタンを表示
        
        // 定員数を1より低く出来なくし、整数しか入力できなくする
        $('#reservepage-capacity').on('input', function() { // inputイベントが発生した際に実行
            var minValue = 1; // 最小値を1に設��
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
      dayMaxEvents: true, // カレンダーの日付ごとに表示できるイベントの最大数を制限する
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    
    calendar.render(); // カレンダーを表示するためのメソッド
        $('#inputScheduleForm').modal('hide'); //ダイアログを閉じる
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

// 予約ページ作成画面（日程・定員数）の為の記述〜終了〜


// 予約ページ編集画面（日程・定員数）の為の記述〜始まり〜

function edit_calendar(delete_flg) { // 関数の宣言
    var dateStr = $('input[name="date"]').val(); // 変数dateStrに日にちの値を取得
    const year = dateStr.substr(0, 4); // dateStrから先頭の0000（年）を変数yearに代入
    const month = dateStr.substr(5, 2); // dateStrから0000年の後の00（月）を変数monthに代入
    const day = dateStr.substr(8, 2); // dateStrから0000年00月の後の00（日）を変数dayに代入

    const date = year + '-' + month + '-' + day; // 変数dateの値を「0000-00-00」の形にする
    var start_time = $('select[name="start_time"]').val(); // 変数start_timeに開始時間の値を取得
    var end_time = $('select[name="end_time"]').val(); // 変数end_timeに終了時間の値を取得
    var capacity = document.getElementById('reservepage-capacity'); // 変数capacityに定員数の値を取得
    var reservepage_id = document.getElementById('reservepage_id');  // 変数reservepage_idにreservepage_idを取得
    var id = document.getElementById('calendar-id');  // 変数idにcalendar-idを取得
    var repeatList = document.getElementsByName('repeat');  // 変数repeatListにname="repeat"を取得
    var repeat = ""; // 変数repeatを初期化
    
    for (let i = 0; i < repeatList.length; i++){ // iという変数を0で初期化、iがrepeatListの長さよりも小さい場合処理を繰り返す
        if (repeatList.item(i).checked){ // repeatListのi番目を取得し、チェックされているか確認
            repeat = repeatList.item(i).value; // チェックされている場合、その値をrepeat変数に設定
        }
    }   

　　// 変数dataに対して日にち、開始時間、終了時間、定員数、reservepage_id、id、delete_flg、repeatの値を取得
    var data = {'date': date,
                'start_time': start_time,
                'end_time': end_time,
                'capacity': capacity.value,
                'reservepage_id' : reservepage_id.value,
                'id' : id.value,
                'delete_flg': delete_flg,
                'repeat': repeat,
                };
    const calendar_select_option = [] // calendar_select_optionという配列を作成
          $("#start_time option").each(function() { // #start_timeのoptionを全て選択
                calendar_select_option.push(this.value); // 現在反復処理中の配列を末尾に追加
          });

                
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '/update_calendar', // リクエストが送信されるURL
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
        left: 'prev,next', // 左側に表示される項目
        center: 'title', // 中央にタイトル（日にち）
        right: 'dayGridMonth,timeGridWeek' // 右側に表示される項目
      },
      locale: 'ja', // 表示言語を日本語化
      navLinks: true, // 前の週に移動したり、次の月に移動することを有効
      selectable: true, // 日付範囲の選択を���効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする
      events: results["data"],
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        

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
        //$('#end_time').prepend('<option value="' + endTime + '" selected>' + endTime + '</option>');
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
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト。
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
        $('#reservepage_id').val(arg.event.extendedProps["reservepage_id"]); // reservepage_idの初期値
        $('#calendar-id').val(arg.event.extendedProps["calendar_id"]); // calendar_idの初期値
        
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
      dayMaxEvents: true, // カレンダーの日付ごとに表示できるイベントの最大数を制限する
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    
    // イベント作成後にカレンダーをイベント作成した日に移動
    calendar.gotoDate(date);

    calendar.render(); // カレンダーを表示するためのメソッド
        $('#inputScheduleForm').modal('hide'); //ダイアログを閉じる
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


// カレンダーを全て削除（編集画面）
function edit_drop_calendar() { // 関数の宣言
    let reservepage_id = document.getElementById('reservepage_id');  // 変数reservepage_idにreservepage_idを取得
    
    // 変数dataに対してreservepage_idの値を取得
    let data = {'reservepage_id' : reservepage_id.value};
                
    $.ajaxSetup({ // AJAXのデフォルト設定を変更    
        // CSRFトークンを取得
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    $.ajax({ // AJAXリクエスト送信
        url: '/edit_drop_calendar', // リクエス�����が送信されるURL
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
        left: 'prev,next', // 左側に表示される項目
        center: 'title', // 中央にタイトル（日にち）
        right: 'dayGridMonth,timeGridWeek' // 右側に表示される項目
      },
      locale: 'ja', // 表示言語を日本語化
      navLinks: true, // 前の週に移動したり、次の月に移動することを有効
      selectable: true, // 日付範囲の選択を���効
      selectMirror: true, // 選択範囲のプレビュー
      allDaySlot: false, // 終日を非表示
      initialView: 'timeGridWeek', // 初期表示を週表示にする
      events: results["data"],
      select: function(start, end, resource) { // 日付範囲を選択した際にselectイベントが実行
        $('#inputScheduleForm').on('show.bs.modal', function (event) { // ダイアログのidを取得。.on〜でダイアログが表示される直前に実行されるイベントハンドラを設定
            setTimeout(function(){ //500ミリ秒後に指定した処理を実行する
                $('#inputTitle').focus(); //idがinputTitleの要素にフォーカスを設定
            }, 500); 
        }).modal("show"); // ダイアログ（モーダル）を表示する為の命令
        

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
        //$('#end_time').prepend('<option value="' + endTime + '" selected>' + endTime + '</option>');
        const end_index = calendar_select_option.indexOf(endTime);
        $('#end_time')[0].options[end_index].selected = true;

        $('#reservepage-capacity').val(1); // 定員数の初�����値を1にする
        $('#reservepage_id').val(""); // reservepage_idの初期値を空にする
        
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
      //カレンダー上のイベントがクリックされるとeventClickが発生。argはクリックされたイベントに関する情報を含むオブジェクト。
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
        $('#reservepage_id').val(arg.event.extendedProps["reservepage_id"]); // reservepage_idの初期値
        $('#calendar-id').val(arg.event.extendedProps["calendar_id"]); // calendar_idの初期値

        
        $('.repeat-radio').hide() // 繰り返しラジオボックスを非表示
        $('.btn-delete').show() // 削除ボタンを表示
        
        // 定員数を1より低く出来なくし、整数しか入力できなくする
        $('#reservepage-capacity').on('input', function() { // inputイベントが発生した際に実行
            var minValue = 1; // 最小値を1に設��
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
      dayMaxEvents: true, // カレンダーの日付ごとに表示できるイベントの最大数を制限する
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' } // hour: 'number'は時間を数値の形式で表示。minute: '2-digit'は分を2桁の数値で表示。
    });
    
    calendar.render(); // カレンダーを表示するためのメソッド
        $('#inputScheduleForm').modal('hide'); //ダイアログを閉じる
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


// 予約ページ編集画面（日程・定員数）の為の記述〜終了〜



// 日程・定員数の選択がない場合のバリデーション
$(function () { 
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


   // 予約作成フォームの入力チェック
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
     
     // 開始時間のチェック
     if ($('#start_time').val() == '') {
       // エラーあり
       error = true;
       message += '開始時間を選択してください。\n';
     }
     
     // 終了時間のチェック
     if ($('#end_time').val() == '') {
       // エラーあり
       error = true;
       message += '終了時間を選択してください。\n';
     } 
   
     // 定員数のチェック
     if ($('#reservepage-capacity').val() == '') {
       // エラーあり
       error = true;
       message += '終了時間を選択してください。\n';
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
  


