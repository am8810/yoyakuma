<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Billable;
    
    public function sendEmailVerificationNotification()
     {
         $this->notify(new CustomVerifyEmail());
     }
     
     public function sendPasswordResetNotification($token) {
         $this->notify(new CustomResetPassword($token));
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'page_address', 'phone', 'name', 'store_name', 'industry',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function reservepages()
     {
         return $this->hasMany('App\Reservepage');
     }
}
