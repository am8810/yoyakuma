<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminDoreserveSendmail extends Mailable
{
    use Queueable, SerializesModels; // キューおよびモデルのシリアライズをサポートするトレイトを使用することを示している
    
    // privateはアクセス修飾子と呼ばれ、このプロパティがクラス内でのみアクセス可能で、外部からは直接アクセスできないことを示している
    private $reservepage;
    private $do_reserve;
    private $calendar;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $reservepage, $do_reserve, $calendar, $user )
    {
        // コンストラクタに渡された $reservepage, $do_reserve, $calendar, $userの値をオブジェクト内で保持し、使用できるようにする
        $this->reservepage = $reservepage;
        $this->do_reserve = $do_reserve;
        $this->calendar = $calendar;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        // buildメソッドはメールの内容を構築し、メールの送信に関する設定を行うためのメソッド
        return $this
            ->from('yoyakuma@starting-design.com') // メールの送信元（From）のメールアドレスを設定
            ->subject("「{$this->do_reserve->customer_name}」様より　予約が入りました【予約管理ならヨヤクマ】") // メールの件名
            ->view('reserve.admin') // メールの内容を表示するビュー
            ->with([ // withメソッドを使用して、ビューにデータを渡す
                'reservepage' => $this->reservepage,
                'do_reserve' => $this->do_reserve,
                'calendar' => $this->calendar,
                'user' => $this->user,
            ]);
    }
}
