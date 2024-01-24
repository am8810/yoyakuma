<?php

namespace App\Http\Controllers;

use App\Reservepage;
use App\Calendar;
use App\Doreserve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReservepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $private = array("private" => 0); // $privateという連想配列を作成し、キーを0で初期化
        $public_page = 1; // $public_pageという変数を作成し、キーを1で初期化
        $private_page = 1; // $private_pageという変数を作成し、キーを1で初期化
        
        // privateのキーが空の場合、公開の表示。$public_pageにpageキーをリクエストし、privateのキーに1に変更する
        if ($request["private"] == null) {
            $public_page = $request["page"];
            $private = array("private" => 1);
        // privateのキーが空でない場合、非公開の表示。$private_pageにpageキーをリクエストする
        } else {
            $private_page = $request["page"];
        }
        
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        // ログインしているユーザーの予約ページのみ表示し、releaseの値が0の公開状態のみを表示する
        $reservepages = Reservepage::where('user_id', $user->id)->where('release', 0)
                        // 1ページの表示を10件にし、'*'で全てのカラムを取得し、$public_pageのpageキーを与える
                        ->orderBy('created_at', 'DESC')->paginate(10, ['*'], 'page', $public_page);
        
        
        // ログインしているユーザーの予約ページのみ表示し、releaseの値が1の非公開状態のみを表示する
        $reservepage_private = Reservepage::where('user_id', $user->id)->where('release', 1)
                        // 1ページの表示を10件にし、'*'で全てのカラムを取得し、$private_pageのpageキーを与える
                        ->orderBy('created_at', 'DESC')->paginate(10, ['*'], 'page', $private_page);

 
        return view('reservepages.index', compact('reservepages', 'reservepage_private', 'user', 'private'));
    }

    public function createStep1(Request $request)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        return view('reservepages.create', compact('user'));
    }
    
    public function createStep2(Request $request)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        // 予約作成ページ情報を取得
        $reservepage = $request->session()->get('reservepage'); // セッションからreservepageを取得し、$reservepageに代入

        $validation_calendar_flg = $request->session()->get('validation_calendar_flg'); // セッションからvalidation_calendar_flgを取得    
        if (is_null($validation_calendar_flg)) { // validation_calendar_flgが空の場合
            $validation_calendar_flg = false;
        }    
        return view('reservepages.create_2', compact('user', 'validation_calendar_flg'));
    }
    
    public function createStep3(Request $request)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        // 予約作成ページ情報を取得
        $reservepage = $request->session()->get('reservepage'); // セッションからreservepageを取得し、$reservepageに代入
        
        if ($user->member_flag == 0) { // 無料会員の場合（member_flagが0の場合）
            $reservepage->release = 1; // 非公開状態にする（releaseに1を与える）
        }
        
        if ($reservepage) {
        // reservepageの情報を全て登録する
        $reservepage->save(); // $reservepageをデータベースに保存
        $calendar_list = $request->session()->get('calendar'); // セッションからcalendarを取得し、$calendar_listに代入

        for($i = 0; $i < count($calendar_list); $i++ ) { // $iを初期値0として$calendar_listの数より小さい限り繰り返す
            $calendar = $calendar_list[$i]; // $calendar_listの配列にカウンタ変数$iを入れ、順番に要素を取得する
            unset($calendar -> repeat); // repeatを削除
            $calendar -> reservepage_id = $reservepage->id; // $calendarのreservepage_idプロパティに、$reservepageのidプロパティを代入
            $calendar->save(); // $calendarをデータベースに保存
        }
        $request->session()->forget('calendar'); // セッションからcalendarを削除
        $request->session()->forget('count'); // セッションからcountを削除
        $request->session()->forget('reservepage'); // セッションからreservepageを削除
        
        return view('reservepages.create_3', compact('user', 'reservepage'));
        } else {
        // $reservepageがnullの場合、ホーム画面にリダイレクトするなどの処理を追加
        return redirect()->route('home'); // ホーム画面にリダイレクトする
        }
    }
    
     public function saveStep1(Request $request)
    {
        $reservepage = $request->session()->get('reservepage'); // セッションからreservepageの値を取得し、$reservepageに代入

        // 現在ログインしているユーザーを取得
        $user = Auth::user();
             
        $reservepage = new Reservepage(); // Reservepageモデルのインスタンスを新規作成
        if ($request->file('logo') !== null) { // 「ロゴマーク画像」が選択されている場合
            $image_logo = $request->file('logo')->store('public/reservepages'); // 選択されたlogoをpublic/storage/reservepagesに保存
            $reservepage->logo = basename($image_logo); // $image_logoからファイル名を取得し、$reservepageのlogoに代入
        } else { // logoが選択されていない場合
            $reservepage->logo = ''; // logoに空の文字列を代入（値を空に）
        }
        $reservepage->name = $request->input('name'); // 「予約タイトル」を取得し、$reservepageのnameへ代入
        $reservepage->description = $request->input('description'); // 「説明文」を取得し、$reservepageのdescriptionへ代入
             
        if ($request->file('image') !== null) { // 「イメージ画像」が選択されている場合
            $image = $request->file('image')->store('public/reservepages'); // 選択されたimageをpublic/storage/reservepagesに保存
            $reservepage->image = basename($image); // $imageからファイル名を取得し、$reservepageのimageに代入
        } else { // 「イメージ画像」が選択されていない場合
            $reservepage->image = ''; // imageに空の文字列を代入（値を空に）
        }
        
        // 予約受信メールアドレスについて
        $mailaddress = ''; // 空の文字列で初期化
        $inputforms = $request->input('inputform'); // $inputformsにinputformの値を代入
        foreach($inputforms as $inputform) { // 繰り返し処理
            if ($inputform != '') { // $inputformが空の文字列でない場合
                $mailaddress .= $inputform . ','; // $inputformで取得したメールアドレスの文字列を「,」で繋げて、$mailaddressに代入
            }
        }
        $reservepage->mailaddress = $mailaddress; // 「予約受信メールアドレス」を取得し、$reservepageのmailaddressへ代入
        $reservepage->price = $request->input('price'); // 「予約基本価格」を取得し、$reservepageのpriceへ代入
        $reservepage->date_change = $request->input('date_change'); // 「日付変更」を取得し、$reservepageのdate_changeへ代入
        $reservepage->cancel = $request->input('cancel'); // 「キャンセル」を取得し、$reservepageのcancelへ代入
        $reservepage->color = $request->input('color'); // 「予約カレンダーの色」を取得し、$reservepageのcolorへ代入
        $reservepage->release = $request->input('release'); // 「公開設定」を取得し、$reservepageのreleaseへ代入
        $reservepage->type_id = 1; // 「予約タイプ」を1にする（レッスン・イベントタイプ）
        $reservepage->user_id = $user->id; // ログインユーザーのIDと$reservepageのuser_idを紐付ける
             
        // バリデーション設定
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date_change' => 'required',
            'cancel' => 'required',
            'inputform' => [
                'required',
                function ($attribute, $value, $fail) {
                    // 少なくとも1つのメールアドレスが存在するか確認
                    $validEmails = array_filter($value, function ($email) {
                        return !empty($email);
                    });
        
                    if (empty($validEmails)) {
                        $fail('※必須項目です');
                    }
                },
            ],
        ]);
    
        $request->session()->put('reservepage', $reservepage); // セッションでreservepageキーで$reservepageの値をを保存
     
        return redirect()->route('reservepages.create_step2'); // データの処理が完了したら、予約ページ作成 2ページ目（日時・定員数）へリダイレクト
    }
    
    public function saveStep2(Request $request)
    {
        $reservepage = $request->session()->get('reservepage'); // セッションからreservepageの値を取得し、$reservepageに代入
        $calendar_list = $request->session()->get('calendar'); // セッションからcalendarの値を取得し、$calendar_listに代入
        $validation_calendar_flg = $request->session()->get('validation_calendar_flg'); // セッションからvalidation_calendar_flgを取得し、$validation_calendar_flgに代入
             
        if (is_null($calendar_list) || count($calendar_list) == 0) { // $calendar_listが空、または$calendar_listの要素数が0の場合
            $request->session()->put('validation_calendar_flg', true); // セッションでvalidation_calendar_flgにtrueを与える
            return redirect()->route('reservepages.create_step2'); // データの処理が完了したら、予約ページ作成 2ページ目（日時・定員数）へリダイレクト
        } else { 
            // $calendar_listが空ではない、または$calendar_listの要素数が0ではない場合
            if (!is_null($validation_calendar_flg)) { // $validation_calendar_flgが空ではない場合
                $request->session()->forget('validation_calendar_flg'); // セッションからvalidation_calendar_flgを削除
            }
                
            $request->session()->put('reservepage', $reservepage); // セッションでreservepageキーで$reservepageの値をを保存
        }
        
        return redirect()->route('reservepages.create_step3'); // データの処理が完了したら、予約ページ作成 3ページ目（完了）へリダイレクト
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservepage  $reservepage
     * @return \Illuminate\Http\Response
     */
    public function show(Reservepage $reservepage)
    {
        return view('reservepages.show', compact('reservepage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservepage  $reservepage
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservepage $reservepage)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        $price = $reservepage->price;
        
        return view('reservepages.edit', compact('reservepage', 'price', 'user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservepage  $reservepage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservepage $reservepage)
    {
        // バリデーション設定
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date_change' => 'required',
            'cancel' => 'required',
            'inputform' => [
                'required',
                function ($attribute, $value, $fail) {
                    // 少なくとも1つのメールアドレスが存在するか確認
                    $validEmails = array_filter($value, function ($email) {
                        return !empty($email);
                    });
        
                    if (empty($validEmails)) {
                        $fail('※必須項目です');
                    }
                },
            ],
        ]);
        
         // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // 画像の削除処理（イメージ画像）
        if ($request->has('remove_image')) { // remove_imageというフィールドが存在する場合
            Storage::delete('public/reservepages/'.$reservepage->image); // 指定されたパスのファイルを削除
            $reservepage->image = null; // imageを空にする
        }
        // 画像の削除処理（ロゴ画像）
        if ($request->has('remove_logo')) { // remove_logoというフィールドが存在する場合
            Storage::delete('public/reservepages/'.$reservepage->logo); // 指定されたパスのファイルを削除
            $reservepage->logo = null; // logoを空にする
        }
        
        // 予約受信メールアドレスについて
        $mailaddress = ''; // 空の文字列で初期化
        $inputforms = $request->input('inputform'); // $inputformsにinputformの値を代入
        foreach($inputforms as $inputform) { // 繰り返し処理
            if ($inputform != '') { // $inputformが空の文字列でない場合
                $mailaddress .= $inputform . ','; // $inputformで取得したメールアドレスの文字列を「,」で繋げて、$mailaddressに代入
            }
        }
        $reservepage->mailaddress = $mailaddress; // 「予約受信メールアドレス」を取得し、$reservepageのmailaddressへ代入
        
        // 各項目の更新処理
        $reservepage->name = $request->input('name'); // 「予約タイトル」を取得し、$reservepageのnameへ代入
        $reservepage->description = $request->input('description'); // 「説明文」を取得し、$reservepageのdescriptionへ代入
        $reservepage->price = $request->input('price'); // 「予約基本価格」を取得し、$reservepageのpriceへ代入
        $reservepage->date_change = $request->input('date_change'); // 「日付変更」を取得し、$reservepageのdate_changeへ代入
        $reservepage->cancel = $request->input('cancel'); // 「キャンセル」を取得し、$reservepageのcancelへ代入
        $reservepage->color = $request->input('color'); // 「予約カレンダーの色」を取得し、$reservepageのcolorへ代入
       
        // 有料会員から無料会員になった場合、非公開状態にする
        if ($user->member_flag == 0) { // 無料会員の場合（member_flagが0の場合）
            $reservepage->release = 1; // 非公開状態にする（releaseに1を与える）
        } else { // 有料会員の場合（member_flagが1の場合）
            $reservepage->release = $request->input('release'); // 「公開設定」を取得し、$reservepageのreleaseへ代入
        }
        // 「ロゴマーク画像」が選択されている場合
        if ($request->file('logo') !== null) {
            $image_logo = $request->file('logo')->store('public/reservepages'); // 選択されたlogoをpublic/storage/reservepagesに保存
            $reservepage->logo = basename($image_logo); // $image_logoからファイル名を取得し、$reservepageのlogoに代入
        }
    
        // 「イメージ画像」が選択されている場合
    if ($request->file('image') !== null) {
        $image = $request->file('image')->store('public/reservepages'); // 選択されたimageをpublic/storage/reservepagesに保存
        $reservepage->image = basename($image); // $imageからファイル名を取得し、$reservepageのimageに代入
    }


         $reservepage->update(); // $reservepageの内容を更新

         return redirect()->route('reservepages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservepage  $reservepage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservepage $reservepage)
    {
        $reservepage->delete();
 
         return redirect()->route('reservepages.index');
    }
    
    
    public function createCalendarSchedule(Request $request)
    {
        $request->validate([
            'date' => 'required', // requiredというルールを適用
            'start_time' => 'required',
            'end_time' => 'required',
            'capacity' => 'required',
            'repeat' => 'required',
            'delete_flg' => 'required',
        ]);

        $data = $request->all(); // 全てのデータを取得
        $reservepage = $request->session()->get('reservepage'); // セッションからreservepageの値を取得
        $count = $request->session()->get('count'); // セッションからcountの値を取得
        
        // バリデーション設定（$countの値が0だった場合は次ページへ行かない）
        if (is_null($count)) { // $countが空の場合（日程・定員数の設定がされてない場合）
            $count = 0; // $countの値は0
        }
        
        // カレンダーの編集（reservepage_idが空でない場合）
        if ($data['reservepage_id'] != "") { 
            $calendar_session = $request->session()->get('calendar'); // セッションからcalendarを取得
            $i = 0; // 値を0にし初期化
            $updateCalendar = new Calendar(); // Calendatオブジェクトを作成
            foreach ($calendar_session as $value) { // 繰り返し処理
                if ($value['reservepage_id'] == $data['reservepage_id']) { // $valueと$dataのreservepage_idが等しい場合
                    if ($data["delete_flg"] == "false") {
                        $updateCalendar->date = $data["date"]; // 日にちの値を取得
                        $updateCalendar->start_time = $data["start_time"]; // 開始時間の値を取得
                        $updateCalendar->end_time = $data["end_time"]; // 終了時間の値を取得
                        $updateCalendar->capacity = $data["capacity"]; // 定員数の値を取得
                        $updateCalendar->reservepage_id = $data["reservepage_id"]; // reservepage_idの値を取得
                        array_splice($calendar_session, $i, 1, null); // 配列の$iの1つの要素を削除しnullを挿入
                        array_push($calendar_session, $updateCalendar); // $updateCalendarを$calendar_sessionの末尾に追加
                    } else {
                        array_splice($calendar_session, $i, 1, null); // 配列の$iの1つの要素を削除しnullを挿入
                    }
                    break; // 繰り返し終了
                }
                $i++; // $iの値を1増加
            }
            $request->session()->put('calendar', $calendar_session); // $calendar_sessionの値をcalendarでセッションに保存
            
            // 戻り値を作成
            $calendar_array = []; // 配列を作成
            foreach ($calendar_session as $value) { // 繰り返し処理
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value->date . " " . $value->start_time; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value->date . " " . $value->end_time; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value->capacity; // capacityの値を取得
                $response_calendar["reservepage_id"] = $value->reservepage_id; // reservepage_idの値を取得
                $response_calendar["color"] =  $reservepage->color; // フルカレンダーのcolorにcolorの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
            }
            return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                    'data'=> $calendar_array // カレンダーデータがdataフィールドに格納
                    ]);
        } 
        // カレンダーの新規作成（reservepage_idが空の場合）
        else { 
            $calendar_session; // 変数を宣言
            // カレンダーの新規作成（毎週繰り返し）
            if ($data["repeat"] == "week-repeat") { // repeatがweek-repeatと等しい場合
                $flg = true;
                $finishDate = date('Y-m-d', strtotime($data["date"] . '+1 year')); // dateに1年を加えた日付を取得し代入
                $date = date('Y-m-d', strtotime($data["date"] . '-1 week')); // dateから1週間を引いた日付を取得し代入
                while ($flg) { // $flgがtrueの間は繰り返される
                    $calendar_session = $request->session()->get('calendar'); // セッションからcalendarデータを取得し代入
                    $calendar = new Calendar(); // Calendarクラスの新しいインスタンスを作成
                    $date = date('Y-m-d', strtotime($date . '+1 week')); // 1週間を加えた日付を取得し代入
                    if ((strtotime($finishDate) - strtotime($date)) > 0) { // $finishDateの日付が$dateの日付よりも未来の場合
                        $calendar->date = $date; // dateプロパティに$dateの値を設定
                        $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                        $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                        $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキーの値を設定
                        
                        $count += 1; // $countの値に1を追加
                
                        if(is_null($calendar_session)) { // $calendar_sessionがnullだった場合
                            $calendar_session = []; // 空の配列を代入（格納されていた値がクリアされ、空の状態になる）
                        } 
                        $calendar->reservepage_id = $data["date"] . $count; // reservepage_idに、$dateキーの値と$countを結合した値を設定
                        array_push($calendar_session,$calendar); // $calendar_sessionの配列の末尾に$calendarを追加
                        $request->session()->put('calendar', $calendar_session); // $calendar_sessionの値をcalendarでセッションに保存
                    } else { // $finishDateの日付が$dateの日付よりも過去の場合
                        $flg = false; //繰り返し終了
                    }
                }
            } 
            // カレンダーの新規作成（毎日繰り返し）
            else if ($data["repeat"] == "day-repeat") { // repeatがday-repeatと等しい場合
                $flg = true;
                $finishDate = date('Y-m-d', strtotime($data["date"] . '+1 year')); // dateに1年を加えた日付を取得し代入
                $date = date('Y-m-d', strtotime($data["date"] . '-1 day')); // dateから1日を引いた日付を取得し代入
                while ($flg) { // $flgがtrueの間は繰り返される
                    $calendar_session = $request->session()->get('calendar'); // セッションからcalendarデータを取得し代入
                    $calendar = new Calendar(); // Calendarクラスの新しいインスタンスを作成
                    $date = date('Y-m-d', strtotime($date . '+1 day')); // 1日を加えた日付を取得し代入
                    if ((strtotime($finishDate) - strtotime($date)) > 0) { // $finishDateの日付が$dateの日付よりも未来の場合
                        $calendar->date = $date; // dateプロパティに$dateの値を設定
                        $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                        $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                        $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキーの値を設定
                
                        $count += 1; // $countの値に1を追加
                        
                        if(is_null($calendar_session)) { // $calendar_sessionがnullだった場合
                            $calendar_session = []; // 空の配列を代入（格納されていた値がクリアされ、空の状態になる）
                        } 
                        $calendar->reservepage_id = $data["date"] . $count; // reservepage_idに、$dateキーの値と$countを結合した値を設定
                        array_push($calendar_session,$calendar); // $calendar_sessionの配列の末尾に$calendarを追加
                        $request->session()->put('calendar', $calendar_session); // $calendar_sessionの値をcalendarでセッションに保存
                    } else { // $finishDateの日付が$dateの日付よりも過去の場合
                        $flg = false; //繰り返し終了
                    }
                }
            } 
            // カレンダーの新規作成（繰り返さない）
            else {
                $calendar_session = $request->session()->get('calendar'); // セッションからcalendarを取得
                $calendar = new Calendar(); // Calendarオブジェクトを作成
                $calendar->date = $data["date"]; // 日にちの値を取得
                $calendar->start_time = $data["start_time"]; // 開始時間の値を取得
                $calendar->end_time = $data["end_time"]; // 終了時間の値を取得
                $calendar->capacity = $data["capacity"]; // 定員数の値を取得
                
                $count += 1; // $countの値に1を追加
                
               if(is_null($calendar_session)) { // $calendar_sessionがnullだった場合
                    $calendar_session = []; // 空の配列を代入（格納されていた値がクリアされ、空の状態になる）
                } 
                $calendar->reservepage_id = $data["date"] . $count; // reservepage_idに、$dateキーの値と$countを結合した値を設定
                array_push($calendar_session,$calendar); // $calendar_sessionの末尾に$calendarを追加
                $request->session()->put('calendar', $calendar_session); // $calendar_sessionの値をcalendarでセッションに保存
            }
            // 戻り値を作成
            $calendar_array = []; // 配列を作成
            foreach ($calendar_session as $value) { // 繰り返し処理
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value->date . " " . $value->start_time; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value->date . " " . $value->end_time; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value->capacity; // capacityの値を取得
                $response_calendar["reservepage_id"] = $value->reservepage_id; // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage->color; // フルカレンダーのcolorにcolorの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
            }
            $request->session()->put('count', $count); // $countの値をcalendarでセッションに保存
            return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                    'data'=> $calendar_array // カレンダーデータがdataフィールドに格納
                    ]);
               
        }
    }
    
    public function dropCalendarSchedule(Request $request)
    {
        // カレンダーを全て削除
        $request->session()->forget('calendar');
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
        'data'=> []]);
    }
    
    public function edit_dropCalendarSchedule(Request $request)
    {
        // rservepage_idの値を取得し、$reservepage_idに代入
        $reservepage_id = $request->input('reservepage_id');
        
        // reservepage_idと一致するデータをCalendarから取得し、$calendarsに格納
        $calendars = Calendar::where('reservepage_id', $reservepage_id)->get(); 
        
        // カレンダーを全て削除
        foreach ($calendars as $value) { // 繰り返し一つずつ削除される
            $value->delete(); // $valueをデータベースから削除
        }
        
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
        'data'=> [$calendars]]); // $calendarsを含む連想配列を指定
    }

    
    public function editCalendarSchedule(Request $request) {
        
        $reservepage_id = $request->input('reservepage_id');
        $calendars = Calendar::select('date', 'start_time', 'end_time', 'id', 'capacity') //Calendarモデルから、calendarsテーブルの予約開始時間、予約終了時間、id、予約可能人数を取得
          ->where('reservepage_id' , '=', $reservepage_id)
          ->get()->toArray();
          
        $reservepage = Reservepage::find($reservepage_id);
        $calendar_array = []; // 配列を作成
        foreach ($calendars as $value) { // 繰り返し処理
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value["date"] . " " . $value["start_time"]; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value["date"] . " " . $value["end_time"]; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value["capacity"]; // capacityの値を取得
                $response_calendar["calendar_id"] = (string)$value["id"];  // カレンダーのIDとcalendar_idを紐付けて取得
                $response_calendar["reservepage_id"] = $reservepage_id;  // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage["color"]; // フルカレンダーのcolorにcolorの値を取得
                $response_calendar["title"] = $reservepage["name"]; // フルカレンダーのtitleにnameの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
        }
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                'data'=> $calendar_array // カレンダーデータがdataフィールドに格納
                ]);
       
    }
    
    
    public function edit_datetime(Request $request, Reservepage $reservepage)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        $validation_calendar_flg = $request->session()->get('validation_calendar_flg'); // セッションからvalidation_calendar_flgを取得    
        if (is_null($validation_calendar_flg)) { // validation_calendar_flgが空の場合
             $validation_calendar_flg = false;
        }
        $reservepage_id = $reservepage->id; // $reservepageからidを取得し、$reservepage_idに代入

        return view('reservepages.edit_datetime', compact('reservepage_id', 'user', 'validation_calendar_flg'));
    }
    
     public function update_datetime(Request $request, Reservepage $reservepage)
    {
        $data = $request->all(); // 全てのデータを取得して$dataへ代入
        $delete_flg = $data["delete_flg"]; // $dataからdelete_flgを取得し$delete_flgに代入
        $id = $request->input('id'); // idの値を取得し、$idに代入
        $reservepage_id = $request->input('reservepage_id'); // rservepage_idの値を取得し、$reservepage_idに代入
        $repeat = $data["repeat"]; // $dataからrepeatを取得し、$repeatに代入
        
        if ($id != "") { // $idが空でない時（既存のカレンダーを編集）
            $calendar = Calendar::find($id); // $idを使用してCalendarクラスの新しいインスタンスを作成
            if ($delete_flg == "false") { // falseの場合、登録して保存
                    $date = date('Y-m-d', strtotime($data["date"])); // 日付データを取得して$dateに格納
                    $calendar->date = $date; // dateプロパティに$dateの値を設定
                    $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                    $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                    $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキ��の値を設定
                    $calendar->reservepage_id = $reservepage_id; // $calendarの$reservepage_idプロパティを設定し値を取得
                    $calendar->save(); // $calendarをデータベースに保存
            } else { //  trueの場合、削除
                $calendar->delete(); // $calendarをデータベースから削除
            }
        } else { // $idが空の時（カレンダーを新規作成）
             // カレンダーの新規作成（毎週繰り返し）
             if ($repeat == "week-repeat") { // repeatがweek-repeatと等しい場合
                $flg = true;
                $finishDate = date('Y-m-d', strtotime($data["date"] . '+1 year')); // dateに1年を加えた日付を取得し代入
                $date = date('Y-m-d', strtotime($data["date"] . '-1 week')); // dateから1週間を引いた日付を取得し代入
                while ($flg) { // $flgがtrueの間は繰り返される
                    $calendar = new Calendar(); // Calendarクラスの新しいインスタンスを作成
                    $date = date('Y-m-d', strtotime($date . '+1 week')); // 1週間を加えた日付を取得し代入
                    if ((strtotime($finishDate) - strtotime($date)) > 0) { // $finishDateの日付が$dateの日付よりも未来の場合
                        $calendar->date = $date; // dateプロパティに$dateの値を設定
                        $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                        $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                        $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキーの値を設定
                        $calendar->reservepage_id = $reservepage_id; // $calendarの$reservepage_idプロパティを設定し値を取得
                        $calendar->save(); // $calendarをデータベースに保存
                    } else { // $finishDateの日付が$dateの日付よりも過去の場合
                        $flg = false; //繰り返し終了
                    }
                }
            } 
            // カレンダーの新規作成（毎日繰り返し）
            else if ($data["repeat"] == "day-repeat") { // repeatがday-repeatと等しい場合
                $flg = true;
                $finishDate = date('Y-m-d', strtotime($data["date"] . '+1 year')); // dateに1年を加えた日付を取得し代入
                $date = date('Y-m-d', strtotime($data["date"] . '-1 day')); // dateから1日を引いた日付を取得し代入
                while ($flg) { // $flgがtrueの間は繰り返される
                    $calendar = new Calendar(); // Calendarクラスの新しいインスタンスを作成
                    $date = date('Y-m-d', strtotime($date . '+1 day')); // 1日を加えた日付を取得し代入
                    if ((strtotime($finishDate) - strtotime($date)) > 0) { // $finishDateの日付が$dateの日付よりも未来の場合
                        $calendar->date = $date; // dateプロパティに$dateの値を設定
                        $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                        $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                        $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキーの値を設定
                        $calendar->reservepage_id = $reservepage_id; // $calendarの$reservepage_idプロパティを設定し値を取得
                        $calendar->save(); // $calendarをデータベースに保存
                    } else { // $finishDateの日付が$dateの日付よりも過去の場合
                        $flg = false; //繰り返し終了
                    }
                }
            } 
            // カレンダーの新規作成（繰り返さない）
            else {
                $calendar = new Calendar();
                $date = date('Y-m-d', strtotime($data["date"])); // 日付データを取得して$dateに格納
                $calendar->date = $date; // dateプロパティに$dateの値を設定
                $calendar->start_time = $data["start_time"]; // start_timeプロパティに$dateのstart_timeキーの値を設定
                $calendar->end_time = $data["end_time"]; // end_timeプロパティに$dateのend_timeキーの値を設定
                $calendar->capacity = $data["capacity"]; // capacityプロパティに$dateのcapacityキ��の値を設定
                $calendar->reservepage_id = $reservepage_id; // $calendarの$reservepage_idプロパティを設定し値を取得
                $calendar->save(); // $calendarをデータベースに保存
            }
        }
        
        $calendars = Calendar::select('date', 'start_time', 'end_time', 'id', 'capacity') //Calendarモデルから、calendarsテーブルの予約開始時間、予約終了時間、id、予約可能人数を取得
          ->where('reservepage_id' , '=', $reservepage_id) // reservepage_idカラムが指定された、$reservepage_idの値と等しいレコードをデータベースから取得
          ->get()->toArray(); // 連想配列として値を取得
          
        $reservepage = Reservepage::find($reservepage_id); // $reservepage_idによる予約ページをデータベースから取得し、$reservepageに代入
        $calendar_array = []; // 配列を作成
        foreach ($calendars as $value) { // 繰り返し処理（$valueを使用して、各カレンダー情報にアクセス）
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value["date"] . " " . $value["start_time"]; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value["date"] . " " . $value["end_time"]; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value["capacity"]; // capacityの値を取得
                $response_calendar["calendar_id"] = $value["id"];  // カレンダーのIDとcalendar_idを紐付けて取得
                $response_calendar["reservepage_id"] = $reservepage_id;  // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage["color"]; // フルカレンダーのcolorにcolorの値を取得
                $response_calendar["title"] = $reservepage["name"]; // フルカレンダーのtitleにnameの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
        }
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                'data'=> $calendar_array // カレンダーデータがdataフィールドに格納
                ]);
    }
    
    


}
