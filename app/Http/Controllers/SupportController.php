<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\SupportSendmail;
use App\Mail\SupportAdminSendmail;

class SupportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        //フォーム入力画ページのviewを表示
        return view('support.index', compact('user'));
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();
        
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'body' => 'required',
        ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('support.confirm', compact('user'), [
            'inputs' => $inputs,
        ]);
    }

    public function send(Request $request)
    {
        $user = Auth::user();

        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'body' => 'required',
        ]);
        
        // 管理者メールアドレス
        $email_admin = 'yoyakuma@starting-design.com';

        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('support.index')
                ->withInput($inputs);

        } else {
            //入力されたメールアドレスにメールを送信
            \Mail::to($inputs['email'])->send(new SupportSendmail($inputs));
            
            //管理者にお問い合わせメールを送信
            \Mail::to($email_admin)->send(new SupportAdminSendmail($inputs));

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('support.thanks', compact('user'));
            
        }


    }
}
