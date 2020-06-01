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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\AboutPrefecture;
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
            $genres = $categoryRecord->genres()->orderby('id')->get();
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
            $circle_user->save();

            return redirect('/');
        });
    }

    public function show(int $id) {
        $circle = Circle::find($id);
        if(Auth::check()) {
            if(Auth::user()->profile->prefectureOfInterest != 0) {
                $circle_pref = $this->getMyPrefecture();
            }elseif(session()->exists('my_prefecture')){
                $circle_pref = session('my_prefecture');
            }else{
                $circle_pref = Prefecture::find(48);
            }
        }elseif(session()->exists('my_prefecture')){
            $circle_pref = session('my_prefecture');
        }else{
            $circle_pref = Prefecture::find(48);
        }
        $genres = $circle->genre()->get();
        $members = $circle->users()->get();
        foreach($members as $memberRecord) {
            $profile = $memberRecord->profile()->first();
            $memberRecord['profile'] = $profile;
        }
        $circle['count'] = $circle->users()->count();
        $categories = Category::orderby('id', 'asc')->get();
        $cricle_category = $circle->genre[0]->category()->first();


        return view('showCircle', [
            'circle' => $circle,
            'circle_pref' => $circle_pref,
            'genres' => $genres,
            'members' => $members,
            'categories' => $categories,
            'cricle_category' => $cricle_category,
        ]);
    }

    public function showCircleMenu(int $id) {
        $circle = Circle::find($id);
        return view('circleMenu', [
            'circle' => $circle,
        ]);
    }

    public function showEditForm(int $id) {
        $circle = Circle::find($id);
        $circle_genres = Circle_Genre::where('circle_id', $id)->get();
        $genres_id = [];
        foreach($circle_genres as $circle_genre) {
            $genres_id[] = $circle_genre->genre_id;
        }
        
        $prefectures = $this->getPrefectures();
        $categories = Category::get();
        foreach($categories as $categoryRecord) {
            $genres = $categoryRecord->genres()->orderby('id')->get();
            
            $categoryRecord['genres'] = $genres;
        }
        return view('editCircle', [
            'circle' => $circle,
            'genres_id' => $genres_id,
            'categories' => $categories,
            'prefectures' => $prefectures,
        ]);
    }

    public function getCircleGenres(int $id) {
        $circle_genres = Circle_Genre::where('circle_id', $id)->get();
        $genres_id = [];
        foreach($circle_genres as $circle_genre) {
            $genres_id[] = $circle_genre->genre_id;
        }
        return $genres_id;
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

    public function categorySearch($category_id, $pref_id) {
        $categories = Category::orderby('id', 'asc')->get();
        $my_category = Category::find($category_id);
        $prefectures = $this->getPrefectures();
        if(Auth::check()) {
            if(Auth::user()->profile->prefectureOfInterest != 0) {
                $my_prefecture = $this->getMyPrefecture();
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
        $genres = $my_category->genres()->get();
        if($my_prefecture!=null && $my_prefecture->id!=48) {
            $circles = Circle::where('prefecture_id', $my_prefecture->id)->where('category_id', $category_id)->orderby('id', 'desc')->get();
        }else{
            $circles = Circle::where('category_id', $category_id)->orderby('id', 'desc')->get();
        }
        $circles_count = $circles->count();
        $pop_genres = [];
        if($circles_count > 0){
            $pop_genres = $this->getPopGenres($circles);
        }
        $this->getGenres($circles);
        
        return view('category_search', [
            'categories' => $categories,
            'my_category' => $my_category,
            'genres' => $genres,
            'prefectures' => $prefectures,
            'my_prefecture' => $my_prefecture,
            'circles_count' => $circles_count,
            'circles' => $circles,
            'pop_genres' => $pop_genres,
        ]);
    }

    public function index(int $pref_id, Request $request, $genre_id=null) {
        $prefectures = $this->getPrefectures();
        if(Auth::check()) {
            if(Auth::user()->profile->prefectureOfInterest != 0) {
                $my_prefecture = $this->getMyPrefecture();
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
        $categories = Category::orderby('id', 'asc')->get();
        $query = Circle::query();
        if($my_prefecture!=null && $my_prefecture->id!=48) {
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
                $circles = $query->where('prefecture_id', $my_prefecture->id)
                    ->where(function($query) use($keyword){
                        $query->where('name', 'LIKE', "%{$keyword}%");
                        $query->orWhere('introduction', 'LIKE', "%{$keyword}%");
                        $query->orWhereHas('genre', function($query) use ($keyword) {
                            $query->where('name',"%{$keyword}%");
                        });
                    })->orderby('id', 'asc')->get();
            }elseif($request->input('category')){
                $circles = Circle::where('prefecture_id', $my_prefecture->id)->where('category_id',$request->input('category'))->orderby('id', 'asc')->get();
            }elseif($genre_id){
                $circles = Genre::find($genre_id)->circle()->where('prefecture_id', $my_prefecture->id)->orderby('id', 'asc')->get();
            }else{
                $circles = Circle::where('prefecture_id', $my_prefecture->id)->orderby('id', 'asc')->get();
            }
        }else{
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
                $circles = $query->where(function($query) use($keyword){
                        $query->where('name', 'LIKE', "%{$keyword}%");
                        $query->orWhere('introduction', 'LIKE', "%{$keyword}%");
                        $query->orWhereHas('genre', function($query) use ($keyword) {
                            $query->where('name',"%{$keyword}%");
                        });
                    })->orderby('id', 'asc')->get();
            
            }elseif($request->input('category')){
                $circles = Circle::where('category_id',$request->input('category'))->orderby('id', 'asc')->get();
            }elseif($genre_id){
                $circles = Genre::find($genre_id)->circle()->orderby('id', 'asc')->get();
            }else{
                $circles = Circle::orderby('id', 'asc')->get();
            }
        }
        $circles_count = $circles->count();
        $pop_genres = [];
        $this->getGenres($circles);
        if($request->ajax()) {
            $query = Circle::query();
            $keyword = $request->keyword;
            if(!empty($keyword)) {
                if($my_prefecture->id!=null && $my_prefecture->id!=48) {
                    $circles = $query->where('prefecture_id', $my_prefecture->id)
                    ->where(function($query) use($keyword)
                    {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                        $query->orWhere('introduction', 'LIKE', "%{$keyword}%");
                        $query->orWhereHas('genre', function($query) use ($keyword) {
                            $query->where('name',"%{$keyword}%");
                        });
                    })->orderby('id', 'asc')->get();
                }else{
                    $circles = $query->where(function($query) use($keyword)
                    {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                        $query->orWhere('introduction', 'LIKE', "%{$keyword}%");
                        $query->orWhereHas('genre', function($query) use ($keyword) {
                            $query->where('name', "%{$keyword}%");
                        });
                    })->orderby('id', 'asc')->get();
                }
            }
            $this->getGenres($circles);
            if($request->order=='new'){
                $circles = $circles->sortByDesc('id');
            }
            $circles_count = $circles->count();
            $html = view('circleList', [
                'circles' => $circles ,
                'my_prefecture' => $my_prefecture,
                'circles_count' => $circles_count,
            ])->render();
            $response = response($html, 200);
        }else{
            $response = view('indexCircle', [
                'prefectures' => $prefectures,
                'my_prefecture' => $my_prefecture,
                'categories' => $categories,
                'circles' => $circles,
                'circles_count' => $circles_count,
            ]);
        }
        return $response;
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

    public function getGenres($circles) {
        foreach($circles as $circleRecord) {
            $circle_genres = $circleRecord->genre()->orderby('genre_id')->get();
            $circleRecord['genres'] = $circle_genres;
            $circleRecord['count'] = Circle_User::where('circle_id', $circleRecord->id)->count();
            $circleRecord['prefecture'] = Prefecture::find($circleRecord->prefecture_id)->name;
            
        }
        
    }

    public function getPopGenres($circles) {
        foreach($circles as $circleRecord) {
            $circle_genres = $circleRecord->genre()->orderby('genre_id')->get();
            foreach($circle_genres as $circle_genre) {
                $pop_genres[] = $circle_genre;
            }
            $pop_genres = array_unique($pop_genres, SORT_REGULAR);
        }
        return $pop_genres;
    }
    
}
