<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board_User extends Model
{
    protected $table = 'board_users';

    public function createBoardUser($board_id, $user_id) {
        $board_user = new Board_User;
        $board_user->board_id = $board_id;
        $board_user->user_id = $user_id;
        $board_user->save();
        return $board_user;
    }
}
