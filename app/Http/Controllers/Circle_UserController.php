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
use App\Models\Board;
use App\Models\Board_User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
use App\Traits\AboutMessage;
use Illuminate\Support\Facades\DB;

class Circle_UserController extends Controller
{
    use AboutPrefecture;
    use AboutMessage;

    //申請
    public function apply(Request $request) {
        return DB::transaction(function () use ($request) {
            $circle_id = $request->circle_id;
            $user = User::find($request->user_id);
            $user['profile'] = $user->profile()->first();
            
            if(!Circle_User::where('circle_id', $circle_id)->where('user_id', $user->id)->first()){
                $circle = Circle::find($circle_id);
                $circle_user = new Circle_User;
                $circle_user->circle_id = $circle_id;
                $circle_user->user_id = $user->id;
                if($circle->request_required==1){
                    $circle_user->approval = 2;
                    $circle_user->save();
                    $board = $circle->board()->first();
                    $profile = Profile::where('user_id',$user->id)->first();
                    $board_user = new Board_User;
                    $board_user->board_id = $board->id;
                    $board_user->user_id = $user->id;
                    $board_user->save();
                    $fullName = $profile->familyName.$profile->firstName;
                    $request->msg = $fullName.'さんが参加しました。';
                    $request->msg_type = 'entry';
                    $this->storeMessage($request);
                    $request = new Request;
                    $request->user_id = $user->id;
                    $request->board_id = $board->id;
                    $request->msg = $this->getTemplateMsg($profile);
                    $request->msg_type = 'msg';
                    $this->storeMessage($request);
                }elseif($circle->request_required==0){
                    $circle_user->approval = 1;
                    $circle_user->save();
                    $board = new Board;
                    $board->type = 'user';
                    $board->circle_id = $circle_id;
                    $board->save();
                    $board_user = new Board_User;
                    $board_user->board_id = $board->id;
                    $board_user->user_id = $user->id;
                    $board_user->save();
                    $board_user2 = new Board_User;
                    $board_user2->board_id = $board->id;
                    $circle = Circle::find($circle_id);
                    $board_user2->user_id = $circle->admin_user_id;
                    $board_user2->save();
                    $request->board_id = $board->id;
                    $request->msg = $this->getTemplateApply($request, $circle, $user);
                    $this->storeMessage($request);
                    
                }
            }
            return redirect(route('circle.show', [$circle_id]));
        });
        
    }

    public function participate($circle_id,$user_id, Request $request) {
        $circle_user = Circle_User::where('circle_id',$circle_id)->where('user_id', $user_id)->first();
        $circle_user->approval = 2;
        $circle_user->save();
        $circle = Circle::find($circle_id);
        $board = $circle->board()->first();
        $profile = Profile::where('user_id',$user_id)->first();
        $board_user = new Board_User;
        $board_user->board_id = $board->id;
        $board_user->user_id = $user_id;
        $board_user->save();
        $request->user_id = $user_id;
        $request->board_id = $board->id;
        $fullName = $profile->familyName.$profile->firstName;
        $request->msg = $fullName.'さんが参加しました。';
        $request->msg_type = 'entry';
        $this->storeMessage($request);
        return redirect('/message');
    }
}
