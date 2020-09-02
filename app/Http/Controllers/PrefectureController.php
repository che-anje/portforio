<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Circle;
use App\Models\Circle_User;
use Illuminate\Support\Facades\Storage;

class PrefectureController extends Controller

{

    public function change(int $id) {
        $my_pref = $this->changeMyPrefecture($id);
        $my_prefecture = Prefecture::find($this->getSelectedPrefectureId());
        $circle = new Circle;
        $n_circles = $circle->sortByNewArrival($my_prefecture->id);
        $p_circles = $circle->sortCirclesByPopularity($my_prefecture->id);
        /*サークルごとのジャンル・メンバー数・都道府県を取得する*/
        $circle->addInfomationToCircles($n_circles);
        $circle->addInfomationToCircles($p_circles);
        $circle_user = new Circle_User;
        $recent = $circle_user->getRecent();
        $recent['circle'] = $circle_user->getRecentCircle();
        return view('home',  [
            'my_prefecture' => $my_prefecture,
            'n_circles' => $n_circles,
            'p_circles' => $p_circles,
            'recent' => $recent,
        ]);
        //return redirect('/');
    }

    public function categoryPrefChange(Request $request, int $pref_id, $category_id) {
        $prefecture = new Prefecture;
        $this->changeMyPrefecture($pref_id);
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
        //return redirect("/circle/$category_id/$pref_id");
    }

    public function circlePrefChange(int $pref_id, Request $request, $category_id=null, $genre_id=null) {
        $prefecture = new Prefecture;
        $this->changeMyPrefecture($pref_id);
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
        $order = $request->order;
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
                'recent' => $recent,
                'order' => $order
            ])->render();
            $response = response($html, 200);
        }else{
            $response = view('indexCircle', [
                'my_prefecture' => $my_prefecture,
                'circles' => $circles,
                'my_category' => $my_category,
                'my_genre' => $my_genre,
                'recent' => $recent,
                'order' => $order
            ]);
        }
        /*戻り値を返す*/
        return $response;
        /*
        if($category_id){
            return redirect("/index/$pref_id?&category=$category_id");
        }else{
            return redirect("/index/$pref_id");
        }
        */

    }
}
