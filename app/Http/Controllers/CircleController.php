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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\aboutPrefecture;
use Illuminate\Support\Facades\DB;

class CircleController extends Controller
{
    use aboutPrefecture;

    public function getCircles(int $id) {
        
        if(Auth::check()) {
            $profile = Auth::user()->profile;
            $profile->prefectureOfInterest = $id;
            $profile->cityOfInterest = 0;
            $profile->save();
            $my_prefecture = Prefecture::where('id', $profile->prefectureOfInterest)->first();
        }else{
            $my_prefecture = null;
        }
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->get();
        $circles = Circle::where('prefecture_id', $id)->get();
        return view('home',  [
            'my_prefecture' => $my_prefecture,
            'prefectures' => $prefectures,
            'circles' => $circles,
        ]);
    }

    public function showCreateForm() {
        $prefectures = $this->getPrefectures();
        $categories = Category::get();
        foreach($categories as $categoryRecord) {
            $genres = $categoryRecord->genre()->orderby('id')->get();
            $genreName = [];
            $categoryRecord['genres'] = $genres;
        }
        
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
            $circle->save();
            
            $genres = $request->genres;
            foreach((array)$genres as $genre) {
                $circle_genre = new Circle_Genre;
                $circle_genre->circle_id = $circle->id;
                $circle_genre->genre_id = $genre;
                $circle_genre->save();
            }

            $circle_user->user_id = $user->id;
            $circle_user->circle_id = $circle->id;
            $circle_user->save();

            return redirect('/');
        });
    }

    public function show(int $id) {
        $circle = Circle::find($id);
        $circle_pref = $this->getMyPrefecture();
        $genres = $circle->genre()->get();
        $members = $circle->user->profile()->get();
        $categories = Category::orderby('id', 'asc')->get();


        return view('showCircle', [
            'circle' => $circle,
            'circle_pref' => $circle_pref,
            'genres' => $genres,
            'members' => $members,
            'categories' => $categories,
        ]);
    }

    public function edit() {
        return view('circle_image', );
    }

    public function up(Request $request) {
        $circle = Circle::find(1);
        
        if($request->file('circle_image')) {
            Storage::delete('public/CircleImages/'.$circle->image);
            $originalImg = $request->circle_image;
            $filePath = $originalImg->store('public/CircleImages');
            $circle->image = str_replace('public/CircleImages/', '', $filePath);
        }
        $circle->save();
    }

    
}
