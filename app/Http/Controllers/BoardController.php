<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCircleRequest ;
use App\Models\Circle;
use App\Models\Profile;
use App\Models\Prefecture;
use App\Models\User;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Circle_Genre;
use App\Models\Circle_User;
use App\Models\Category_Circle;
use App\Models\Message;
use App\Models\Board;
use App\Models\Board_User;
use App\Models\Board_Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{

    public function index() {
        $board = new Board;
        $user = Auth::user();
        $c_boards = $user->boards()->where('type', 'circle')->get();
        $board->addLastMessageToBoard($c_boards);
        $u_boards = $user->boards()->where('type', 'user')->get();
        foreach($u_boards as $uboard){
            $uboard['otherUser'] = $board->getOtherUser($user->id,$uboard->id);
        }
        return view('indexMessage', [
            'c_boards' => $c_boards,
            'u_boards' => $u_boards,
        ]);
    }

    public function show($board_id) {
        $board = Board::find($board_id);
        $message = new Message;
        if($board->type=='user'){
            $board['otherUser'] = $board->getOtherUser(Auth::id(),$board->id);
        }
        $messages = $board->getAllMessages($board);
        $message->changeFormatMessagesDate($messages);
        return view('showMessage', [
            'board' => $board,
            'messages' => $messages,
        ]);
    }

    

    

}
