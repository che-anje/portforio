<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Circle;
use App\Models\User;
use App\Models\Board;
use App\Models\Message;
use Carbon\Carbon;

class Board extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'board_users', 'board_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function circle()
    {
        return $this->belongsTo('App\Models\Circle');
    }

    public function addLastMessageToBoard($boards) {
        foreach($boards as $board){
            if($board->messages()->orderby('id','desc')->first()){
                $last_msg = $board->messages()->orderby('id','desc')->first();
                $board['last_msg'] = $last_msg['msg'];
                $board['last_date'] = $board->changeFormatLastDate($last_msg,$board);
                $board['last'] = $last_msg['created_at'];
            }
        }
        return $boards->sortByDesc('last');
    }

    public function getBoards($user, $type) {
        $boards = $user->boards()->where('type', $type)->get();
        $boards = $this->addInformationToBoards($boards);
        return $boards;
    }

    public function addInformationToBoards($boards) {
        $circle = new Circle;
        foreach($boards as $board) {
            $circle->addInfomationToCircle($board->circle);
        }
        return $boards;
    }

    public function changeFormatLastDate($last_msg,$boad) {
        if($last_msg['created_at'] > (Carbon::now()->subDay())){
            return Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('H:i');
        }else{
            return Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('n月j日');
        }
    }

    public function getAllMessages($board) {
        $messages = $board->messages()->orderby('id','asc')->get();
        foreach($messages as $message) {
            $message['image_path'] = $message->user->profile->getImagePathAttributes();
        }
        return $messages;
    }

    public function getOtherUser($user_id,$board_id) {
        $board_user = Board_User::where('board_id',$board_id)->where('user_id', '!=', $user_id)->first();
        $other = User::find($board_user->user_id);
        $other['image_path'] = $other->profile->getImagePathAttributes();
        return $other;
    }

    public function createBoard($type, $circle_id) {
        $board = new Board;
        $board->type = $type;
        $board->circle_id = $circle_id;
        $board->save();
        return $board;
    }

    public function getNewMessages($board_id, $message_id) {
        $newMessages = Message::where('board_id', $board_id)->where('id','>',$message_id)->orderby('id', 'asc')->get();
        return $newMessages;
    }
}
