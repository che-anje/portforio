<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Board;

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
}
