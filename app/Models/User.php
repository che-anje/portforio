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
use App\Models\Prefecture;
use App\Models\Circle;
use App\Models\Board;
use App\Models\Point_Log;
use App\Models\EmailReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

    public function email_resets()
    {
        return $this->hasMany(EmailReset::class);
    }

    public function circles()
    {
        return $this->belongsToMany('App\Models\Circle');
    }

    public function circle()
    {
        return $this->hasOne('App\Models\Circle', 'admin_user_id');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function boards(){
        return $this->belongsToMany('App\Models\Board', 'board_users', 'user_id', 'board_id');
    }

    public function point_log()
    {
        return $this->hasOne(Point_Log::class);
    }

    public function updateProfile(array $attributes)
    {
        $deleteImage = null;
        $this->profile->fill($attributes);
        if(
            $this->profile->isDirty('user_image')
            && $this->profile->getOriginal('user_image')
        ) {
            $deleteImage = $this->profile->getOriginal('user_image');
        }
        $this->profile->save();

        if($attributes['new_email']) {
            $new_email = $attributes['new_email'];
            $token = hash_hmac(
                'sha256',
                Str::random(40) . $new_email,
                config('app.key')
            );
            $email_reset = $this->email_resets()->create([
                'new_email' => $new_email,
                'token' => $token
            ]);
            $email_reset->sendEmailResetNotification($token);
        }
        $this->fill($attributes)->save();

        return [$deleteImage];
    }

    
}

