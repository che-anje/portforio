<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Circle_User;
use App\Models\Circle;
use App\Models\User;
use App\Models\Board;

class Circle_User extends Model
{
    protected $table = 'circle_user';

    public function scopeGetApproval($query,$circle_id,$user_id) {
        if(Circle_User::where('circle_id', $circle_id)->where('user_id', $user_id)->first()){
            return $query->where('circle_id', $circle_id)->where('user_id', $user_id)->first()->approval;
            
        }else{
            return 0;
        }
    }

    public function createCircleUser($user_id, $circle_id, int $approval) {
        $circle_user = new Circle_User;
        $circle_user->user_id = $user_id;
        $circle_user->circle_id = $circle_id;
        $circle_user->approval = $approval;
        $circle_user->save();
        return $circle_user;
    }

    public function applyForCircle($circle,$user,$text) {
        $circle_user = new Circle_User;
        if($circle->request_required==1){
            $circle_user->applyWithoutApproval($circle,$user,$text);
        }elseif($circle->request_required==0){
            $circle_user->applyWithApproval($circle,$user,$text);
        }
    }

    public function applyWithoutApproval($circle,$user,$text) {
        $message = new Message;
        $board = new Board;
        $board_user = new Board_User;
        $circle_user = new Circle_User;
        $circle_user->createCircleUser($user->id,$circle->id,2);
        $board = $circle->board;
        $profile = $user->profile;
        $board_user->createBoardUser($board->id, $user->id);
        //参加報告メッセージを送る。
        $fullName = $profile->familyName.$profile->firstName;
        $message->storeEntryMessage($user->id,$board->id,$fullName,);
        //テンプレートのメッセージを送る。
        $msg = $message->getTemplateMsg($profile,$text);
        $message->storeMessage($user->id,$board->id,$msg,'msg');
    }

    public function applyWithApproval($circle,$user,$text) {
        $message = new Message;
        $board = new Board;
        $board_user = new Board_User;
        $circle_user = new Circle_User;
        $circle_user->createCircleUser($user->id,$circle->id,1);
        $board = $board->createBoard('user', $circle->id);
        $board_user->createBoardUser($board->id, $user->id);
        $board_user->createBoardUser($board->id, $circle->admin_user_id);
        $msg = $message->getTemplateApply($circle, $user,$text);
        $message->storeMessage($user->id,$board->id,$msg,'msg');
    }

    public function approveUser($circle_user,$board,$user) {
        $circle_user->approve($circle_user);
        
        $board_user = new Board_User;
        $board_user->createBoardUser($board->id, $user->id);

        //参加報告メッセージを送る。
        $message = new Message;
        $fullName = $user->profile->familyName.$user->profile->firstName;
        $message->storeEntryMessage($user->id,$board->id,$fullName,);

        
    }

    public function approve($circle_user) {
        $circle_user->approval = 2;
        $circle_user->save();
    }

    public function getRecent() {
        $circle_user = new Circle_User;
        $circle = $circle_user->getRecentCircle();
        if($recent = Circle_User::where('approval', 2)->where('user_id', '!=', $circle->admin_user_id)->orderby('id','desc')->first()){
            $recent['user'] = User::find($recent->user_id);
            $recent['Circle'] = Circle::find($recent->circle_id);
            $circle->addInfomationToCircle($recent['Circle']);
            return $recent;
        }else{
            $recent = Circle_User::where('approval', 2)->orderby('id','desc')->first();
            $recent['user'] = User::find($recent->user_id);
            $recent['Circle'] = Circle::find($recent->circle_id);
            $circle->addInfomationToCircle($recent['Circle']);
            return $recent;
        }
        
    }

    public function getRecentCircle() {
        $circle = Circle::orderby('id','desc')->first();
        $circle->addInfomationToCircle($circle);
        return $circle;
    }
}

