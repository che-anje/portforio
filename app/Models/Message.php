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

    public function storeMessage(int $user_id,int $board_id,$msg,$type) {
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
        $template_msg = view('templateMsg',[
            'profile' => $profile,
            'text' => $text,
        ]);
        return $template_msg;
    }

    public function getTemplateApply($circle, $user,$text) {
        $template_msg = view('templateApply', [
            'circle' => $circle,
            'user' => $user,
            'text' => $text,
        ]);
        return $template_msg;
    }
}
