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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
use Illuminate\Support\Facades\DB;

class CircleController extends Controller
{
    use AboutPrefecture;

    public function showCreateForm() {
        $prefectures = Prefecture::getPrefectures();
        $categories = Category::get();
        $category = new Category;
        $category->getGenresOfCategories($categories);
        
        return view('createCircle', [
            'categories' => $categories,
            'prefectures' => $prefectures,
        ]);
    }

    public function create(CreateCircleRequest $request) {
        return DB::transaction(function () use ($request) {
            $circle = new Circle;
            $user = Auth::user();
            $circle_user = new Circle_User;
            $circle->fill($request->all());
            $circle->admin_user_id = $user->id;
            if($request->file('image')) {
                $originalImg = $request->image;
                $filePath = $originalImg->store('public/CircleImages');
                $circle->image = str_replace('public/CircleImages/', '', $filePath);
            }
            $genres = $request->genres;
            $main_genre = Genre::find($genres[0]);
            $circle->category_id = $main_genre->category_id;
            $circle->save();
            foreach((array)$genres as $genre) {
                $circle_genre = new Circle_Genre;
                $circle_genre->circle_id = $circle->id;
                $circle_genre->genre_id = $genre;
                $circle_genre->save();
            }
            $circle_user->user_id = $user->id;
            $circle_user->circle_id = $circle->id;
            $circle_user->approval = 2;
            $circle_user->save();

            $board = new Board;
            $board->type = 'circle';
            $board->circle_id = $circle->id;
            $board->save();

            $board_user = new Board_User;
            $board_user->board_id = $board->id;
            $board_user->user_id = $user->id;
            $board_user->save();

            return redirect('/');
        });
    }

    public function show(int $id) {
        $circle = Circle::find($id);
        $profile = new Profile;
        $members = $circle->getCircleMembers($circle)->get();
        $members = $profile->getUsersProfile($members);
        $circle = $circle->addInfomationToCircle($circle);
        $categories = Category::getAllCategories();
        $approval = Circle_User::getApproval($id, Auth::id());
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::getMyPrefecture();
        $board = $circle->board()->first();
        return view('showCircle', [
            'circle' => $circle,
            'members' => $members,
            'categories' => $categories,
            'approval' => $approval,
            'board' => $board,
            'my_prefecture' => $my_prefecture,
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
        $category = new Category;
        $prefectures = Prefecture::getPrefectures();
        $categories = $category->getAllCategories();
        $category->getGenresOfCategories($categories);
        return view('editCircle', [
            'circle' => $circle,
            'categories' => $categories,
            'prefectures' => $prefectures,
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
            $genres = $request->genres;
            $main_genre = Genre::find($genres[0]);
            $circle->category_id = $main_genre->category_id;
            $circle->save();
            Circle_Genre::where('circle_id', $circle->id)->delete();
            foreach((array)$genres as $genre) {
                $circle_genre = new Circle_Genre;
                $circle_genre->circle_id = $circle->id;
                $circle_genre->genre_id = $genre;
                $circle_genre->save();
            }
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
        $categories = Category::getAllCategories();
        $my_category = Category::find($category_id);
        $prefectures = Prefecture::getPrefectures();
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::getMyPrefecture();
        $genres = $my_category->genres()->get();
        /*サークル情報を取得する*/
        $circles = $circle->getCircleList($my_prefecture,$request,$genre_id=null,$category_id)->sortByDesc('id');
        $pop_genres = [];
        $pop_genres = $circle->getPopGenres($circles);
        $circle->addInfomationToCircles($circles);

        /*$html = view('message.template.xxx', [
        ])->render();*/
        return view('category_search', [
            'categories' => $categories,
            'my_category' => $my_category,
            'genres' => $genres,
            'prefectures' => $prefectures,
            'my_prefecture' => $my_prefecture,
            'circles' => $circles,
            'pop_genres' => $pop_genres,
        ]);
    }

    public function index($pref_id,Request $request, $genre_id=null) {
        $query = Circle::query();
        $circle = new Circle;
        /*全都道府県を取得する*/
        $prefectures = Prefecture::getPrefectures();
        /*自分の選択している都道府県を取得する。*/
        $my_prefecture = Prefecture::getMyPrefecture();
        /*全てのカテゴリーを抜き出す*/
        $categories = Category::getAllCategories();
        /*サークル情報を取得する*/
        $category_id = $request->input('category');
        $circles = $circle->getCircleList($my_prefecture,$request,$genre_id,$category_id);
        /*サークルごとのジャンル・メンバー数・都道府県を取得する*/
        $circle->addInfomationToCircles($circles);
        //選択したカテゴリー・ジャンルを取得。無ければnull。
        $my_category = Category::find($category_id);
        $my_genre = Genre::find($genre_id);
        /*返すビューを作る*/
        if($request->ajax()) {
            //ajaxで呼び出した場合
            //新着順の場合並び替える
            if($request->order=='new'){
                $circles = $circles->sortByDesc('id');
            }
            $html = view('circleList', [
                'prefectures' => $prefectures,
                'my_prefecture' => $my_prefecture,
                'categories' => $categories,
                'circles' => $circles,
                'my_category' => $my_category,
                'my_genre' => $my_genre,
            ])->render();
            $response = response($html, 200);
        }else{
            $response = view('indexCircle', [
                'prefectures' => $prefectures,
                'my_prefecture' => $my_prefecture,
                'categories' => $categories,
                'circles' => $circles,
                'my_category' => $my_category,
                'my_genre' => $my_genre,
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
