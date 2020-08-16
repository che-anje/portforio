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
    
    public function __construct() {
       $this->middleware('auth');
       $this->middleware('has.profile');
    }

    public function store(Request $request) {
        $postInput = file_get_contents('php://input');
        $data = json_decode($postInput, true);
        $message = new Message;
        $message = $message->storeMessage($data['user_id'],$data['board_id'],$data['msg'],$data['msg_type']);
        $board = Board::find($data['board_id']);
        if($request->ajax()){
            return json_encode($message);
        }
        return redirect(route('message.show', ['board_id' => $board->id]));
    }

    

}
