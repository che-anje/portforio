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
    public function storeMessage(Request $request) {
        $msg = new Message;
        $msg->user_id = $request->user_id;
        $msg->board_id = $request->board_id;
        $msg->msg = $request->msg;
        $msg->type = $request->msg_type;
        $msg->save();
        return $msg;
    }

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

    public function getTemplateApply($request, $circle, $user) {
        $template_msg = "<p>《システムから送信》</p><br>"       
        ."<p>".$circle->name." 管理人さんへ、サークルプロフィールページからサークル参加リクエストが届いています。</p><br>"          
        ."<p>管理人さんが下記のURLをクリックすると".$user->profile->familyName.$user->profile->firstName."さんのAAへの参加を承認します。</p><br>"
        ."<p>URL</p><br>"
        ."<a href='/circle_user/".$circle->id."/".$user->id."'>".url("/circle_user/".$circle->id."/".$user->id)."</a><br>"
        ."<p>".$user->profile->familyName.$user->profile->firstName."さんの自己紹介</p><br>"
        ."<p>---------</p><br>"
        ."<p>".$request->msg."</p><br>"           
        ."<p>".$user->profile->familyName.$user->profile->firstName."さんのプロフィール</p><br>"
        ."<a href='/profile/show/".$user->profile->id."'>".url("/profile/show/".$user->profile->id)."</a>";
        return $template_msg;
    }

    public function getTemplateMsg($profile) {
        $template_msg = "<p>《システムから送信》</p><br>"
        ."<p>".$profile->familyName.$profile->firstName."さんの自己紹介</p><br>"
        ."<p>---------</p><br>"
        ."<p>よろしく</p><br>";
        return $template_msg;
    }
}