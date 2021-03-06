<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Genre;
use App\Models\Profile;
use App\Models\Board;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Circle extends Model
{
    protected $fillable = [
        'name',
        'introduction',
        'prefecture_id',
        'detailedArea',
        'ageGroup',
        'activityDay',
        'cost',
        'image',
        'recruit_status',
        'description_template',
        'request_required',
        'private_status',
        'admin_user_id',        
    ];

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function circle_ranking()
    {
        return $this->hasOne(Circle_Ranking::class);
    }

    public function point_log()
    {
        return $this->hasOne(Point_Log::class);
    }

    public function circle_rank()
    {
        return $this->hasOne(Circle_Ranking::class);
    }

    public function genre() {
        return $this->belongsToMany('App\Models\Genre', 'circle_genre', 'circle_id', 'genre_id');
        //->withPivot('id');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User', 'circle_user', 'circle_id', 'user_id');
        //->withPivot('id');
    }

    public function categories() {
        return $this->belongsTo('App\Models\Category', 'category_id');
        //->withPivot('id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'admin_user_id');
    }

    public function board() {
        return $this->hasOne('App\Models\Board');
    }

    public function updateCircle(array $attributes)
    {
        $deleteImage = null;
        $this->fill($attributes);
        if(
            $this->isDirty('image')
            && $this->getOriginal('image')
        ) {
            $deleteImage = $this->getOriginal('image');
        }
        $this->save();

        return [$deleteImage];
    }

    public function scopeKeyword($query, $keyword) {
        if ($keyword) {
            $query->where(function($query) use($keyword){
                $query->where('name', 'LIKE', "%{$keyword}%");
                $query->orWhere('introduction', 'LIKE', "%{$keyword}%");
                $query->orWhereHas('genre', function($query) use ($keyword) {
                    $query->where('name',"%{$keyword}%");
                });
            });
        }
        return $query;
    }

    public function scopePrefecture($query,$prefecture_id) {
        if($prefecture_id!=null && $prefecture_id!=48) {
        $query->where('prefecture_id', $prefecture_id);
        }
        return $query;
    }

    public function scopeGenre($query,$genre_id) {
        if($genre_id){
            $query->whereHas('genre', function($query) use ($genre_id) {
                $query->where('genres.id', $genre_id);
            });
        }
        return $query;
    }

    public function scopeCategory($query,$category_id) {
        if($category_id) {
            $query->where('category_id',$category_id);
        }
        return $query;
    }

    public function scopeAsc($query) {
        $query->orderby('id', 'asc');
        return $query;
    }

    public function scopeDesc($query) {
        $query->orderby('id','desc');
        return $query;
    }

    public function getRecommendedCircles($genre,$prefecture_id) {
        
        $circles = Circle::where('prefecture_id',$prefecture_id)->genre($genre->id)->sortByPopularity()->get();
        $circle = new Circle;
        $circle->addInfomationToCircles($circles);
        return $circles;
    }

    public function getCircleList($my_prefecture,$request,$genre_id,$category_id) {
        $query = Circle::query();
        return $query->prefecture($my_prefecture->id)
        ->keyword($request->keyword)
        ->category($category_id)
        ->genre($genre_id)
        ->sortCircles($request)
        ->get();
    }

    public function getCircleMembers($circle) {
        return $circle->users()->where('circle_user.approval', '=', 2);
        
    }

    public function addInfomationToCircles($circles) {
        
        foreach($circles as $circleRecord) {
            $circleRecord = Circle::addInfomationToCircle($circleRecord);
        }
        return $circles;
    }

    public function addInfomationToCircle($circle) {
        $circle['genres'] = $circle->genre()->orderby('circle_genre.id','asc')->get();
        $circle['count'] = $circle->users()->where('circle_user.approval', '=', 2)->count();
        $circle['prefecture'] = Prefecture::find($circle->prefecture_id);
        $circle['category'] = $circle->genres[0]->category;
        $circle['image_path'] = $circle->getImagePathAttributes();
        $circle['rank'] = $circle->circle_ranking->rank;
        return $circle;
    }

    

    public function getImagePathAttributes() {
        return Storage::disk('s3')->url('CircleImages/' . $this->image);
    }

    public function getCheckedGenres($circle) {
        return $circle->genre()->orderby('circle_genre.id','asc')->get()->pluck('id')->toArray();
    }

    public function getPopGenres($circles) {
        $circleIds = $circles->pluck('id');
        return  Genre::whereHas('circle', function($query) use($circleIds) {
            $query->whereIn('circle_id', $circleIds);
        })->get();
    }

    public function sortCirclesByPopularity($my_prefecture_id=null) {
        if($my_prefecture_id!=null && $my_prefecture_id!=48) {
            $circles = Circle::where('prefecture_id', $my_prefecture_id)
            ->sortByPopularity()
            ->get();
        }else{
            $circles = Circle::sortByPopularity()->get();
        }
        return $circles;
    }

    public function sortByNewArrival($my_prefecture_id=null) {
        if($my_prefecture_id!=null && $my_prefecture_id!=48) {
            $circles = Circle::where('prefecture_id', $my_prefecture_id)->orderby('id', 'desc')->get();
        }else{
            $circles = Circle::orderby('id', 'desc')->get();
        }
        return $circles;
    }

    public function scopeSortCircles($query, $request) {
        if($request->order=='new'){
            $query->Desc();
            return $query;
        }else{
            $query->SortByPopularity();
            return $query;
        }
    }

    public function scopeSortByPopularity($query) {
        $query->select('circles.*')
        ->join('circle_ranking', 'circle_ranking.circle_id', '=','circles.id' )
        ->orderby('circle_ranking.total_point','desc');
        return $query;
    }

    const AGEGROUP = [
        0 => '指定しない',
        1 => '10代',
        2 => '20代',
        3 => '30代',
        4 => '40代',
        5 => '50代以上'
    ];

}
