<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservepage;
use App\Calendar;
use App\Doreserve;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('home', compact('user'));
    }
    
    public function getHomeCalendar(Request $request) {
        
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        $reservepages = Reservepage::select('id', 'name', 'color', 'price') // Reservepageモデルからid、name、color、priceを取得し、$reservepagesへ格納
          ->where('user_id' , '=', $user->id) // user_idが$user->idと等しいものを選択
          ->get()->toArray(); // 配列として取得
        
        $calendar_array = []; // 配列を作成
        foreach ($reservepages as $reservepage) { // 繰り返し処理
            $calendars = Calendar::whereIn('id', Doreserve::select('calendar_id') // Calendarモデルから、Doreserveモデルのcalendar_idと一致するものを取得
                ->where('reservepage_id', $reservepage["id"]) // Doreserveモデルから$reservepageのidと一致するreservepage_idを選択
            )->get()->toArray(); // 配列として取得
            foreach ($calendars as $value) { // 繰り返し処理
                $doreserves = Doreserve::select('id', 'customer_name', 'customer_furigana', 'do_capacity') // Doreserveモデルからid、customer_name、customer_furigana、do_capacityを取得し、$doreservesへ格納
                  ->where('calendar_id' , '=', $value["id"]) // Doreserveモデルからcalendar_idが$value["id"]と等しいものを選択
                  ->get()->toArray(); // 配列として取得
                
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value["date"] . " " . $value["start_time"]; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value["date"] . " " . $value["end_time"]; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value["capacity"]; // capacityの値を取得
                $response_calendar["title"] = $reservepage["name"]; // フルカレンダーのtitleにnameの値を取得
                $response_calendar["calendar_id"] = (string)$value["id"];  // カレンダーのIDとcalendar_idを紐付けて取得
                $response_calendar["reservepage_id"] = $reservepage["id"];  // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage["color"]; // フルカレンダーのcolorにcolorの値を取得
                $response_calendar["price"] = $reservepage["price"]; // priceの値を取得
                
                $response_calendar["doreserves"] = $doreserves; // $doreservesの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
            }
        }
        
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                'data'=> $calendar_array // 変数calendar_array（カレンダーデータ）をdataキーに格納
                ]);
       
    }
    
    public function deleteDoreserve(Request $request) {
        
        $data = $request->all(); // 全てのデータを取得して$dataへ代入
        $id = $request->input('doreserveId'); // doreserveIdの値を取得し、$idに代入
        $doreserve = Doreserve::find($id); // $idを使用してDoreserveクラスの新しいインスタンスを作成
        $calendar = Calendar::find($doreserve->calendar_id); // $doreserveのcalendar_idを使用してCalendarクラスの新しいインスタンスを作成
        $calendar->capacity += $doreserve->do_capacity; // $calendarのcapacityに$doreserveのdo_capacityを加算
        $calendar->save(); // $calendarをデータベースに保存
        $doreserve->delete(); // $$doreserveをデータベースから削除
        
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        $reservepages = Reservepage::select('id', 'name', 'color', 'price') // Reservepageモデルからid、name、color、priceを取得し、$reservepagesへ格納
          ->where('user_id' , '=', $user->id) // user_idが$user->idと等しいものを選択
          ->get()->toArray(); // 配列として取得
        
        $calendar_array = []; // 配列を作成
        foreach ($reservepages as $reservepage) { // 繰り返し処理
            $calendars = Calendar::whereIn('id', Doreserve::select('calendar_id') // Calendarモデルから、Doreserveモデルのcalendar_idと一致するものを取得
                ->where('reservepage_id', $reservepage["id"]) // Doreserveモデルから$reservepageのidと一致するreservepage_idを選択
            )->get()->toArray(); // 配列として取得
            foreach ($calendars as $value) { // 繰り返し処理
                $doreserves = Doreserve::select('id', 'customer_name', 'customer_furigana', 'do_capacity') // Doreserveモデルからid、customer_name、customer_furigana、do_capacityを取得し、$doreservesへ格納
                  ->where('calendar_id' , '=', $value["id"]) // Doreserveモデルからcalendar_idが$value["id"]と等しいものを選択
                  ->get()->toArray(); // 配列として取得
                
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value["date"] . " " . $value["start_time"]; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value["date"] . " " . $value["end_time"]; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value["capacity"]; // capacityの値を取得
                $response_calendar["title"] = $reservepage["name"]; // フルカレンダーのtitleにnameの値を取得
                $response_calendar["calendar_id"] = (string)$value["id"];  // カレンダーのIDとcalendar_idを紐付けて取得
                $response_calendar["reservepage_id"] = $reservepage["id"];  // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage["color"]; // フルカレンダーのcolorにcolorの値を取得
                $response_calendar["price"] = $reservepage["price"]; // priceの値を取得
                
                $response_calendar["doreserves"] = $doreserves; // $doreservesの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
            }
        }
        
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                'data'=> $calendar_array // 変数calendar_array（カレンダーデータ）をdataキーに格納
                ]);
       
    }
    
    
    public function changeDoreserve(Request $request) {
        
        $data = $request->all(); // 全てのデータを取得して$dataへ代入
        $id = $request->input('doreserveId'); // doreserveIdの値を取得し、$idに代入
        $selectCapacity = $request->input('selectCapacity'); // selectCapacityの値を取得し、$selectCapacityに代入
        $doreserve = Doreserve::find($id); // $idを使用してDoreserveクラスの新しいインスタンスを作成
        
        $calendar = Calendar::find($doreserve->calendar_id); // $doreserveのcalendar_idを使用してCalendarクラスの新しいインスタンスを作成
        $successFlg = true; // 変数successFlgにtrueを代入
        
        if ($doreserve->do_capacity == $selectCapacity) { // 現状の予約人数と予約変更人数が等しい場合
            // 何もしなくてOK
        } else if (($calendar->capacity + $doreserve->do_capacity) < $selectCapacity) { // 残りの予約可能人数より、予約変更人数が大きい場合
            $successFlg = false; // 変数successFlgにfalseを代入
        } else if ($selectCapacity === null) { // 予約変更人数（$selectCapacity）を「選択してください」を選択した場合
            $successFlg = false; // 変数successFlgにfalseを代入
        } else { // 残りの予約可能人数より、予約変更人数が小さい場合
            $calendar->capacity += ($doreserve->do_capacity - $selectCapacity); // 現状の予約人数（do_capacity）から予約変更人数（$selectCapacity）を引いた数を、予約可能人数（capacity）に足している
            $calendar->save(); // $calendarをデータベースに保存
            $doreserve->do_capacity = $selectCapacity; // do_capacityに変数selectCapacityの値を代入
            $doreserve->save(); // $$doreserveをデータベースから更新
        }
        
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        $reservepages = Reservepage::select('id', 'name', 'color', 'price') // Reservepageモデルからid、name、color、priceを取得し、$reservepagesへ格納
          ->where('user_id' , '=', $user->id) // user_idが$user->idと等しいものを選択
          ->get()->toArray(); // 配列として取得
        
        $calendar_array = []; // 配列を作成
        foreach ($reservepages as $reservepage) { // 繰り返し処理
            $calendars = Calendar::whereIn('id', Doreserve::select('calendar_id') // Calendarモデルから、Doreserveモデルのcalendar_idと一致するものを取得
                ->where('reservepage_id', $reservepage["id"]) // Doreserveモデルから$reservepageのidと一致するreservepage_idを選択
            )->get()->toArray(); // 配列として取得
            foreach ($calendars as $value) { // 繰り返し処理
                $doreserves = Doreserve::select('id', 'customer_name', 'customer_furigana', 'do_capacity') // Doreserveモデルからid、customer_name、customer_furigana、do_capacityを取得し、$doreservesへ格納
                  ->where('calendar_id' , '=', $value["id"]) // Doreserveモデルからcalendar_idが$value["id"]と等しいものを選択
                  ->get()->toArray(); // 配列として取得
                
                $response_calendar = array(); // 配列を作成
                $response_calendar["start"] = $value["date"] . " " . $value["start_time"]; // フルカレンダーのstartにstart_timeの値を取得
                $response_calendar["end"] = $value["date"] . " " . $value["end_time"]; // フルカレンダーのendにend_timeの値を取得
                $response_calendar["capacity"] = $value["capacity"]; // capacityの値を取得
                $response_calendar["title"] = $reservepage["name"]; // フルカレンダーのtitleにnameの値を取得
                $response_calendar["calendar_id"] = (string)$value["id"];  // カレンダーのIDとcalendar_idを紐付けて取得
                $response_calendar["reservepage_id"] = $reservepage["id"];  // reservepage_idの値を取得
                $response_calendar["color"] = $reservepage["color"]; // フルカレンダーのcolorにcolorの値を取得
                $response_calendar["price"] = $reservepage["price"]; // priceの値を取得
                
                $response_calendar["doreserves"] = $doreserves; // $doreservesの値を取得
                array_push($calendar_array, $response_calendar); // $response_calendarを$calendar_arrayの末尾に追加
            }
        }
        
        return response()->json([ //responseヘルパー関数を使って、取得したカレンダーデータをJSON形式でレスポンスとして返す
                'data'=> $calendar_array, // 変数calendar_array（カレンダーデータ）をdataキーに格納
                'successFlg'=>$successFlg // 変数successFlgをsuccessFlgキーに格納
                ]);

    }
}
