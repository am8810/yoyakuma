<?php

namespace App\Http\Controllers;

use App\User;
use App\Reservepage;
use App\Calendar;
use App\Doreserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\ContactDoreserveSendmail;
use App\Mail\AdminDoreserveSendmail;

class DoreserveController extends Controller
{
    
     public function index($page_address)
     {
        // 1.$page_addressを元にusersテーブルからデータを取得する
        $user = User::where('page_address', '=', $page_address)->first();
        
        if ($user != null) {
            // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
            $reservepages = Reservepage::where('user_id', '=', $user->id)->where('release', 0)->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            // $reservepagesに空のコレクションを作成
            $reservepages = collect();
        }

        // データをblade.phpに渡してあげる
        return view('reserve.index', compact('reservepages', 'page_address', 'user'));
     }
     
     
     public function show($page_address, $reservepage_id)
     {
         // 1.$page_addressを元にusersテーブルからデータを取得する
         $user = User::where('page_address', '=', $page_address)->first();
         
         // 現在ログインしているユーザーを取得
         $user_auth = Auth::user();
         
         if ($user_auth != null && $user != null && $user_auth->id === $user->id) {
         // $user_authと$userが持つidが等しい場合のみ、releaseの値関係なく表示させる
            $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('id', '=', $reservepage_id)->first();
         } else if ($user != null) {
         // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
            $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('release', 0)->where('id', '=', $reservepage_id)->first();
         } else {
         // $reservepageにnullの値を渡し、非公開状態の表示にする
            $reservepage = null;
         }
         
         // Calendarモデルからreservepage_idに関連するcapacityの値を配列として取得 
         $calendars = Calendar::select('capacity')->where('reservepage_id' , '=', $reservepage_id)->get()->toArray();

        // $calendars配列のcapacityの値の合計が0だった場合予約ができない
        if (array_sum(array_column($calendars, 'capacity')) === 0) {
            $can_reserve_flg = false;
        } else {
            $can_reserve_flg = true;
        }

         // データをblade.phpに渡してあげる
         return view('reserve.show', compact('reservepage', 'page_address', 'user', 'can_reserve_flg'));
     }
     
     
     public function date_time(Request $request, $page_address, $reservepage_id)
     {
         // 1.$page_addressを元にusersテーブルからデータを取得する
         $user = User::where('page_address', '=', $page_address)->first();
         
         // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
        $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('id', '=', $reservepage_id)->first();
        
        // 予約ページ作成で設定した日程・定員数（date）を、reservepage_idごとに取得（capacityが0でないもののみ取得）
        $calendars = Calendar::select('date')
        ->where('reservepage_id', '=', $reservepage_id)
        ->where('capacity', '>', 0)
        ->get()
        ->toArray();
        
        // 日付の為の配列を作成し、年月日をそれぞれ文字ではなく日付の形にして配列に入れている
        $calendar_array = [true];
        foreach ($calendars as $calendar) { // 繰り返し処理
            $array = [];
            array_push($array, date('Y', strtotime(array_values($calendar)[0])));
            array_push($array, date('m', strtotime(array_values($calendar)[0])) - 1);
            array_push($array, date('d', strtotime(array_values($calendar)[0])));
            array_push($calendar_array, $array);
        }

         // データをblade.phpに渡してあげる
        return view('reserve.date_time', compact('reservepage', 'user', 'calendars', 'page_address', 'calendar_array'));
     }
     
     
      public function customer(Request $request, $page_address, $reservepage_id) {
          
         // Doreserveという箱を新しく作り（インスタンス化）、その中に要素を入れていく
         $do_reserve = new Doreserve();
         // reservepage_idプロパティに$reservepage_idの値を代入
         $do_reserve->reservepage_id = $reservepage_id;
         // do_capacityプロパティにdo_capacityの値を代入
         $do_reserve->do_capacity = $request->input('do_capacity');
         // do_dateプロパティにdo_dateの値を代入
         $do_reserve->do_date = $request->input('do_date');

         // calendar_idプロパティにcalendar_idの'_'以降は削除した値を取得
         $do_reserve->calendar_id = substr($request->input('calendar_id'), 0, mb_strpos($request->input('calendar_id'), '_'));
         
         $do_reserve_list = $request->session()->get('do_reserve_list'); // セッションでdo_reserve_listを取得し、$do_reserve_listに代入
         if (is_null($do_reserve_list) || count($do_reserve_list) == 0) { // $do_reserve_listが空か0だった場合
            $do_reserve_list = array(); // $do_reserve_listに空の配列を代入
         }
         array_push($do_reserve_list, $do_reserve); // $do_reserveを$do_reserve_listの末尾に追加
         
         
         // $do_reserve_listの値を、セッション内のdo_reserve_listに保存
         $request->session()->put('do_reserve_list', $do_reserve_list);
         
         // 1.$page_addressを元にusersテーブルからデータを取得する
         $user = User::where('page_address', '=', $page_address)->first();
         
         // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
         $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('id', '=', $reservepage_id)->first();

         // Calendarモデルからreservepage_idに紐づくカレンダーのcapacityの値を配列として取得
         $calendars = Calendar::select('capacity')->where('reservepage_id' , '=', $reservepage_id)->get()->toArray();

         // データをblade.phpに渡してあげる
         return view('reserve.customer', compact('reservepage', 'user', 'calendars', 'page_address', 'do_reserve'));
     }
     
     
      public function confirmation(Request $request, $page_address, $reservepage_id) {
          
        $do_reserve; // 変数を定義
        $do_reserve_list = $request->session()->get('do_reserve_list'); // セッションでdo_reserve_listを取得し、$do_reserve_listに代入
        foreach ($do_reserve_list as $data) { // $do_reserve_list配列内の要素を順に処理し、各要素を$dataという変数に代入
            if ($data->reservepage_id == $reservepage_id ) { // $dataのreservepage_idが、$reservepage_idと等しい場合
                $data->customer_name = $request->input('customer_name'); // お客様情報のお名前の値を代入
                $data->customer_furigana = $request->input('customer_furigana'); // お客様情報のフリガナの値を代入
                $data->customer_email = $request->input('customer_email'); // お客様情報のメールアドレスの値を代入
                $data->customer_phone = $request->input('customer_phone'); // お客様情報の電話番号の値を代入
                $do_reserve = $data; // $dataのデータを$do_reserveに代入
            }
        }
        
        // $do_reserve_listの値を、セッション内のdo_reserve_listに保存
        $request->session()->put('do_reserve_list', $do_reserve_list);

        // 1.$page_addressを元にusersテーブルからデータを取得する
        $user = User::where('page_address', '=', $page_address)->first();
         
        // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
        $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('id', '=', $reservepage_id)->first();

        // Calendarモデルから指定されたcalendar_idのカレンダーを取得
        $calendar = Calendar::find($do_reserve-> calendar_id);
        
        // fail_save_flgの値をセッションに取得
        $fail_save_flg = $request->session()->get('fail_save_flg'); 
        
        // $fail_save_flgが空だった場合
        if ($fail_save_flg == null) {
            $fail_save_flg = false; // $fail_save_flgをfalseにする（デフォルト値としてfalseを設定）   
        }
        
        $request->session()->forget('fail_save_flg'); // セッションで取得したfail_save_flgの値を無くす

        // データをblade.phpに渡してあげる
        return view('reserve.confirmation', compact('reservepage', 'user', 'calendar', 'page_address', 'do_reserve', 'fail_save_flg'));
     }


