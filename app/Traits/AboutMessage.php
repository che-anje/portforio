<?php namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Message;
use App\Models\Board;
use App\Models\Board_User;
use App\Http\Requests\CreateCircleRequest ;
use App\Models\Circle;
use App\Models\Genre;
use App\Models\Circle_Genre;
use App\Models\Circle_User;
use App\Models\Category_Circle;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
use App\Traits\AboutMessage;
use Illuminate\Support\Facades\DB;


trait AboutMessage
{

    public function storeBoard(Request $request) {
        $board = new Board;
        $board->type = $request->board_type;
        $board->save();
    }

    public function storeBoard_User(Request $request) {
        $board_user = new Board_User;
        $board_user->board_id = $request->board_id;
        $board_user->user_id = $request->user_id;
        $board_user->save();
    }

    

    
}