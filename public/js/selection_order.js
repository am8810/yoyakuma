
// 予約時間を定義
var target_time = document.getElementById("calendar_time");

// 入力不可の内容
target_time.disabled = true;
target_time.style.background = "#f2f2f2";
target_time.style.borderColor = "#f2f2f2";
target_time.style.color = "#999";

// 入力可にし、予約可能な時間を取得する
function timestep(){
	// idが"date"の要素から日付の値を取得し、date変数に代入
	var date = document.getElementById("date").value;
	// 日付に値が入っている場合、idが"reservepage_id"の要素から予約ページのIDの値を取得し、reservepage_id変数に代入
    if (date != ''){
    	var reservepage_id = document.getElementById("reservepage_id").value;
    	// data変数には、dateとreservepage_idをプロパティとして持つオブジェクトを定義
    	var data = {'date': date,
                    'reservepage_id': reservepage_id
                    };
        // HTTPヘッダにCSRFトークンを追加                
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
            
        $.ajax({
            url: 'calendar/create_time', // 指定のURLに対してAjaxリクエストを送信
            type: 'POST', // リクエストタイプはPOST
            dataType: "json", // レスポンスのデータ形式はJSON
            data: data, // 送信するデータはdata変数の値
        }).done(function (results) {
            //通信が成功したときの処理
            console.log(results); // 結果をコンソールに出力
            // IDがcalendar_timeの要素から子要素を削除
            let select = document.getElementById("calendar_time");
            while (0 < select.childNodes.length) {
				select.removeChild(select.childNodes[0]);
			}
		
			// option要素を生成
			var option = document.createElement('option');
			option.text = "選択してください";

			// 値情報を空する
			option.value = "";
			
			// option要素を追加
			select.appendChild(option);
			
			// optionの内容をresultsの値に置き換える（繰り返し）
			for (const elem of results['data']) {
				// capacity（予約可能人数）が0より大きい場合（0以下の場合はoptionは生成されない）
				if (elem['capacity'] > 0) {
					var option = document.createElement('option'); // option要素を生成
					
					option.text = elem['start_time'] + '-' + elem['end_time']; // optionのテキストは予約開始時間と終了時間を組み合わせた形式になる
					
					option.value = elem['id'] + '_' + elem['capacity']; // optionのvalueはidの値とcapacityの値を組み合わせた形式になる
					
					select.appendChild(option); // option要素を追加
				}
			}
		

        }).fail(function (jqXHR, textStatus, errorThrown) {
            //通信が失敗したときの処理
            $('#error_message').empty();

            var text = $.parseJSON(jqXHR.responseText);
            var errors = text.errors;
            for (key in errors) {
                var errorMessage = errors[key][0];
                $('#error_message').append(`<li>${errorMessage}</li>`);
            }
        });
		// disabled属性を削除
		document.getElementById("calendar_time").removeAttribute("disabled");
		document.getElementById("calendar_time").style.background = "#fff";
		document.getElementById("calendar_time").style.borderColor = "#fff";
		document.getElementById("calendar_time").style.color = "#000";
	} else {
		// disabled属性を有効
		document.getElementById("calendar_time").disabled=true;
		document.getElementById("calendar_time").style.background = "#f2f2f2";
		document.getElementById("calendar_time").style.borderColor = "#f2f2f2";
		document.getElementById("calendar_time").style.color = "#999";
	}
}

// 予約可能人数を定義
var target_do_capacity = document.getElementById("do_capacity");

// 入力不可の内容
target_do_capacity.disabled = true;
target_do_capacity.style.background = "#f2f2f2";
target_do_capacity.style.borderColor = "#f2f2f2";
target_do_capacity.style.color = "#999";

// 入力可にし、予約可能人数を取得する
function do_capacitystep(){
	// idが"calendar_time"の要素から選択されたカレンダーIDの値を取得し、calendar_id変数に代入
	const calendar_id = $('#calendar_time').val();
	// カレンダーIDに値が入っている場合
	if (calendar_id != ''){
			// カレンダーIDの値内で最初に出現するアンダースコア("_")の位置を取得し、アンダースコア以降の部分（予約可能人数）を取得
		    let capacity = calendar_id.substr(calendar_id.indexOf('_') + 1)
		    
		    //通信が成功したときの処理
		    console.log(capacity); // 予約可能人数の値をコンソールに出力
            // IDがdo_capacityの要素から子要素を削除
            let select = document.getElementById("do_capacity");
            while (0 < select.childNodes.length) {
				select.removeChild(select.childNodes[0]);
			}
		
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
			for (let i = 1; i <= capacity; i++) { // ループカウンタ変数iを1で初期化。iの値を1ずつ増加していき、capacity以下の間は繰り返す。
				var option = document.createElement('option'); // option要素を生成
				
				option.text = i + "人"; // optionのテキストをループカウンタ変数iの値に人を連結

				option.value = i; // optionのvalueをループカウンタ変数iの値と同じにする
				
				select.appendChild(option); // option要素を追加
			}
			document.getElementById("do_capacity").removeAttribute("disabled");
			document.getElementById("do_capacity").style.background = "#fff";
			document.getElementById("do_capacity").style.borderColor = "#fff";
			document.getElementById("do_capacity").style.color = "#000";
        
    } else {
		document.getElementById("do_capacity").disabled=true;
		document.getElementById("do_capacity").style.background = "#f2f2f2";
		document.getElementById("do_capacity").style.borderColor = "#f2f2f2";
		document.getElementById("do_capacity").style.color = "#999";
	}
}