     public function completion(Request $request, $page_address, $reservepage_id) {
         
        $do_reserve = null; // 変数を初期化
        $do_reserve_list = $request->session()->get('do_reserve_list', []); // セッションからdo_reserve_listを取得し、空の場合は空の配列をデフォルト値として使用
    
        foreach ($do_reserve_list as $data) { // $do_reserve_list配列内の要素を順に処理し、各要素を$dataという変数に代入
            if ($data->reservepage_id == $reservepage_id) { // $dataのreservepage_idが、$reservepage_idと等しい場合
                $do_reserve = $data; // $dataのデータを$do_reserveに代入
                break; // 繰り返し終了
            }
        }

        if (!$do_reserve) {
            // $do_reserveが見つからない場合、エラー処理やリダイレクトなど適切な対応を行う
            return redirect('/reserve/' . $page_address . '/' . $reservepage_id);
        }
        
        // Calendarモデルから指定されたcalendar_idのカレンダーを取得
        $calendar = Calendar::find($do_reserve->calendar_id);
        
        // 予約定員を超えている（capacity（予約可能人数）よりdo_capacity（予約人数）が大きい場合）
        if ($calendar->capacity < $do_reserve->do_capacity) {
            
            $fail_save_flg = true; // $fail_save_flgをtrueにする
            
            // fail_save_flgの値をセッションで保存
            $request->session()->put('fail_save_flg', $fail_save_flg);
            
            // カスタマー情報を$do_reserveから取得し、mergeメソッドで上書きする
            $request->merge(['customer_name' => $do_reserve->customer_name]);
            $request->merge(['customer_furigana' => $do_reserve->customer_furigana]);
            $request->merge(['customer_email' => $do_reserve->customer_email]);
            $request->merge(['customer_phone' => $do_reserve->customer_phone]);

            // confirmationアクションの情報を$confirmationに与える；
            $confirmation = $this->confirmation($request, $page_address, $reservepage_id);
            return $confirmation; // リターンで$confirmationへ戻る（confirmationアクションに戻る）
        }

        // 通常の予約完了（capacity（予約可能人数）よりdo_capacity（予約人数）が小さい場合）
        $do_reserve->save(); // $do_reserveをデータベースに保存
        $calendar->capacity -= $do_reserve->do_capacity; // capacity（予約可能人数）からdo_capacity（予約人数）が引かれた数をカウント
        $calendar->save(); // $calendarをデータベースに保存
        
        foreach($do_reserve_list as $i => $data) { // $do_reserve_list配列内の各要素のインデックスを$iに、各値を$dataに代入
            if ($data->reservepage_id == $reservepage_id ) { // $dataのreservepage_idが、$reservepage_idと等しい場合
                unset($do_reserve_list[$i]); // $do_reserve_listの$iのインデックスを削除
                break; // 繰り返し終了
            }
        }
        
        // $do_reserve_listの値を、セッション内のdo_reserve_listに保存
        $request->session()->put('do_reserve_list', $do_reserve_list);
        
        // 1.$page_addressを元にusersテーブルからデータを取得する
        $user = User::where('page_address', '=', $page_address)->first();
         
        // 2.1で取得したuser_id, $reserve_idを元にreservepagesテーブルからデータを取得する
        $reservepage = Reservepage::where('user_id' , '=', $user->id)->where('id', '=', $reservepage_id)->first();
        
        //予約者に「予約完了のお知らせ」メールを送信
        if ($do_reserve->customer_email != null && $do_reserve->customer_email != '') { // メールアドレスが空、もしくは空文字列でない場合
            \Mail::to($do_reserve->customer_email)->send(new ContactDoreserveSendmail($reservepage, $do_reserve, $calendar, $user)); // 予約者のメールアドレスが格納されている場合、メール送信する
        }
        
        //管理者に「予約が入りました」メールを送信
        $mailaddresses = explode(',', $reservepage->mailaddress); // explode関数により、カンマで区切られたメールアドレスを分割する
        for ($i=0; $i < count($mailaddresses) - 1; $i++) { // カウンタ変数iが$mailaddresses配列の要素より小さい場合実行。ループの各反復後に$iを1ずつ増加（一番後ろのカンマもあり空の配列が1つ取れてしまうので-1する）
            \Mail::to($mailaddresses[$i])->send(new AdminDoreserveSendmail($reservepage, $do_reserve, $calendar, $user));
        }
        // データをblade.phpに渡してあげる
        return view('reserve.completion', compact('reservepage', 'user', 'page_address'));
     }
     
     
    public function createTime(Request $request)
    {
        $data = $request->all(); //リクエストのすべてのデータを取得し、$data変数に代入
        
        $date = $data["date"]; //$data["date"]から予約ページの日にちを取得
        $date = str_replace('年', '-', $date); // "年"を"-"に置換する
        $date = str_replace('月', '-', $date); // "月"を"-"に置換する
        $date = str_replace('日', '', $date); // "日"を空文字に置換する
        $reservepage_id = $data["reservepage_id"]; //$data["reservepage_id"]から予約ページのIDを取得
        
        $calendars = Calendar::select('start_time', 'end_time', 'id', 'capacity') //Calendarモデルから、calendarsテーブルの予約開始時間、予約終了時間、id、予約可能人数を取得
          ->where('reservepage_id' , '=', $reservepage_id)->where('date' , '=', $date) //reservepage_idと日にちが一致するものを指定
          ->orderBy('start_time', 'ASC') //予約開始時間が早いものから表示
          ->get()->toArray(); //getメソッドを呼び出してクエリを実行し、toArrayメソッドを使って結果を配列形式に変換
        
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
            'data'=> $calendars
        ]);
    }
    
    public function terms_reserve()
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        //「利用規約（予約ページ）」のviewを表示
        return view('reserve.terms', compact('user'));
    }
    
    public function privacy_reserve()
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        //「利用規約（予約ページ）」のviewを表示
        return view('reserve.privacy', compact('user'));
    }

}
