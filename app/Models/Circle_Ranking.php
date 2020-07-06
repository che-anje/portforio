<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;

class Circle_Ranking extends Model
{
    protected $table = 'circle_ranking';
    protected $fillable = [
        'circle_id', 'total_point', 'rank'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function createBottom($circle_id) {
        $circle_ranking = new Circle_Ranking;
        $circle_ranking->circle_id = $circle_id;
        $circle_ranking->total_point = 0;
        $circle_ranking->rank = $circle_ranking->findBottom();
        $circle_ranking->save();
    }

    public function findBottom() {
        $circle_ranking = new Circle_Ranking;
        if($circle_ranking->where('total_point', 0)->first()) {
            return $circle_ranking->where('total_point', 0)->first()->rank;
        }else{
            return $circle_ranking->max('rank') + 1;
        }
    }
}
