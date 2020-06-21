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
            $user = User::find($request->user_id);
            $user['profile'] = $user->profile;
            $circle_user = new Circle_User;
            $text = $request->msg;

            if(!Circle_User::where('circle_id', $request->circle_id)->where('user_id', $user->id)->first()){
                $circle = Circle::find($request->circle_id);
                $circle_user->applyForCircle($circle,$user,$text);
            }
            $this->insertLogOfRegister($request->circle_id, Auth::id());
            return redirect(route('circle.show', [$circle->id]));
        });
        
        
    }

    public function participate($circle_id,$user_id) {
        return DB::transaction(function () use ($circle_id,$user_id) {
            $circle = Circle::find($circle_id);
            $user = User::find($user_id);
            $board = $circle->board;
            if(Auth::id()==$circle->admin_user_id){
                
                $circle_user = Circle_User::where('circle_id',$circle_id)->where('user_id', $user_id)->first();
                if($circle_user->approval != 2){
                    $circle_user->approveUser($circle_user,$board,$user);
                    return redirect('/message')->with('message', $user->profile->name.'の参加を承認しました');
                }
                return back()->with('message', '既に承認済です');
            }
            return back()->with('message', '管理者ではありません');
        });
    }

    
}
