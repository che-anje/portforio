<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Prefecture;
use App\Models\User;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Circle;
use App\Models\Circle_User;
use App\Traits\AboutPrefecture;

class HomeController extends Controller
{
    use aboutPrefecture;
    use \App\Models\Genres;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $my_prefecture = Prefecture::getMyPrefecture();
        $prefectures = Prefecture::getPrefectures();
        $categories = Category::getAllCategories();
        
        if($my_prefecture!=null && $my_prefecture->id!=48) {
            $circles = Circle::where('prefecture_id', $my_prefecture->id)->orderby('id', 'desc')->get();
        }else{
            $circles = Circle::orderby('id', 'desc')->get();
        }
        $circle = new Circle;
        /*サークルごとのジャンル・メンバー数・都道府県を取得する*/
        $circle->addInfomationToCircles($circles);
        return view('home',  [
            'my_prefecture' => $my_prefecture,
            'prefectures' => $prefectures,
            'categories' => $categories,
            'circles' => $circles,
        ]);
    }

    

    
}
