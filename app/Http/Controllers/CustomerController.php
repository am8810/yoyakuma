<?php

namespace App\Http\Controllers;
use App\Doreserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     public function customerlist(Request $request)
     {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        
        // 検索フォームで入力された値を取得する
        $search = $request->input('keyword');
        
        // $pastの値が>=なので過去の顧客が表示される
        $past = '>=';
        
        // $past_flgでindex.blade.phpのname="past_flg"の値にfalseを返す
        $past_flg = $request->input('past_flg', false);
        
        // $past_flgでfalseになった場合、$pastの値が<になるので現在以降の顧客が表示される
        if ($past_flg) { 
            $past = '<';
        }
    

        if ($search != '') { // 検索フォームが空でない場合
        // Doreserveモデルに紐づくreservepageテーブルの値を取得し、$user、$search、$pastの条件に基づいて絞り込む
            $doreserves = Doreserve::whereHas('reservepage', function ($query) use($user, $search, $past) { 
                 $query->where('user_id', $user->id) // ログインしているユーザーIDとuser_idが紐づくデータを取得
                       ->where('do_date', $past ,date('Y年m月d日')) // do_dateが現在の日付より前か後かを$pastで判断
                       ->where(function ($query2) use($user, $search) { // $query2の条件をグループ化して検索
                         $query2->where('customer_name', 'LIKE', '%'.$search.'%') // お名前を部分一致で検索
                            ->orwhere('customer_furigana', 'LIKE', '%'.$search.'%') // お名前（フリガナ）を部分一致で検索
                            ->orwhere('customer_email', 'LIKE', '%'.$search.'%') // メールアドレスを部分一致で検索
                            ->orwhere('customer_phone', 'LIKE', '%'.$search.'%') // 電話番号を部分一致で検索
                            ->orwhere('do_date', 'LIKE', '%'.$search.'%') // 予約予定日を部分一致で検索
                            ->orwhere('name', 'LIKE', '%'.$search.'%'); // 予約対象を部分一致で検索
                 });
            })
            ->with('calendar') // Doreserveモデルに関連するcalendarリレーションをロード
            ->orderBy('do_date', 'desc') // 日付が最近もの順に表示
            ->paginate(15); // 15件ずつ表示
    } else { // 検索フォームが空の場合
            $doreserves = Doreserve::whereHas('reservepage', function ($query) use($user, $past) {
                 $query->where('user_id', $user->id)
                       ->where('do_date', $past ,date('Y年m月d日'));
            })
            ->with('calendar')
            ->orderBy('do_date', 'desc')
            ->paginate(15);
    }
        
        return view('customerlist.index', compact('doreserves', 'search', 'past_flg', 'user'));
     }
}
