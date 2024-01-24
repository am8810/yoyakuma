<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupportAdminSendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $name;
    private $company;
    private $email;
    private $phone;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $inputs )
    {
        $this->name = $inputs['name'];
        $this->company = $inputs['company'];
        $this->email = $inputs['email'];
        $this->phone = $inputs['phone'];
        $this->body = $inputs['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $name = $request->input('name');
        
        return $this
            ->from('yoyakuma@starting-design.com', '【予約管理ならヨヤクマ】')  // メールの送信元（From）のメールアドレスと名前を設定
            ->subject("「{$name}」様より　zoomサポート依頼")
            ->view('support.admin')
            ->with([
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'phone' => $this->phone,
                'body' => $this->body,
            ]);
    }
}
