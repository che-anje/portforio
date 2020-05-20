<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\EmailReset;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;

class UserController extends Controller
{
    public function reset(Request $request, $token)
    {
        $email_resets = EmailReset::where('token', $token)->first();

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $user = User::find($email_resets->user_id);
            $user->email = $email_resets->new_email;
            $user->save();
        // レコードを削除
            EmailReset::where('token', $token)->delete();
            return redirect('/')->with('flash_message', 'メールアドレスを更新しました！');
        } else {
            // レコードが存在していた場合削除
            if ($email_resets) {
                EmailReset::where('token', $token)->delete();
            }
            return redirect('/')->with('flash_message', 'メールアドレスの更新に失敗しました。');
        }
    }

    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * 60;
        return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }
}