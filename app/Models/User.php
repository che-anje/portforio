<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
use App\Models\Profile;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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

    public function getData(){
    $data = DB::table($this->table)->get();

    return $data;
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new CustomVerifyEmail());
    }
 
     public function sendPasswordResetNotification($token) {
         $this->notify(new CustomResetPassword($token));
 
    }

    /* リレーション*/
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}

