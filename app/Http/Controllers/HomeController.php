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
    }

    

    
}
