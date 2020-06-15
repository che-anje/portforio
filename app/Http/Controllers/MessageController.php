<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Message;
use App\Models\Board;
use App\Models\Board_User;
use App\Traits\AboutMessage;

class MessageController extends Controller
{
    use AboutMessage;

    public function store(Request $request) {
        $message = new Message;
        $message->storeMessage($request->user_id,$request->board_id,$request->msg,$request->msg_type);
        $board = Board::find($request->board_id);
        $messages = $board->messages()->orderby('id','asc')->get();
        if($request->ajax()){
            return $message;
        }
        return redirect(route('message.show', ['board_id' => $board->id]));
    }

    

}
