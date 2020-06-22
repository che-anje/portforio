<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Circle;
use App\Models\User;
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
        return $user->boards()->where('type', $type)->get();
    }

    public function changeFormatLastDate($last_msg,$boad) {
        if($last_msg['created_at'] > (Carbon::now()->subDay())){
            return Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('H:i');
        }else{
            return Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('n月j日');
        }
    }

    public function getAllMessages($board) {
        return $board->messages()->orderby('id','asc')->get();
    }

    public function getOtherUser($user_id,$board_id) {
        $board_user = Board_User::where('board_id',$board_id)->where('user_id', '!=', $user_id)->first();
        return User::find($board_user->user_id);
    }

    public function createBoard($type, $circle_id) {
        $board = new Board;
        $board->type = $type;
        $board->circle_id = $circle_id;
        $board->save();
        return $board;
    }
}
