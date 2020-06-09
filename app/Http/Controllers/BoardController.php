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

    public function getOtherUser($user_id,$board_id) {
        $board_user = Board_User::where('board_id',$board_id)->where('user_id', '!=', $user_id)->first();
        $otherUser = User::find($board_user->user_id);
        return $otherUser;
    }

    public function index() {
        $user = Auth::user();
        $c_boards = $user->boards()->where('type', 'circle')->get();
        foreach($c_boards as $cboard){
            $cboard['circle'] = Circle::find($cboard->circle_id);
            $cboard['count'] = $cboard->users()->count();
            if($cboard->messages()->orderby('id','desc')->first()!=null){
                $last_msg = $cboard->messages()->orderby('id','desc')->first()->toArray();
                $cboard['last_msg'] = $last_msg['msg'];
            }
            if($last_msg['created_at'] > (Carbon::now()->subDay())){
                $cboard['last_date'] = Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('H:i');
            }else{
                $cboard['last_date'] = Carbon::createFromFormat('Y-m-d H:i:s', $last_msg['created_at'])->format('n月j日');
            }
            
        }
        $u_boards = $user->boards()->where('type', 'user')->get();
        foreach($u_boards as $uboard){
            $uboard['otherUser'] = $this->getOtherUser($user->id,$uboard->id);
            $uboard['circle'] = Circle::find($uboard->circle_id);
            $uboard['count'] = $uboard->users()->count();
        }

        return view('indexMessage', [
            'c_boards' => $c_boards,
            'u_boards' => $u_boards,
        ]);
    }

    public function show($board_id) {
        $board = Board::find($board_id);
        $board['circle'] = $board->circle()->first();
        $board['count'] = $board->users()->count();
        if($board->type=='user'){
            $board['otherUser'] = $this->getOtherUser(Auth::id(),$board->id);
        }
        
        $board['users'] = $board->users;
        $messages = $board->messages()->orderby('id','asc')->get();
        foreach($messages as $message) {
            $message['user'] = User::find($message->user_id)->profile;
            $message['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('n月j日 H:i');
        }
        
        return view('showMessage', [
            'board' => $board,
            'messages' => $messages,
        ]);
    }

    

    public function getCreatedAtAttribute($date)
    {
        
    }

}
