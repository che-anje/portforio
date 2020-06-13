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
        if(Auth::check()) {
            if(Auth::user()->profile->prefectureOfInterest != 0) {
                $my_prefecture = Auth::user()->profile->prefecture;
            }elseif(session()->exists('my_prefecture')){
                $my_prefecture = session('my_prefecture');
            }else{
                $my_prefecture = Prefecture::find(48);
            }
        }elseif(session()->exists('my_prefecture')){
            $my_prefecture = session('my_prefecture');
        }else{
            $my_prefecture = Prefecture::find(48);
        }
        $prefectures = Prefecture::getPrefectures();

        $categories = Category::orderby('id', 'asc')->get();

        if($my_prefecture!=null && $my_prefecture->id!=48) {
            $circles = Circle::where('prefecture_id', $my_prefecture->id)->orderby('id', 'desc')->get();
        }else{
            $circles = Circle::orderby('id', 'desc')->get();
        }
        foreach($circles as $circleRecord) {
            $genres = $circleRecord->genre()->orderby('genre_id')->get();
            $genreName = [];
            foreach($genres as $genreRecord) {
                $genreName[] = $genreRecord->name;
            }
            $circleRecord['genres'] = $genreName;
            $circleRecord['pref'] = $circleRecord->prefecture()->first()->name;
            $circleRecord['count'] = Circle_User::where('circle_id', $circleRecord->id)->count();
        }

        return view('home',  [
            'my_prefecture' => $my_prefecture,
            'prefectures' => $prefectures,
            'categories' => $categories,
            'circles' => $circles,
        ]);
    }

    

    /*
    public function insert() {
        foreach ($this->genres8 as $genre) {
            Genre::insert($genre);
        }
    }
    */
    
}
