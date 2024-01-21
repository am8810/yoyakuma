<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Reservepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     public function index(Request $request)
      {
          if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            if (is_int($request->keyword)) {
                $keyword = (string)$keyword;
            }
            $users = User::where('name', 'like', "%{$keyword}%")
                            ->orwhere('email', 'like', "%{$keyword}%")
                            ->orwhere('store_name', 'like', "%{$keyword}%")
                            ->orwhere('postal_code', 'like', "%{$keyword}%")
                            ->orwhere('phone', 'like', "%{$keyword}%")
                            ->orwhere('id', "{$keyword}")->paginate(15);
        } else {
            $users = User::paginate(15);
            $keyword = "";
        }
 
        return view('dashboard.users.index', compact('users', 'keyword'));
      }

    public function destroy(User $user)
    {
        if ($user->deleted_flag) {
            $user->deleted_flag = false;
        } else {
            $user->deleted_flag = true;
            
            // ダッシュボードで削除をしたら予約ページを非公開にする
            $reservepages = Reservepage::where('user_id', $user->id)->get();
            foreach ($reservepages as $reservepage) {
                $reservepage->release = 1;
                $reservepage->update();
            }
            // ダッシュボードで削除をしたら無料会員になる
            $user->member_flag = 0;
            
            // ダッシュボードで削除をしたら有料会員だった場合、決済がキャンセルになる
            $subscription = $user->subscription('default');
            if ($subscription && !$subscription->cancelled()) {
                $user->subscription('default', 'price_1OL14lLtSGE4625lf5ONKr2X')->cancel();
            }
        }
    
        $user->update();
    
        return redirect()->route('dashboard.users.index');
    }
}
