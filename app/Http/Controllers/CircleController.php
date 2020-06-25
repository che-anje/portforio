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
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller,
    Session;

class CircleController extends Controller
{
    use AboutPrefecture;

    public function showCreateForm() {
        
        return view('createCircle');
    }

    public function create(CreateCircleRequest $request) {
        return DB::transaction(function () use ($request) {
            $circle = new Circle;
            $user = Auth::user();
            $circle->fill($request->validated());
            if($request->file('image')) {
                $originalImg = $request->image;
                $filePath = $originalImg->store('public/CircleImages');
                $circle->image = str_replace('public/CircleImages/', '', $filePath);
            }
            $circle->category_id = Genre::find($request->genres[0])->category_id;
            $circle->save();
            $circle_genre = new Circle_Genre;
            $circle_genre->updateCircleGenres($circle->id,$request->genres);
            $circle_user = new Circle_User;
            $circle_user->createCircleUser($user->id,$circle->id,2);
            $board = new Board;
            $board = $board->createBoard('circle', $circle->id);
            $board_user = new Board_User;
            $board_user->createBoardUser($board->id, $user->id);
            return redirect('/');
        });
    }

    public function show(int $id, Request $request) {
        $circle = Circle::find($id);
        $profile = new Profile;
        $members = $circle->getCircleMembers($circle)->get();
        $members = $profile->getUsersProfile($members);
        $circle = $circle->addInfomationToCircle($circle);
        $approval = Circle_User::getApproval($id, Auth::id());
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::find($this->getSelectedPrefectureId());
        $board = $circle->board()->first();
        $circles = $circle->getRecommendedCircles($circle->genre[0],$circle->prefecture_id);
        $log = new Point_Log;
        $this->insertLogOfShow($circle->id, Auth::id());
        $circle_user = new Circle_User;
        $recent = $circle_user->getRecent();
        $recent['circle'] = $circle_user->getRecentCircle();
        return view('showCircle', [
            'circle' => $circle,
            'members' => $members,
            'approval' => $approval,
            'board' => $board,
            'my_prefecture' => $my_prefecture,
            'circles' => $circles,
            'recent' => $recent,
         ]);
    }

    public function showCircleMenu(int $id) {
        $circle = Circle::find($id);
        return view('circleMenu', [
            'circle' => $circle,
        ]);
    }

    public function showMyCircleMenu(int $id) {
        $circle = Circle::find($id);
        return view('myCircleMenu', [
            'circle' => $circle,
        ]);
    }

    public function showEditForm(int $id) {
        $circle = Circle::find($id);
        $circle['checked_genres'] = $circle->getCheckedGenres($circle);
        $circle = $circle->addInfomationToCircle($circle);
        $category = new Category;
        return view('editCircle', [
            'circle' => $circle,
        ]);
    }


    public function edit(int $id, CreateCircleRequest $request) {
        return DB::transaction(function () use ($id, $request) {
            $circle = Circle::find($id);
            $user = Auth::user();
            $old_image = $circle->image;
            $circle->fill($request->all());
            if($request->file('image')) {
                Storage::delete('public/CircleImages/' . $old_image);
                $originalImg = $request->image;
                $filePath = $originalImg->store('public/CircleImages');
                $circle->image = str_replace('public/CircleImages/', '', $filePath);
            }
            $circle->category_id = Genre::find($request->genres[0])->category_id;
            $circle->save();
            $circle_genre = new Circle_Genre;
            $circle_genre->updateCircleGenres($circle->id,$request->genres);
            return redirect('/');
        });
    }

    public function delete(int $id) {
        $circle = Circle::find($id);
        Storage::delete('public/CircleImages/' . $circle->image);
        $circle->delete();
        return redirect('/');
    }

    public function categorySearch(Request $request,$category_id, $pref_id) {
        $circle = new Circle;
        /*全てのカテゴリーを抜き出す*/
        $my_category = Category::find($category_id);
        $my_category['image_path'] = $my_category->getImagePathAttributes();
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::find($this->getSelectedPrefectureId());
        $genres = $my_category->genres()->get();
        /*サークル情報を取得する*/
        $circles = $circle->getCircleList($my_prefecture,$request,$genre_id=null,$category_id)->sortByDesc('id');
        $pop_genres = [];
        $pop_genres = $circle->getPopGenres($circles);
        $circle->addInfomationToCircles($circles);
        $circle_user = new Circle_User;
        $recent = $circle_user->getRecent();
        $recent['circle'] = $circle_user->getRecentCircle();

        /*$html = view('message.template.xxx', [
        ])->render();*/
        return view('category_search', [
            'my_category' => $my_category,
            'genres' => $genres,
            'my_prefecture' => $my_prefecture,
            'circles' => $circles,
            'pop_genres' => $pop_genres,
            'recent' => $recent,
        ]);
    }

    public function index($pref_id,Request $request, $genre_id=null) {
        $query = Circle::query();
        $circle = new Circle;
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::find($this->getSelectedPrefectureId());
        /*サークル情報を取得する*/
        $category_id = $request->input('category');
        $circles = $circle->getCircleList($my_prefecture,$request,$genre_id,$category_id);
        /*サークルごとのジャンル・メンバー数・都道府県を取得する*/
        $circle->addInfomationToCircles($circles);
        //選択したカテゴリー・ジャンルを取得。無ければnull。
        $my_category = Category::find($category_id);
        $my_genre = Genre::find($genre_id);
        $circle_user = new Circle_User;
        $recent = $circle_user->getRecent();
        $recent['circle'] = $circle_user->getRecentCircle();
        /*返すビューを作る*/
        if($request->ajax()) {
            //ajaxで呼び出した場合
            //新着順の場合並び替える
            if($request->order=='new'){
                $circles = $circles->sortByDesc('id');
            }
            $html = view('circleList', [
                'my_prefecture' => $my_prefecture,
                'circles' => $circles,
                'my_category' => $my_category,
                'my_genre' => $my_genre,
            ])->render();
            $response = response($html, 200);
        }else{
            $response = view('indexCircle', [
                'my_prefecture' => $my_prefecture,
                'circles' => $circles,
                'my_category' => $my_category,
                'my_genre' => $my_genre,
                'recent' => $recent,
            ]);
        }
        /*戻り値を返す*/
        return $response;
    }

    public function getCircleGenres(int $id) {
        $circle = Circle::find($id);
        return $circle->getCheckedGenres($circle);
    }

    

}
