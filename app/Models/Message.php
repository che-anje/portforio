<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Board;
use App\Models\Message;

class Message extends Model
{
    public function board(){
        return $this->belongsTo('App\Models\Board');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function changeFormatMessagesDate($messages) {
        foreach($messages as $message) {
            $message['date'] = $message->changeFormatMessageDate($message);
        }
        return $messages;
    }

    public function changeFormatMessageDate($message) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('n月j日 H:i');
    }

    public function storeMessage($user_id,$board_id,$msg,$type) {
        $message = new Message;
        $message->user_id = $user_id;
        $message->board_id = $board_id;
        $message->msg = $msg;
        $message->type = $type;
        $message->save();
        return $message;
    }

    public function storeEntryMessage($user_id,$board_id,$fullName) {
        $msg = new Message;
        $msg->user_id = $user_id;
        $msg->board_id = $board_id;
        $msg->msg = $fullName.'さんが参加しました。';
        $msg->type = 'entry';
        $msg->save();
        return $msg;
    }

    public function getTemplateMsg($profile,$text) {
        $template_msg = "<p class='mb-0'>《システムから送信》</p><br>"
        ."<p class='mb-0'>".$profile->familyName.$profile->firstName."さんの自己紹介</p>"
        ."<p class='mb-0'>---------</p>"
        ."<p class='mb-0'>".$text."</p><br>";
        return $template_msg;
    }

    public function getTemplateApply($circle, $user,$text) {
        $template_msg = "<p class='mb-0'>《システムから送信》</p><br>"       
        ."<p class='mb-0'>".$circle->name." 管理人さんへ、サークルプロフィールページからサークル参加リクエストが届いています。</p><br>"          
        ."<p class='mb-0'>管理人さんが下記のURLをクリックすると".$user->profile->familyName.$user->profile->firstName."さんのAAへの参加を承認します。</p>"
        ."<p class='mb-0'>URL</p>"
        ."<a class='mb-0' href='/circle_user/".$circle->id."/".$user->id."'>".url("/circle_user/".$circle->id."/".$user->id)."</a><br>"
        ."<p class='mb-0'>".$user->profile->familyName.$user->profile->firstName."さんの自己紹介</p>"
        ."<p class='mb-0'>---------</p><br>"
        ."<p class='mb-0'>".$text."</p><br>"         
        ."<p class='mb-0'>".$user->profile->familyName.$user->profile->firstName."さんのプロフィール</p>"
        ."<a class='mb-0' href='/profile/show/".$user->profile->id."'>".url("/profile/show/".$user->profile->id)."</a>";
        return $template_msg;
    }
}
