<?php

namespace App\Models;

use App\Notifications\ChangeEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class EmailReset extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail,Notifiable;

    protected $fillable = [
        'user_id',
        'new_email',
        'token',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

     /**
     * メールアドレス確定メールを送信
     *
     * @param [type] $token
     * 
     */
    public function sendEmailResetNotification($token)
    {
        $this->notify(new ChangeEmail($token));
    }

    /**
     * 新しいメールアドレスあてにメールを送信する
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->new_email;
    }
}
